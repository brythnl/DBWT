<?php include './newsletterverarbeitung.php'; ?>

<!DOCTYPE html>
<!-- 
- Praktikum DBWT. Autoren:
- Alexander, Matthew, 3532885
- Bryan Nathanael, Joestin, 3517701
-->
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Newsletteranmeldung</title>
    </head>
    <body>
        <form method="post">
            <fieldset style="width: 250px">
                <legend>Anmeldung</legend>
                <!-- name in HTTP request als Variable zur Daten in value-Attribut -->
                <!-- id als identifier fuer JS & CSS (hier zum Verbinden mit for-Attribut der label-tag)-->
                <p><strong>Anrede</strong></p>
                <!-- radio-Auswaehle haben die gleiche name-Attribut *um nur 1 moegliche Auswahl) -->
                <input type="radio" name="anrede" id="frau" value="frau">Frau<br>
                <input type="radio" name="anrede" id="herr" value="herr">Herr<br><br>
                <label for="vorname">Vorname*</label><br>
                <input size="26" type="text" name="vorname" id="vorname" placeholder="Bitte geben Sie Ihren Vornamen ein" required><br>
                <label for="nachname">Nachname*</label><br>
                <input size="28" type="text" name="nachname" id="nachname" placeholder="Bitte geben Sie Ihren Nachnamen ein" required><br>
                <label for="email">E-Mail*/label><br>
                <input size="22" type="email" name="email" id="email" placeholder="Bitte geben Sie Ihre E-Mail ein" required><br>
                <label for="interval">Benachrichtigungsinterval</label><br>
                <select name="interval" id="interval">
                    <option value="tag">Tag</option>
                    <option value="woche" selected>Woche</option>
                    <option value="monat">Monat</option>
                </select><br>
                <input type="checkbox" name="dschutz" id="dschutz" required>
                <label for="dschutz">Datenschutzhinweise gelesen</label><br>
                <input type="submit" value="Abschicken"><br>
                <p><var><sup>*)</sup> Eingaben sind Pflicht</var></p>
            </fieldset>
        </form>
    </body>
</html>