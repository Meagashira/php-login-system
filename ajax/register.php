<?php 
	//Allow the config
	define('__CONFIG__', true);
	//Require the config
    require_once "../inc/config.php"; 
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Always return JSON format    
        header('Content-Type: application/json');

        $return = [];
        
        // make sure the does not exit

        // make sure the user CAN be added and IS added

        // return the proper information back to javascript to redirect us.
        $return['redirect'] = '/dashboard.php';
        $return['name'] = "Nick Koot";

        echo json_encode($return, JSON_PRETTY_PRINT); exit;

    }else {
        //Die, kill the script 
        exit('Test');
    }





    // if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     header('Content-Type: application/json');
    //          $return = [];

    //          $email = Filter::String($_POST['email']);

    //          //Zorg dat de gebruiker niet al bestaat
    //          $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
    //          $findUser->bindParam(':email', $email, pdo:PARAM_STR);
    //          $findUser->execute();

    //          if($findUser->rowCount() == 1) {
    //             // user bestaat
    //             // we kunnen ook checken of ze in kunnen loggen
    //             $return['error'] = "Er is reeds een account met dit email adres";
    //             $return['is_logged_in'] = false;
    //          } else {
    //             //user bestaat niet, toevoegen maar!


    //             $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                 
    //             $addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email, :password)");
    //             $addUser->bindParam(':email', $email, PDO::PARAM_STR);
    //             $addUser->bindParam(':password', $password, PDO::PARAM_STR);
    //             $addUser->execute();

    //             $user_id = $con->lastInsertId();

    //             $_SESSION['user_id'] = (int) $user_id;
    
    //             $return['redirect'] = '/dashboard.php?message=welcome';
    //             $return['is_logged_in'] = true;
    //         }
    
    //          //Zorg dat de gebruiker in KAN loggen en toegevoegd wordt

    //          //Koppel de relevante informatie terug aan JS en doe een redirect


    //          echo json_encode($return, JSON_PRETTY_PRINT); exit;
    // }else {
    //     //die 
    //     exit('Ongeldige URL');
    // }



    ?> 