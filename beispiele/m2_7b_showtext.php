<?php 

$file = fopen('./en.txt', 'r');

if (!$file) {
    die("Error beim Öffnen");
}


?>

<form action="get">
    <label for="suchwort">Suchwort eingeben: </label>
    <input type="text" id="suchwort" name="suchwort">
</form>