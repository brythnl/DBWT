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
$allergensql = "SELECT code, gericht_id FROM gericht_hat_allergen";
$allergenresult = mysqli_query($link, $allergensql);

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
        echo '<td>' . $gerichtrow['name'] . '</td>';
        echo '<td>' . $gerichtrow['preis_intern'] . '</td>';
        echo '<td>' . $gerichtrow['preis_extern'] . '</td>';
        echo '<td>';
        while ($allergenrow = mysqli_fetch_assoc($allergenresult)) {
            if ($allergenrow['gericht_id'] == $gerichtrow['id']) {
                echo $allergenrow['code'] . ' ';
            }
        }
        mysqli_data_seek($allergenresult, 0); // Set result pointer back to starting row
        echo '</td>'; 
    echo '</tr>';
    } ?>
</table>

<?php 




