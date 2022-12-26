<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class HomeController extends BaseController 
{
    public function index(Request $request) {
      $gerichte = db_gericht_select_all();
      $logger = logger();
      $logger->info('Hauptseite aufgeruft!');
        return view('home', [
            'rd' => $request,
            'gerichte'=>$gerichte 
        ]);
    }
}
