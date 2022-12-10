<?php

class AuthController {
    public function index(RequestData $rd) {
        $msg = $_SESSION['login_result_message'] ?? NULL;
        return view('login', ['msg' => $msg]);
    }

    public function check(RequestData $rd) {
        $username = $rd->query['username'] ?? false;
        $password = $rd->query['password'] ?? false;

        $_SESSION['login_result_message'] = NULL;
        if () {
            $_SESSION['login_ok'] = true;
            header('Location: /');
        } else {
            $_SESSION['login_result_message'] = 'Falscher Name oder Passwort! Bitte erneut eintragen.';
            header('Location: /anmeldung');
        }
    }
}

?>
