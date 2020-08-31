<?php 
	// Als er geen CONSTANT is gedefinieerd genaamd __CONFIG__, laadt dit bestand dan niet. 
	if(!defined('__CONFIG__')) {
        exit('Er is geen config bestand');
    }

    class Page {
        //Forceer gebruikers om in te loggen
        static function ForceLogin() {
            if(isset($_SESSION['user_id'])) {
                //akkoord
            } else{
                header("Location: /login.php"); exit;
            }
        }
        //Forceer gebruikers naar het dashboard
        static function ForceDashboard() {
            if(isset($_SESSION['user_id'])) {
                header("Location: /dashboard.php"); exit;
                //akkoord
            } else{
            }
        }
    
    }

?>