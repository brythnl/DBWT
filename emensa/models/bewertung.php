<?php

function saveData($gerichtid, $bemerkung, $sterne, $name) {
  $link = connectdb();

  $sql = mysqli_stmt_init($link);
  mysqli_stmt_prepare($sql,
    "INSERT INTO bewertung (gericht_id, bemerkung, sterne, name) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($sql, 'isss',
    $gerichtid,
    $bemerkung,
    $sterne,
    $name
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
