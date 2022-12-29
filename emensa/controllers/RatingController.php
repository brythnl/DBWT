<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertung.php');

class RatingController {
  public function index(RequestData $request) {
    $_SESSION['access_rating'] = true;
    if ($_SESSION['login_ok']) {
      $gerichtid = $request->query['gerichtid'];
      return view('rating', ['gerichtid'=>$gerichtid]);
    } else {
      header('Location: /anmeldung');
    }
  }

  public function save(RequestData $request) {
    $gerichtid = $request->query['gerichtid'];
    $bemerkung = $request->getPostData()['bemerkung'];
    $sterne = $request->getPostData()['sterne'];
    saveData($gerichtid, $bemerkung, $sterne);

    header('Location: /bewertung?gerichtid=' . $gerichtid);
  }

}
