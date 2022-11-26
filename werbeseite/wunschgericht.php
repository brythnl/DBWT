<?php 

// konvertiere zu einem SQL-lesbar Datum
$date = strtotime($_POST['datum']);
$date = date('Y-m-d', $date);

$wunschgerichtInsertsql = "INSERT INTO wunschgericht (name, beschreibung, erstellungsdatum, erstellername, ersteller_email) 
                            VALUES ('$_POST[name]','$_POST[beschreibung]','$date','$_POST[erstellername]','$_POST[email]')";
mysqli_query($link, $wunschgerichtInsertsql);

?>

<form method="post">
    <label for="name">Gerichtname:</label>
    <input type="text" name="name" id="name">
    <label for="beschreibung">Beschreibung:</label>
    <input type="text" name="beschreibung" id="beschreibung">
    <label for="datum">Datum:</label>
    <input type="text" name="datum" id="datum">
    <label for="erstellername">Ihr/e Name:</label>
    <input type="text" name="erstellername" id="erstellername">
    <label for="email">Ihr/e E-mail:</label>
    <input type="email" name="email" id="email">
    <input type="submit" value="Wunsch abschicken">
</form>
