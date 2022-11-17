<?php
// Neuer Besucher addieren => Anzahl inkrementieren
$addBesuchersql = "UPDATE besucher SET anzahl = anzahl+1";
mysqli_query($link, $addBesuchersql);

// Aktuelle Besucher-Anzahl bekommen
$getBesucherAnzahlsql = "SELECT anzahl FROM besucher";
$besucherAnzahl = mysqli_fetch_assoc(mysqli_query($link, $getBesucherAnzahlsql))['anzahl'];

?>
