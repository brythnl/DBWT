<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertung.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');

class RatingController {
    public function index(RequestData $request) {
        $gerichtid = $request->query['gerichtid'];
        if ($_SESSION['login_ok']) {
            $gericht = getNameImg($gerichtid);
            $ratings = get_30_ratings_chronological();
            $admin = checkAdmin($_SESSION['username']);
            return view('rating', [
                'gerichtid'=>$gerichtid,
                'gericht'=>$gericht,
                'ratings'=>$ratings,
                'admin'=>$admin,
            ]);
        } else {
            header('Location: /anmeldung?gerichtid=' . $gerichtid);
        }
    }

    public function save(RequestData $request) {
        $gerichtid = $request->query['gerichtid'];
        $gericht = getNameImg($gerichtid);

        $bemerkung = $request->getPostData()['bemerkung'];
        $sterne = $request->getPostData()['sterne'];
        saveData($gerichtid, $bemerkung, $sterne, $gericht['name'], $_SESSION['username']);

        header('Location: /bewertung?gerichtid=' . $gerichtid);
    }

    public function userRating() {
        if ($_SESSION['login_ok']) {
            $ratings = get_user_ratings_chronological($_SESSION['username']);
            return view('userRating', [
                'ratings'=>$ratings,
            ]);
        }
    }

    public function delete(RequestData $request) {
        delete_user_rating($request->query['gerichtid'], $request->query['autor']);

        header('Location: /meinebewertung');
    }

    public function setSelection(RequestData $request) {
        $gerichtid = $request->query['gerichtid'];
        set_selection($gerichtid);

        header('Location: /bewertung?gerichtid=' . $gerichtid);
    }

    public function unsetSelection(RequestData $request) {
        $gerichtid = $request->query['gerichtid'];
        unset_selection($gerichtid);

        header('Location: /bewertung?gerichtid=' . $gerichtid);
    }
}
