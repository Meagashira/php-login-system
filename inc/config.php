<?php

	// Als er geen CONSTANT is gedefinieerd genaamd __CONFIG__, laadt dit bestand dan niet. 
	if(!defined('__CONFIG__')) {
	exit('Er is geen config bestand');
	}
	// De config is hieronder


	//include het db bestand
	include_once 'classes/DB.php';
	$con = DB::getConnection();

?>