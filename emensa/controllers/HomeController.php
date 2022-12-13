<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');


/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request) {
      $gerichte = db_gericht_select_all();
      $logger = logger();
      $logger->info('Hauptseite aufgeruft!');
        return view('home', [
            'rd' => $request,
            'gerichte'=>$gerichte 
        ]);
    }
    
    public function debug(RequestData $request) {
        return view('debug');
    }
       
}
