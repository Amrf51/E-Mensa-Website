<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/Bewertungar.php');
/* Datei: controllers/HomeController.php */
class HomeController
{
    public function index(RequestData $request) {
        $name = $_SESSION['name']?? NULL;
        $gerichte =db_gericht_select_gericht();
        $log=logger();
        $log->info('Zugriff auf die Hauptseite');
        $b = BewertungAR::query()->where('Hervorgehoben', '=', true)->get();
        return view('index', ['gerichte' => $gerichte, 'name'=>$name, 'bewertungen'=>$b ]);
    }

    public function debug(RequestData $request) {
        return view('debug');

    }
    public function anmeldung(RequestData $request){
        $error = $_SESSION['error'] ?? NULL;
        unset($_SESSION['error']);
        return view('anmeldung',[
            'msg'=> $error
        ]);
    }
    public function anmeldung_verifizieren(RequestData $request){
        $email = $request ->query['email'];
        $password = $request ->query ['password'];
        $user = db_get_user_data($email);
        if(empty($user)){
            $_SESSION['error']='E-Mail oder Passwort falsch!';
            header('Location: /anmeldung');
            exit();
        }
        if (password_verify($password,$user[0]['password'])){
            inkrement_anmeldung($email);
            update_letzteanmeldung($email);
            letzterfehler($email);
            $_SESSION['name'] = $user[0]['name'];
            header('Location: /');
            exit();
        }
        else{
            $_SESSION['error']='E-Mail oder Passwort falsch!';
            header('Location: /anmeldung');
            exit();
        }
    }
    public function abmeldungen(RequestData $request){
        session_destroy();
        return view('anmelden');
    }
}
