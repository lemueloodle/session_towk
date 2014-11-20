<?php
session_start();
include('php/anthrax.php');

//Create Session Token for Query 
$_SESSION['S3SX_token'] = get_token(50); //You can put any number you want, but not so long

//Creating a secret key only available to your page
$secret = encryptx("secretkey");

//Create Salt, SESSION Token + Encrypted Secret Key
$salt = $_SESSION['S3SX_token'].$secret;
?>
<!DOCTYPE html>
<html>
<head>
<title>Session Token, Salting, Encryption and Filter</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="col-sm-12" style="margin-top:150px;">&nbsp;</div>
	<div class="col-sm-4">&nbsp;</div>
	<div class="col-sm-4">
		<div class="col-sm-12 text-array"><h3>Session Token, Salting & Filter</h3></div>
		<div class="col-sm-12">
			<div class="form-group">
				<input type="text" class="form-control" id="x_text">
			</div>
		</div>
		<div class="col-sm-12">
		<button type="button" class="btn btn-primary x_send" pox-ms="<?php echo $salt;?>">Send</button>
		</div>
	</div>
	<div class="col-sm-4">&nbsp;</div>
	<div class="col-sm-12">	
		<div class="col-sm-4">&nbsp;</div>
		<div class="col-sm-4 x_display" style="margin-top:50px;"></div>
		<div class="col-sm-4">&nbsp;</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</html>