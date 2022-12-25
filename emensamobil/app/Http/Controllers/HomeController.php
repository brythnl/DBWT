<?php

namespace App\Http\Controllers;

class HomeController extends Controller 
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
}
