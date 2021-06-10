<?php
    function fetchOne() {
        $token = "AAAAAAAAAAAAAAAAAAAAAMu3HAEAAAAAkZ6m%2BmuccXSqyjDWOjLHpYdXCJA%3D5HPJ3XHGVwltP2LA1DLkW2LH9PS2V90nxkHzpU8Mb4ijNnJ8tx";

        $options = array('http' => array(
            'method'  => 'GET',
            'header' => 'Authorization: Bearer '.$token
        ));
        $context  = stream_context_create($options);


        $words = ["je", "t'ai", "donne", "de", "moi", "tu", "as", "aussi", "pris", "beaucoup", "ca",
        //"tu",
            "pourras", "le", "garder"];
        $res = array();
        foreach($words as $word) {
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
            printf($raw);
            $response = json_decode($raw);
            foreach($response->data as $tweet) {
                $match = preg_match($regex, strtolower($tweet->text));
                if ($match != 0) {
                    break;
                }
            }

            $resTweet = array();
            $resTweet["id"] = $tweet->id;
            $resTweet["text"] = $tweet->text;

            $userIndex = array_search($tweet->author_id, array_column($response->includes->users, 'id'));
            $resTweet["username"] = ($userIndex !== false ? $response->includes->users[$userIndex]->username : null);

            $res[$word] = $resTweet;
        }
        $res["timestamp"] = date("c");
        return  json_encode($res);
    }
?>
