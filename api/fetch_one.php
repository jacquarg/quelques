<?php

    require __DIR__ . '/vendor/autoload.php';

    use Amp\Promise;
    use function Amp\ParallelFunctions\parallelMap;

    function fetchOne() {
        
        $words = ["je", "t'ai", "donne", "de", "moi", "tu", "as", "aussi", "pris", "beaucoup", "ca",
        //"tu",
            "pourras", "le", "garder"];

        $res = array();
        $resList = Promise\wait(parallelMap($words, function($word) {    
        
            $token = "AAAAAAAAAAAAAAAAAAAAAMu3HAEAAAAAkZ6m%2BmuccXSqyjDWOjLHpYdXCJA%3D5HPJ3XHGVwltP2LA1DLkW2LH9PS2V90nxkHzpU8Mb4ijNnJ8tx";

            $options = array('http' => array(
                'method'  => 'GET',
                'header' => 'Authorization: Bearer '.$token
            ));
            $context  = stream_context_create($options);

            $url = 'https://api.twitter.com/2/tweets/search/recent?expansions=author_id&query="'.$word.'"';

            $raw = file_get_contents($url, false, $context);
            switch($word) {
                case "t'ai": $regex = 't[\'’]ai' ; break;
                case "donne": $regex = 'donn[eé]' ; break;
                case "ca": $regex = '[cç]a' ; break;
                default: $regex = $word; break;
            }

            $regex = '/\b'.$regex.'\b/';
            $tweet = "";
            $response = json_decode($raw);
            foreach($response->data as $tweet) {
                $match = preg_match($regex, strtolower($tweet->text));
                if ($match != 0) {
                    break;
                }
            }

            $resTweet = array();
            $resTweet["id"] = $tweet->id;
            $resTweet["text"] = $tweet->text; //str_replace('"', "＂", $tweet->text);

            $userIndex = array_search($tweet->author_id, array_column($response->includes->users, 'id'));
            $resTweet["username"] = ($userIndex !== false ? $response->includes->users[$userIndex]->username : null);
            return $resTweet;
        }));

        
        foreach($words as $index=>$word) {
            $res[$word] = $resList[$index];
        }

        $res["timestamp"] = date("c");
        // return addslashes(json_encode($res, JSON_UNESCAPED_UNICODE));
        // return json_encode($res, JSON_UNESCAPED_UNICODE);
        return  json_encode($res);
    }
?>
