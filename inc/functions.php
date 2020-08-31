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

?>