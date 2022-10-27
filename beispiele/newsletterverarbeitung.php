<?php

function strpos_array($haystack, $needle_array) {
    foreach ($needle_array as $needle) {
        if (strpos($haystack, $needle)) {
            return 1;
        }
    }
    return 0;
} 

$anrede = $_POST['anrede'] ?? NULL;
$vorname = trim($_POST['vorname'] ?? NULL);
$nachname = trim($_POST['nachname'] ?? NULL);
$dschutz = $_POST['dschutz'] ?? NULL;
$email = $_POST['email'] ?? NULL;

if (empty($vorname)) {
    $fehler = "Vorname muss mindestens 1 Zeichen enthalten";
}
if (empty($nachname)) {
    $fehler = "Nachname muss mindestens 1 Zeichen enthalten";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $fehler = "E-Mail Vorlage nicht akzeptiert!";
}

$spam = ['rcpt.at', 'damnthespam.at', 'wegwerfmail.de', 'trashmail.de', 'trashmail.com'];
if (strpos_array($email, $spam)) {
    $fehler = "Spam E-Mails detected!";
}

if ($fehler) {
    echo $fehler;
} else {
    $data = [
        'anrede' => $anrede,
        'vorname' => $vorname,
        'nachname' => $nachname,
        'dschutz' => $dschutz,
        'email' => $email
    ];

    $file = fopen('./formdata.txt', 'a');
    if (!$file) {
        die("Error beim Öffnen");
    }

    foreach ($data as $key => $value) {
        $line = "$key;$value\n";
        fwrite($file, $line);
    }
    fwrite($file, "\n\n");
}

?>