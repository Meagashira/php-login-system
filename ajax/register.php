<?php 

	//Allow the config
	define('__CONFIG__', true);
	//Require the config
    require_once "../inc/config.php"; 
    // Always return JSON format

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');
             $return = [];

             //Zorg dat de gebruiker niet al bestaat

             //Zorg dat de gebruiker in KAN loggen en toegevoegd wordt

             //Koppel de relevante informatie terug aan JS en doe een redirect

             $return['redirect'] = 'dashboard.php';



             echo json_encode($return, JSON_PRETTY_PRINT); exit;

        exit('not post');
    }else {
        //die 
        exit('test');
    }



    ?> 