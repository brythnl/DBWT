<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');

class AuthController {
    public function index(RequestData $rd) {
        $msg = $_SESSION['login_result_message'] ?? NULL;
        $gerichtid = $rd->query['gerichtid'] ?? NULL;
        return view('login', [
            'msg' => $msg,
            'gerichtid' => $gerichtid
        ]);
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
            if ($user['passwort'] == sha1('salt' . $password)) {
              $success = true;
              $id = $user['id'];
            }
          }
        }

        $_SESSION['login_result_message'] = NULL;
        if ($success) {
            $logger->info('Erfolgreich angemeldet!');
            $_SESSION['login_ok'] = true;
            successfulLoginUpdate($id);
            $_SESSION['username'] = $username;
            
            if ($rd->query['gerichtid'] != NULL) {
                header('Location: /bewertung?gerichtid=' . $rd->query['gerichtid']);
            } else {
                header('Location: /');
            }
        } else {
            $logger->warning('Bitte die korrekten Anmeldedaten eintragen!');
            $_SESSION['login_result_message'] = 'Falscher Name oder Passwort! Bitte erneut eintragen.';
            if ($exist) {
                setLoginTime($username, true); // User existiert aber falsches passwort
            }
            header('Location: /anmeldung');
        }
    }

    public function logout() {
        $logger = logger();
        $logger->info('Erfolgreich abgemeldet!');

        $_SESSION['login_ok'] = false;
        $_SESSION['username'] = '';
        header('Location: /');
    }
}


?>
