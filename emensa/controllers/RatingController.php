<?php

class RatingController {
  public function index(RequestData $request) {
    $_SESSION['access_rating'] = true;
    if ($_SESSION['login_ok']) {
      $gerichtid = $request->query['gerichtid'];
      return view('rating');
    } else {
      header('Location: /anmeldung');
    }
  }

}
