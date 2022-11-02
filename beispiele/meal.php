<?php
/**
* Praktikum DBWT. Autoren:
* Bryan Nathanael, Joestin, 3517701
* Alexander, Matthew, 3532885
*/
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';
const GET_SHOW_DESCRIPTION = 'show_description';
const GET_SPRACHE = 'sprache';
/**
 * List of all allergens.
 */
$allergens = [
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch'
];

$meal = [
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => 2.90,
    'price_extern' => 3.90,
    'allergens' => [11, 13],
    'amount' => 42             // Number of available meals
];

$ratings = [
    [   'text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2 ],
    [   'text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4 ],
    [   'text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4 ],
    [   'text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3 ]
];

$showRatings = [];
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])) {
    $searchTerm = $_GET[GET_PARAM_SEARCH_TEXT];
    foreach ($ratings as $rating) {
        if (stripos($rating['text'], $searchTerm) !== false) { // 4c) make search case-insensitive
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_MIN_STARS])) {
    $minStars = $_GET[GET_PARAM_MIN_STARS];
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $minStars) {
            $showRatings[] = $rating;
        }
    }
} else if (isset($_GET['top'])) {
    $max = $rating['stars'];
    foreach ($ratings as $rating) {
        if ($rating['stars'] > $max) {
            $max = $rating['stars'];
        }
    }
    foreach ($ratings as $rating) {
        if ($rating['stars'] === $max) {
            $showRatings[] = $rating;
        }
    }
} else if (isset($_GET['flopp'])) {
    foreach ($ratings as $rating) {
        $min = $rating['stars'];
        if ($rating['stars'] < $min) {
            $min = $rating['stars'];
        }
    }
    foreach ($ratings as $rating) {
        if ($rating['stars'] === $min) {
            $showRatings[] = $rating;
        }
    }
} else {
    $showRatings = $ratings;
}

function calcMeanStars(array $ratings) : float {
    $sum = 0; // 4b) change from 1 into 0
    foreach ($ratings as $rating) {
        $sum += $rating['stars'] / count($ratings);
    }
    return $sum;
}

// 4e) Show/hide meal description
if (isset($_GET[GET_SHOW_DESCRIPTION])) {
    $showdesc = $_GET[GET_SHOW_DESCRIPTION];
}

// 4f) Search value stays in input field
if (isset($_GET[GET_PARAM_SEARCH_TEXT])) {
    $search = htmlentities($_GET[GET_PARAM_SEARCH_TEXT]); //
} else {
    $search = '';
} 

// 4g) Language options
$en = [
    'Gericht: ' => 'Meal: ',
    'Deutsch' => 'German',
    'Englisch' => 'English',
    'Beschreibung' => 'Description',
    'Ein' => 'Show',
    'Aus' => 'Hide',
    'Interner Preis: ' => 'Internal Price: ',
    'Externer Preis: ' => 'External Price: ',
    'Allergene:' => 'Allergens:',
    'Bewertungen (Insgesamt: ' => 'Rating (Overall: ',
    'Suchen' => 'Search'
];

$de = [
    'Gericht: ' => 'Gericht: ',
    'Deutsch' => 'Deutsch',
    'Englisch' => 'Englisch',
    'Beschreibung' => 'Beschreibung',
    'Ein' => 'Ein',
    'Aus' => 'Aus',
    'Interner Preis: ' => 'Interner Preis: ',
    'Externer Preis: ' => 'Externer Preis: ',
    'Allergene:' => 'Allergene:',
    'Bewertungen (Insgesamt: ' => 'Bewertungen (Insgesamt: ',
    'Suchen' => 'Suchen'
];

$lang = $de;
if (isset($_GET[GET_SPRACHE])) {
    $sprache = $_GET[GET_SPRACHE];
    if ($sprache == 'de') {
        $lang = $de;
    } else if ($sprache == 'en') {
        $lang = $en;
    }
}
    
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8"/>
        <title>Gericht: <?php echo $meal['name']; ?></title>
        <style>
            * {
                font-family: Arial, serif;
            }
            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <header>
            <h1><?php echo $lang['Gericht: '] . $meal['name']; ?></h1>
            <form method="get">
                <button id="de" type="submit" value="de" name="sprache"><?php echo $lang['Deutsch']; ?></button>
                <button id="en" type="submit" value="en" name="sprache"><?php echo $lang['Englisch']; ?></button>
            </form>   
        </header>
        
        <h2><?php echo $lang['Beschreibung']; ?></h2>
        <form method="get">
            <button id="descEin" type="submit" value="1" name="show_description"><?php echo $lang['Ein']; ?></button>
            <button id="descAus" type="submit" value="0" name="show_description"><?php echo $lang['Aus']; ?></button>
        </form> 
        <p>
            <?php if ($showdesc == 1) { 
                    echo $meal['description']; 
                  } else if ($showdesc = 0) {
                    echo "";
                  }
            ?>
        </p>
        <br>
        <!-- 4h) Preis-Format -->
        <h2><?php echo $lang['Interner Preis: '] . number_format($meal['price_intern'], 2, ',', '.') . '€'; ?></h2>
        <h2><?php echo $lang['Externer Preis: '] . number_format($meal['price_extern'], 2, ',', '.') . '€'; ?></h2>
        <br>
        <h2><?php echo $lang['Allergene:']; ?></h2>
        <ul><?php foreach($meal['allergens'] as $allergen_key) { // 4b) Allergens in an unordered list
            echo "<li>$allergens[$allergen_key]</li>";
        }; ?></ul>
        <br>
        <h1><?php echo $lang['Bewertungen (Insgesamt: '] . calcMeanStars($ratings) . ')'; ?></h1>
        <form method="get">
            <label for="search_text">Filter:</label>
            <input id="search_text" type="text" name="search_text" value="<?php echo $search ?>">
            <input type="submit" value="<?php echo $lang['Suchen']?>">
            <button id="top" type="submit" value="TOP" name="top">TOP</button>
            <button id="flopp" type="submit" value="FLOPP" name="flopp">FLOPP</button> 
        </form>
        <table class="rating">
            <thead>
            <tr>
                <td>Text</td>
                <td>Sterne</td>
                <td>Autor</td> <!-- 4a).1 make column for authors -->
            </tr>
            </thead>
            <tbody>
            <?php
        foreach ($showRatings as $rating) {
            echo "<tr><td class='rating_text'>{$rating['text']}</td>
                      <td class='rating_stars'>{$rating['stars']}</td>
                      <td class='rating_author'>{$rating['author']}</td> 
                  </tr>"; // 4a).2 add content to author column
        }
        ?>
            </tbody>
        </table>
    </body>
</html>