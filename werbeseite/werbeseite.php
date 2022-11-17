<?php
    include ('./connectToDB.php');
    include ('./accessGericht.php'); 
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>E-Mensa</title>
</head>
<body>
    <header>
        <nav>
            <img src="images/logo.png" id="logo" alt="logo">
            <h1>e-mensa</h1>
            <ul class="navbar">
                <li><a href="#ankundigung">Ankündigung</a></li>
                <li><a href="#speisen">Speisen</a></li>
                <li><a href="#zahlen">Zahlen</a></li>
                <li><a href="#kontakt">Kontakt</a></li>
                <li><a href="#wichtig-fuer-uns">Wichtig für uns</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="img-container">
            <img src="images/mensa.jpg" id="mensa" alt="mensa">
        </div>

        <article id="ankundigung">
            <h2>Bald gibt es Essen auch online ;)</h2>
            <div id="ankundigungsbox">  
                <p>Lorem ipsum dolor sit amet, risus viverra adipiscing at in. Nec feugiat nisl pretium fusce id. A iaculis at erat pellentesque. Vel facilisis volutpat est velit. Porttitor massa id neque aliquam. Ullamcorper morbi tincidunt ornare massa eget egestas purus. Ullamcorper eget nulla facilisi etiam dignissim. Eleifend donec pretium vulputate sapien nec sagittis. Elit sed vulputate mi sit.</p>
                <p>A cras semper auctor neque vitae tempus quam pellentesque nec. Interdum varius sit amet mattis vulputate enim nulla. Non odio euismod lacinia at quis risus. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero.</p>
            </div>
        </article>

        <section id="speisen">
            <h2>Köstlichkeiten, die Sie erwarten</h2>
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
                echo '<li>' . utf8_encode($allergenrow['name']) . '</li>'; // dann der Allergen-Name als Listmember gemacht
            }                
        }
    }

?>
</ol>

        </section>
        
        <?php 
        include('./accessNewsletter.php'); 
        include ('./accessBesucher.php');
        ?>
        
        <section id="zahlen">
            <h2>E-Mensa im Zahlen</h2>
            <ul id="zahlen-list">
                <li><?php echo $besucherAnzahl; ?><span>Besuche</span></li>
                <!-- Dividiert, weil ein Datensatz in formdata.txt ist 4 Zeilen -->
                <li><?php echo (floor($lineCount/4)); ?><span>Anmeldungen zum Newsletter</span></li>
                <li><?php echo $gerichtAnzahl; ?><span>Speisen</span></li>
            </ul>
        </section>

         <section id="kontakt">
            <h2>Interesse geweckt? Wir informieren Sie!</h2>
            <?php include './newsletterverarbeitung.php'; ?>
            <form method="post">
                <div id="upper">
                    <label for="name">Ihr Name:</label>
                    <label for="email">Ihre E-Mail:</label>
                    <label for="sprache">Newsletter bitte in:</label>
                </div>
                <div id="middle">                   
                    <input type="text" name="name" id="name" placeholder="Name" required>
                    <input type="text" name="email" id="email" required>
                    <select name="sprache" id="sprache">
                        <option value="deutsch" selected>Deutsch</option>
                        <option value="englisch">Englisch</option>
                        <option value="russisch">Russisch</option>
                    </select>
                </div>
                <div id="lower">
                    <input type="checkbox" name="dschutz" id="dschutz" required>
                    <label for="dschutz">Den Datenschutzbestimmungen stimme ich zu</label>
                    <input type="submit" id="submit" value="Zum Newsletter anmelden" >
                </div>
            </form>
        </section>

        <section id="wichtig">
            <h2 id="wichtig-fuer-uns">Das ist uns wichtig</h2>
            <ul id="wichtig-list">
                <li>Beste frische saisonale Zutaten</li>
                <li>Ausgewogene abwechslungsreiche Gerichte</li>
                <li>Sauberkeit</li>
            </ul>
        </section>

        <h2 id="closing">Wir freuen uns auf Ihren Besuch!</h2>
    </main>
    <footer>
        <ul id="closing-list">
            <li>(c) E-Mensa GmbH</li>
            <li>Bryan Nathanael Joestin, Alexander Matthew</li>
            <li><a>Impressum</a></li>
        </ul>
    </footer>
