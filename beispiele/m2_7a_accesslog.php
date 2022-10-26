<?php

$file = fopen('accesslog.txt', 'a');

if (!$file) {
    die("Error beim Öffnen");
}

$info = "Datum: " . date('d.m.Y') . 
        "\nUhrzeit: " . date('H:i:sa') .
        "\nBrowser: " . $_SERVER['HTTP_USER_AGENT'] .
        "\nClient-IP: " . $_SERVER['REMOTE_ADDR'] . "\n\n"; 

fwrite($file, $info);

fclose($file);
?>