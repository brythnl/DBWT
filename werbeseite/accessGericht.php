<?php

// Gerichte aus Datenbank laden
$gerichtsql = "SELECT id, name, preis_intern, preis_extern FROM gericht ORDER BY name ASC LIMIT 5";
$gerichtresult = mysqli_query($link, $gerichtsql);
// Allergene-Referenzen aus Datenbank laden
$gerichtallergensql = "SELECT code, gericht_id FROM gericht_hat_allergen";
$gerichtallergenresult = mysqli_query($link, $gerichtallergensql);
// Allergene aus Datenbank laden
$allergensql = "SELECT code, name, typ FROM allergen";
$allergenresult = mysqli_query($link, $allergensql);

// Angezeigte Gericht-Zähler
$gerichtAnzahl = 0;
// Verwendete Allergene-Codes in einer Array
$usedAllergenCode = [];

?>

<!-- Gericht-Tabelle -->
<table>
    <tr>
        <th>Name</th>
        <th>Interner Preis</th>
        <th>Externer Preis</th>
        <th>Allergene</th>
    </tr>
    <?php 
    while ($gerichtrow = mysqli_fetch_assoc($gerichtresult)) { // über Gericht-DB-Tabelle iterieren
    echo '<tr>';
        echo '<td>' . utf8_encode($gerichtrow['name']) . '</td>';
        echo '<td>' . $gerichtrow['preis_intern'] . '</td>';
        echo '<td>' . $gerichtrow['preis_extern'] . '</td>';
        echo '<td>';
        while ($gerichtallergenrow = mysqli_fetch_assoc($gerichtallergenresult)) { // über Allergene-Referenz-DB-Tabelle iterieren
            if ($gerichtallergenrow['gericht_id'] == $gerichtrow['id']) { // falls die aktuelle IDs von Referenz-DB-Tabelle & Gericht-Tabelle gleich,
                echo $gerichtallergenrow['code'] . ' '; // dann die Allergen-Code im Gericht-Tabelle anzeigen
                if (!in_array($gerichtallergenrow['code'], $usedAllergenCode)) { // falls aktuelle Allergen-Code noch nicht als verwendet gesetzt (im Array gespeichert)
                    $usedAllergenCode[] = $gerichtallergenrow['code']; // dann in verwendete Allergene-Array speichern
                }
            }
        }
        // Result-pointer wieder zur ersten Zeile setzen
        mysqli_data_seek($gerichtallergenresult, 0); 
        echo '</td>'; 
    echo '</tr>';
    $gerichtAnzahl++; // Ein Gericht addieren   
    } ?>
</table>

<br>


<!-- Liste zu bei den angezeigten Gerichten verwendeten Allergenen -->
<h3>Verwendete Allergene</h3>
<ol>
<?php
        while ($allergenrow = mysqli_fetch_assoc($allergenresult)) { // über Allergene-Datenbanktabelle (mit Name) iterieren
        foreach ($usedAllergenCode as $code) { // über verwendete Allergene-Array iterieren
            if ($code == $allergenrow['code']) { // falls die aktuelle Codes von Array & DB-Tabelle gleich, 
                echo '<li>' . utf8_encode($allergenrow['name']) . ' - ' . $allergenrow['code'] . '</li>'; // dann der Allergen-Name als Listmember gemacht
            }                
        }
    }

?>
</ol>

