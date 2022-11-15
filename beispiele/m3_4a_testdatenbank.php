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

$sql = "SELECT * FROM gericht";
$result = mysqli_query($link, $sql);

?>

<table>
    <tr>
        <th>id</th>
        <th>beschreibung</th>
        <th>name</th>
        <th>erfasst_am</th>
        <th>vegetarisch</th>
        <th>vegan</th>
        <th>preis_intern</th>
        <th>preis_extern</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['beschreibung'] . '</td>';
        echo '<td>' . $row['erfasst_am'] . '</td>';
        echo '<td>' . $row['vegetarisch'] . '</td>';
        echo '<td>' . $row['vegan'] . '</td>';
        echo '<td>' . $row['preis_intern'] . '</td>';
        echo '<td>' . $row['preis_extern'] . '</td>';
        echo '</tr>';
    }
    ?>
</table>
