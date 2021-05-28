<?php
    require 'fetch_one.php';

    $json = fetchOne();
    $path = "../data/captures/".date('Y\/m\.\t\x\t');
    mkdir(dirname($path), 0755, true);
    file_put_contents($path, $json.PHP_EOL , FILE_APPEND | LOCK_EX);
?>