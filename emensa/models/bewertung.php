<?php

function saveData($gerichtid, $bemerkung, $sterne) {
  $link = connectdb();

  $sql = mysqli_stmt_init($link);
  mysqli_stmt_prepare($sql,
    "INSERT INTO bewertung (gericht_id, bemerkung, sterne) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($sql, 'iss',
    $gerichtid,
    $bemerkung,
    $sterne
  );
  mysqli_stmt_execute($sql);

  mysqli_close($link);
}
