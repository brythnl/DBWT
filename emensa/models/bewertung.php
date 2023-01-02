<?php

function saveData($gerichtid, $bemerkung, $sterne, $name, $autor) {
    $link = connectdb();

    $sql = mysqli_stmt_init($link);
    mysqli_stmt_prepare($sql,
      "INSERT INTO bewertung (gericht_id, bemerkung, sterne, name, autor) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($sql, 'issss',
      $gerichtid,
      $bemerkung,
      $sterne,
      $name,
      $autor
    );
    mysqli_stmt_execute($sql);

    mysqli_close($link);
}

function get_30_ratings_chronological() {
    $link = connectdb();

    $sql = "SELECT * FROM bewertung ORDER BY zeitpunkt DESC LIMIT 30";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);

    return $data;
}

function get_user_ratings_chronological($user) {
    $link = connectdb();

    $sql = "SELECT * FROM bewertung WHERE autor = '$user' ORDER BY zeitpunkt DESC"; 
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);

    return $data;
}

function delete_user_rating($id, $autor) {
    $link = connectdb();

    $sql = "DELETE FROM bewertung WHERE gericht_id = $id AND autor = '$autor'";
    mysqli_query($link, $sql);

    mysqli_close($link);
}

function set_selection($id) {
    $link = connectdb();

    $sql = "UPDATE bewertung SET hervorhebung = 1 where gericht_id = $id";
    mysqli_query($link, $sql);
    
    mysqli_close($link);
}

function unset_selection($id) {
    $link = connectdb();

    $sql = "UPDATE bewertung SET hervorhebung = 0 where gericht_id = $id";
    mysqli_query($link, $sql);
    
    mysqli_close($link);
}

function get_selected_ratings() {
    $link = connectdb();

    $sql = "SELECT * FROM bewertung WHERE hervorhebung = 1";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_close($link);

    return $data;
}
