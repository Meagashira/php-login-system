<?php

	// Als er geen CONSTANT is gedefinieerd genaamd __CONFIG__, laadt dit bestand dan niet. 
	if(!defined('__CONFIG__')) {
	exit('Er is geen config bestand');
	}

	//Sessions are always turned on
	if(!isset($_SESSION)) {
		session_start();
	}

	// De config is hieronder


	//include het db bestand
	include_once 'classes/DB.php';
	include_once 'classes/Filter.php';
	include_once 'classes/User.php';
	include_once 'classes/Page.php';
	include_once 'functions.php';

	$con = DB::getConnection();

?>