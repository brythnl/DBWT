<?php

function incLogin($username) {
    $link = connectdb();

    $sql = mysqli_stmt_init($link);
    mysqli_stmt_prepare($sql, 
        "UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen + 1 WHERE email = ?");
    mysqli_stmt_bind_param($sql, 's',
        $username);
    mysqli_stmt_execute($sql);

    mysqli_close($link);
}

function setLoginTime($username, $error) {
    $link = connectdb();

    $date = date('Y-m-d h:i:s a', time()); // get current time

    $sql = mysqli_stmt_init($link);
    mysqli_stmt_prepare($sql,
        "UPDATE benutzer SET " . (!$error ? "letzteanmeldung" : "letzterfehler") . " = $date WHERE email = ?");
    mysqli_stmt_bind_param($sql, 's',
        $username);
    mysqli_stmt_execute($sql);

    mysqli_close($link);
        
}

function getLoginData() {
    $link = connectdb();

    $sql = "SELECT email, passwort FROM benutzer";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($link);

    return $data;
}

?>
