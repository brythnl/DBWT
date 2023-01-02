<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "gerichte"
 */

class Gericht extends Illuminate\Database\Eloquent\Model {
    protected $table = 'gericht';

    protected $primaryKey = 'id';
    public $timestamps = false;
}

function db_gericht_select_all() {
    try {
        $link = connectdb();

        $sql = 'SELECT * FROM gericht ORDER BY name';
        $result = mysqli_query($link, $sql);

        $data = mysqli_fetch_all($result, MYSQLI_BOTH);

        mysqli_close($link);
    }
    catch (Exception $ex) {
        $data = array(
            'id'=>'-1',
            'error'=>true,
            'name' => 'Datenbankfehler '.$ex->getCode(),
            'beschreibung' => $ex->getMessage());
    }
    finally {
        return $data;
    }

}

function db_gericht_select_namedesc_inpreis_over2() {
    $link = connectdb();

    $sql = "SELECT name, preis_intern FROM gericht WHERE preis_intern > 2 ORDER BY name DESC ";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data;
}

function getNameImg($id) {
  $link = connectdb();

  $sql = "SELECT name, bildname FROM gericht WHERE id = $id";
  $result = mysqli_query($link, $sql);

  $data = mysqli_fetch_assoc($result);

  mysqli_close($link);
  return $data;
}
