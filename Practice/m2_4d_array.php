<?php

$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
          'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
          'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
          'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
          'winner' => 2019],
];

function keineGewinner($famousMeals) {
    $totalGewinner = []; // years with winners
    for ($meal = 1; $meal <= 4; $meal++) { 
        if (gettype($famousMeals[$meal]['winner']) == 'array') {
            foreach($famousMeals[$meal]['winner'] as $year) {
                $totalGewinner[] = $year;
            }
        } else {
            $totalGewinner[] = $famousMeals[$meal]['winner'];
        }
    }

    $totalYears = []; // 2000 - 2022
    for ($i = 2000; $i <= 2022; $i++) {
        $totalYears[] = $i;
    }
    
    return array_diff($totalYears, $totalGewinner); // returns the years without any winners
}
?>

<?php 

echo "Jahren mit keinen Gewinnern: ";
foreach (keineGewinner($famousMeals) as $year) {
    echo $year . ' ';
} ?>

<ol>
<?php foreach ($famousMeals as $meal) {
    echo '<li>' . $meal['name'] . '<br>';
    if (gettype($meal['winner']) == 'array') {
        foreach (array_reverse($meal['winner'], true) as $year) { // numeric keys preserved
            if ($year != $meal['winner'][0]) { // index 0 is last element of reversed array
                echo $year . ', ';
            } else {
                echo $year;
            }
        }
    } else {
        echo $meal['winner']; // for last meal, only one winning year
    } 
    echo '</li>';
} ?>
</ol>


