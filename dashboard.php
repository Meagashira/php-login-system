<?php 

	//Allow the config
	define('__CONFIG__', true);
	//Require the config
	require_once "inc/config.php"; 

	ForceLogin();

	$user_id = $_SESSION['user_id'];

	$getUserInfo = $con->prepare("SELECT email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
	$getUserInfo->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$getUserInfo->execute();

	if($getUserInfo->rowCount() == 1) {
// User was found
$User = $getUserInfo->fetch(PDO::FETCH_ASSOC);
	} else {
		// User is not signed in...
		header("Location: /logout.php"); exit;
	}

?> 

<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="robots" content="follow">

		<title>Pagina titel</title>

		<base href="/" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css">
	</head>

	<body>

		<div class="uk-section uk-container"> 
	<h2>Dashboard</h2>
	<p>Hallo <?= $User['email'];?>, je bent geregistreerd op <?=$User['reg_time'];?></p>
	<p><a href="logout.php">Log uit</a></p>
		</div>

		<?php require_once "inc/footer.php"; ?>


	</body>
</html>
