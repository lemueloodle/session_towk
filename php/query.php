<?php
session_start();
include('anthrax.php');

if(isset($_POST['key'])){
	//Clean input from CSRF Attack and Injection
	$salted_token = clean_input($_POST['key']); 
}
else
	$salted_token = "";

if(isset($_POST['e_data'])){
	//Clean input from CSRF Attack and Injection
	$passed_input = clean_input($_POST['e_data']); 
}
else
	$passed_input = "";

//If passed values are not empty
if($salted_token != "" && $passed_input != ""){
	
	//The number should be equal to the SESSION token number of string
	$trimmed_secret = substr($salted_token, 50);

	//Decrypt the Secret Key
	$secret_key = decryptx("{$trimmed_secret}");

	//Trimmed Session Token
	$session_token = stristr($salted_token, $trimmed_secret, true);

	//For the purpose of double checking of conditions;
	//This also serves as to compare the secret key from mainpage if correct
	if($_SESSION['S3SX_token'] == $session_token && $secret_key == "secretkey"){
		echo "{";
		echo '"key" : "'.$passed_input.'"';
		echo "}";

		//INPUT YOUR QUERY HERE
	}
	else{
		echo "{";
		echo '"key" : "?"';
		echo "}";
	}
}
else{
	header("Location: ../index.php");
}
?>