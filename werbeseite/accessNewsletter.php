<?php
// Zeilen von formdata.txt zählen
$lineCount = 0;
$file = fopen('./formdata.txt', 'r');
if (!$file) {
    die("Error beim Öffnen");
}

while (!feof($file)) {
    $line = trim(fgets($file));
    $lineCount++;
}

fclose($file);


?>
