
<form method="get">
    <label for="suchwort">Suchwort eingeben: </label>
    <input type="text" id="suchwort" name="suchwort">
</form>

<?php

if (isset($_GET['suchwort'])) {
    $suchwort = $_GET['suchwort'];

    $found = false;

    $file = fopen('./en.txt', 'r');
    if (!$file) {
        die("Error beim Öffnen");
    }
    
    while (!feof($file)) {
        $puffer = fgets($file);
        if (stripos($puffer, $suchwort) !== false) {
            $line_array = explode(";", $puffer);
            echo $line_array[1];

            $found = true;
            break;
        }   
    }

    if ($found === false) {
        echo "Das gesuchte Wort " . $suchwort . " ist nicht enthalten.";
    }
}

?>
