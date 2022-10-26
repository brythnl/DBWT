<?php
    include('gerichtdaten.php');
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

        <section id="gerichte">
            <h2>Gerichte</h2>
            <div id="wok">
                <?php echo '<h3>' . $Gericht['wok']['name'] . '</h3>' . $Gericht['wok']['bild'] ?>
            </div>
            <div id="vegetarisch">
                <?php echo '<h3>' . $Gericht['vegetarisch']['name'] . '</h3>' . $Gericht['vegetarisch']['bild'] ?>
            </div>
            <div id="klassiker">
                <?php echo '<h3>' . $Gericht['klassiker']['name'] . '</h3>' . $Gericht['klassiker']['bild'] ?>
            </div>
            <div id="tellergericht">
                <?php echo '<h3>' . $Gericht['tellergericht']['name'] . '</h3>' . $Gericht['tellergericht']['bild'] ?>
            </div>
            
        </section>

        <section id="speisen">
            <h2>Köstlichkeiten, die Sie erwarten</h2>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Preis intern</th>
                        <th>Preis extern</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="essen">Rindfleisch mit Bambus, Kaiserschoten und rotem Paprika, dazu Mie Nudeln</td>
                        <td class="preis">3,50</td>
                        <td class="preis">6,20</td>
                    </tr>
                    <tr>
                        <td class="essen">Spinatrisotto mit kleinen Samosateigecken und gemischter Salat</td>
                        <td class="preis">2,90</td>
                        <td class="preis">5,30</td>
                    </tr>
                    <tr>
                        <td class="etc">...</td>
                        <td class="etc">...</td>
                        <td class="etc">...</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="zahlen">
            <h2>E-Mensa im Zahlen</h2>
            <ul id="zahlen-list">
                <li>x<span>Besuche</span></li>
                <li>y<span>Anmeldungen zum Newsletter</span></li>
                <li>z<span>Speisen</span></li>
            </ul>
        </section>

        <section id="kontakt">
            <h2>Interesse geweckt? Wir informieren Sie!</h2>
            <form method="post">
                <div id="upper">
                    <label for="name">Ihr Name:</label>
                    <label for="email">Ihre E-Mail:</label>
                    <label for="sprache">Newsletter bitte in:</label>
                </div>
                <div id="middle">                   
                    <input type="text" name="name" id="name" placeholder="Vorname" required>
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
                    <input type="submit" id="submit" value="Zum Newsletter anmelden" disabled>
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