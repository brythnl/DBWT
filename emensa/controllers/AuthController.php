<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../../beispiele/passwort.php');

class AuthController {
    public function index(RequestData $rd) {
        $msg = $_SESSION['login_result_message'] ?? NULL;
        return view('login', ['msg' => $msg]);
    }

    public function check(RequestData $rd) {
        $logger = logger();

        $username = $rd->getPostData()['username'] ?? false;
        $password = $rd->getPostData()['password'] ?? false;
  
        $success = false;
        $exist = false;
        $logindata = getLoginData();
        foreach ($logindata as $user) {
          if ($user['email'] == $username) {
            $exist = true;
            if ($user['passwort'] == hashPassword($password)) {
              $success = true;
            }
          }
        }

        $_SESSION['login_result_message'] = NULL;
        if ($success) {
            $logger->info('Erfolgreich angemeldet!');
            $_SESSION['login_ok'] = true;
            incLogin($username);
            setLoginTime($username, false);
            $_SESSION['username'] = $username;
            header('Location: /');
        } else {
            $logger->warning('Bitte die korrekten Anmeldedaten eintragen!');
            $_SESSION['login_result_message'] = 'Falscher Name oder Passwort! Bitte erneut eintragen.';
            if ($exist) {
              setLoginTime($username, true); // User existiert aber falsches passwort
            }
            header('Location: /anmeldung');
        }
    }
}


?>
