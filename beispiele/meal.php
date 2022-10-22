<?php
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';

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
        if (strpos(strtolower($rating['text']), strtolower($searchTerm)) !== false) { // 4c) make search case-insensitive
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
$style = 'hide';
if (isset($_GET['show_description'])) {
    $showdesc = $_GET['show_description'];
    if ($showdesc == 1) {
        $showdesc = 0;
        $style = 'show';
    } else if ($showdesc == 0) {
        $showdesc = 1;
        $style = 'hide';
}
}

// 4f) Search value stays in input field
if (isset($_GET[GET_PARAM_SEARCH_TEXT])) {
    $search = htmlentities($_GET[GET_PARAM_SEARCH_TEXT]);
} else {
    $search = '';
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
            .rating {
                color: darkgray;
            }
            .hide {
                display: none;
            }
            .show {
                display: block;
            }
        </style>
    </head>
    <body>
        <h1>Gericht: <?php echo $meal['name']; ?></h1>

        <a href="<?php echo '?show_description=' . $showdesc; ?>">Beschreibung ein/ausblenden</a>
        <p class="<?php echo $style ?>">
            <?php echo $meal['description']; ?>
        </p>
        
        <h3>Interner Preis: <?php echo number_format($meal['price_intern'], 2, ',', '.') . '€'; ?></h3>
        <h3>Externer Preis: <?php echo number_format($meal['price_extern'], 2, ',', '.') . '€'; ?></h3>
        <h2>Allergene:</h2>
        <ul><?php foreach($meal['allergens'] as $allergen_key) { // 4b) Allergens in an unordered list
            echo "<li>$allergens[$allergen_key]</li>";
        }; ?></ul>
        <h1>Bewertungen (Insgesamt: <?php echo calcMeanStars($ratings); ?>)</h1>
        <form method="get">
            <label for="search_text">Filter:</label>
            <input id="search_text" type="text" name="search_text" value="<?php echo $search ?>">
            <input type="submit" value="Suchen">
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