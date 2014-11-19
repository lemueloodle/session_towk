<?php
session_start();
include('php/anthrax.php');

//Create salt for Query 
$saltx = get_token(50);

//Creating a secret key only available to your page
$secretx = encryptx('secretkey');

//Create SESSION Token
$_SESSION['S3SX_token'] = $saltx.$secretx;
?>
<!DOCTYPE html>
<html>
<head>
<title>Session Token, Encryption and Filter</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="col-sm-12" style="margin-top:150px;">&nbsp;</div>
	<div class="col-sm-4">&nbsp;</div>
	<div class="col-sm-4">
		<div class="col-sm-12 text-array"><h3>Session Token, Encryption and Filter</h3></div>
		<div class="col-sm-12">
			<div class="form-group">
				<input type="text" class="form-control" id="x_text">
			</div>
		</div>
		<div class="col-sm-12">
		<button type="button" class="btn btn-primary x_send" pox-ms="<?php echo $x = $_SESSION['S3SX_token']; ?>">Send</button>
		</div>
	</div>
	<div class="col-sm-4">&nbsp;</div>	
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</html>