<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gericht;

class HomeController extends Controller 
{
  public function index(Request $request) {
    $gerichte = Gericht::all();
    return view('home', [
      'rd' => $request,
      'gerichte'=>$gerichte 
    ]);
    }
}
