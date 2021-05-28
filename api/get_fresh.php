<?php
    require 'fetch_one.php';

    $json = fetch_one();
    $path = "../data/live/".date('Y\/m\/d\.\t\x\t');
    mkdir(dirname($path), 0755, true);
    file_put_contents($path, $json.PHP_EOL , FILE_APPEND | LOCK_EX);


    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);
    echo $json
?>
