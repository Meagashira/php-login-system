<?php

//Forceer gebruikers om in te loggen
function ForceLogin() {
    if(isset($_SESSION['user_id'])) {
		//akkoord
	} else{
		header("Location: /login.php"); exit;
	}
}

function ForceDashboard() {
    if(isset($_SESSION['user_id'])) {
		header("Location: /dashboard.php"); exit;
		//akkoord
	} else{
	}
}


function FindUser($con, $email, $return_assoc = false) {
    // make sure the user does not exit
    $email = (string) Filter::String($email);
    
    $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if($return_assoc) {
        return $findUser->fetch(PDO::FETCH_ASSOC);
    }
    
    $user_found = (boolean) $findUser->rowCount();
 
    return $user_found;    
}

?>