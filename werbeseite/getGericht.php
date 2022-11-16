<?php 

$link = mysqli_connect(
    "127.0.0.1",
    "root",
    "9jan2002",
    "emensawerbeseite",
    );

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}

$gerichtsql = "SELECT id, name, preis_intern, preis_extern FROM gericht ORDER BY name ASC LIMIT 5";
$gerichtresult = mysqli_query($link, $gerichtsql);
$gerichtallergensql = "SELECT code, gericht_id FROM gericht_hat_allergen";
$gerichtallergenresult = mysqli_query($link, $gerichtallergensql);
$allergensql = "SELECT code, name, typ FROM allergen";
$allergenresult = mysqli_query($link, $allergensql);

$usedAllergenCode = [];
?>

<table>
    <tr>
        <th>Name</th>
        <th>Interner Preis</th>
        <th>Externer Preis</th>
        <th>Allergene</th>
    </tr>
    <?php 
    while ($gerichtrow = mysqli_fetch_assoc($gerichtresult)) {
    echo '<tr>';
        echo '<td>' . utf8_encode($gerichtrow['name']) . '</td>';
        echo '<td>' . $gerichtrow['preis_intern'] . '</td>';
        echo '<td>' . $gerichtrow['preis_extern'] . '</td>';
        echo '<td>';
        while ($gerichtallergenrow = mysqli_fetch_assoc($gerichtallergenresult)) {
            if ($gerichtallergenrow['gericht_id'] == $gerichtrow['id']) {
                echo $gerichtallergenrow['code'] . ' ';
                if (!in_array($gerichtallergenrow['code'], $usedAllergenCode)) {
                    $usedAllergenCode[] = $gerichtallergenrow['code'];
                }
            }
        }
        mysqli_data_seek($gerichtallergenresult, 0); // Set result pointer back to starting row
        echo '</td>'; 
    echo '</tr>';
    } ?>
</table>

<h3>Verwendete Allergene</h3>
<ol>
<?php
    while ($allergenrow = mysqli_fetch_assoc($allergenresult)) {
        foreach ($usedAllergenCode as $code) {
            if ($code == $allergenrow['code']) {
                echo '<li>' . utf8_encode($allergenrow['name']) . '</li>';
            }                
        }
    }

?>
</ol>










