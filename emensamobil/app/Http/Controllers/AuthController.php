<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller {
  public function index(Request $request) {
        $msg = $request->session()->get('login_result_message', '');
        return view('login', ['msg' => $msg]);
  }
}
