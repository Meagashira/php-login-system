<?php 
	//Allow the config
	define('__CONFIG__', true);
	//Require the config
    require_once "../inc/config.php"; 
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Always return JSON format    
        header('Content-Type: application/json');

        $return = [];
        
        $email = Filter::String($_POST['email']);
        $password = $_POST['password'];

        // make sure the user does not exist
        $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if($findUser->rowCount() == 1) {
            //User exists, try and log them in
            $User = $findUser->fetch(PDO::FETCH_ASSOC);
            
            $user_id = (int) $User['user_id'];
            $hash = (string) $User['password'];

            if(password_verify($password, $hash)) {
                //User is signed in
                $return['redirect'] = '/dashboard.php';

                $_SESSION['user_id'] = $user_id;
            } else {
                // Invalid user email password combo 
                $return['error'] = "Invalid user email / password combo";
            }


            $return['error'] = "You already have an account";
        } else {
            // They need to create a new account
            $return['error'] = "Je hebt nog geen account, <a href='/register.php'>maak er een aan</a>";

        }


        $return['name'] = "Nick Koot";

        echo json_encode($return, JSON_PRETTY_PRINT); exit;

    }else {
        //Die, kill the script 
        exit('Invalid URL');
    }









    ?> 