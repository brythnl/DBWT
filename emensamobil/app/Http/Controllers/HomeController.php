<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Gericht;

class HomeController extends BaseController 
{
  public function index(Request $request) {
    $gerichte = Gericht::all();
    return view('home', [
      'rd' => $request,
      'gerichte'=>$gerichte 
    ]);
    }
}
