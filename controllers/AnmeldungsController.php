<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../models/gericht.php');

class AnmeldungsController
{
    public function anmeldung(RequestData $rd)
    {

        return view('anmeldung', ['msg' => $msg ?? NULL]);

    }

    public function anmeldungVerifizieren()
    {
        // Start or resume a session
        // Here, you can implement the logic to verify the login credentials
        $email = $_POST['email'];
        $passwort = $_POST['password'];


        // Example verification (replace with your actual logic)
        if (db_benutzer_suchen($email, $passwort)) {
            // Successful login
            $msg = "Anmeldung erfolgreich!";
            // db_anml_zaehler($email);
            // Store user information in session variables
            $_SESSION['login_ok'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['userID'] =1;
            $_SESSION['user'] = get_name($email);
            $_SESSION['login_result_message'] = 'angemeldet';
            $log=logger();
            $log-> info('Benutzer angemeldet');

            $gerichte = db_gericht_select_gericht();
            inkrement_anmeldung($email);

            if (isset($_SESSION['target'])){
                if ($_SESSION['target'] != '/anmeldung') {
                    echo $_SESSION['target'];
                    return;
                    header("Location: {$_SESSION['target']}");
                    exit();
                }
            }

            return view('index', ['msg' => $msg, 'gerichte' => $gerichte]); // Redirect to the main page
        } else {
            letzterFehler($email);
            $log=logger();
            $log->warning('Falsche E-Mail oder Passwort');
            // Failed login
            $msg = "Falsche E-Mail oder Passwort. Bitte versuchen Sie es erneut.";

            return view('anmeldung', ['msg' => $msg]); // Show the login form again with an error message
        }
    }

// Function to verify credentials (replace with your actual logic)

    // Custom view function
    public function abmeldung(RequestData $rd)
    {
        session_unset();
        session_destroy();
        $log=logger();
        $log->info('Benutzer abgemeldet');
        header('location: /');
        exit();
    }
    public function bewertung(RequestData $requestData){
        $gerichtid='';
        if(isset($_GET ['gerichtid'])){
            $gerichtid = $_GET['gerichtid'];}
        if($_SESSION['login_ok'] == true)
        {
            $gerichte = db_gericht_select_namebild($gerichtid);
            // db_bewertung_insert($_SESSION ['userID'],$gerichtid,1,$_POST ['rating'],$_POST['comment']);

            return view('bewertung', ['gericht' => $gerichte]);

        }else{
            $_SESSION['target']="/bewertung?gerichtid=$gerichtid";
            header("Location: /anmeldung");

        }
    }
    public function bewertung_abschicken(){
        db_bewertung_insert($_SESSION['userID'],$_POST['gerichtid'],$_POST['rating'],$_POST['comment']);
        header('Location: /bewertung?gerichtid='.$_POST['gerichtid']);
    }

}


// Check the request URI and call the appropriate method
