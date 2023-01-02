<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/bewertung.php');


/* Datei: controllers/HomeController.php */
class HomeController {
    public function index(RequestData $request) {
        $gerichte = db_gericht_select_all();
        $ratings = get_selected_ratings();
        $logger = logger();
        $logger->info('Hauptseite aufgeruft!');
        return view('home', [
            'rd' => $request,
            'gerichte'=>$gerichte,
            'ratings'=>$ratings,
        ]);
    }
    
    public function debug(RequestData $request) {
        return view('debug');
    }
       
}
