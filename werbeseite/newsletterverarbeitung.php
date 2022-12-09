<?php
function strpos_array($haystack, $needle_array) {
    foreach ($needle_array as $needle) {
        if (strpos($haystack, $needle)) {
            return 1;
        }
    }
    return 0;
} 

$name = str_replace('\'',"",trim($_POST['name']??NULL));
$email = str_replace('\'',"",trim($_POST['email']??NULL));

/*
$name = trim($_POST['name'] ?? NULL);
$email = $_POST['email'] ?? NULL;
*/
$sprache = $_POST['sprache'] ?? NULL;
$dschutz = $_POST['dschutz'] ?? NULL;

if (empty($name)) {
    $fehler = "Name muss mindestens 1 Zeichen enthalten";
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
        'name' => $name,
        'email' => $email,
        'sprache' => $sprache,
        'dschutz' => $dschutz
    ];

    $file = fopen('./formdata.txt', 'a');
    if (!$file) {
        die("Error beim Öffnen");
    }

    foreach ($data as $key => $value) {
        $line = "$key;$value\n";
        fwrite($file, $line);
    }

    fclose($file);
}

?>
