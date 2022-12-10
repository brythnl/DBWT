<?php

function incLogin($username) {
    $link = connectdb();

    // Use prepared statements to bind username as condition
    $sql = mysqli_stmt_init($link);
    mysqli_stmt_prepare($sql, 
        "UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen + 1 WHERE name=?");
    mysqli_stmt_bind_param($sql, 's',
        $username);
    mysqli_stmt_execute($sql);

    mysqli_close($link);
}

?>
