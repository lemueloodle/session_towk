# PHP SESSION TOKEN, SALTING, ENCRYPTION and FILTER

Tweaked security for requesting API and passing input for query

-----------------------

## What does it contribute? 

*	Prevents outside request to get info from your database

*   Prevent CSRF Attack

*   Prevent SQL Injection (if using mysql, not PDO)

*	Decrease the chances of phishing

-------

### SESSION TOKEN + SALTING

From your main page, create a SESSION TOKEN for salting. You can use any number but not so long. *here I used 50
    
    $_SESSION['token'] = get_token(50); 
    
At the same page, create a secret key and encrypt it.

	$secret = encryptx("secretkey");

Concatenate Session Token and Secret key, and create a salted token

	$salted = $_SESSION['token'].$secret;


Now use the salted key to communicate with your Querying PHP file using (ajax post request);
From the Querying PHP File, compare the passed SESSION Token and Secret Key if valid.

	//The number should be equal to the SESSION Token number of string from main page
	$trimmed_secret = substr($salted_token, 50);

	//Decrypt the Secret Key
	$secret_key = decryptx("{$trimmed_secret}");

	//Trimmed Session Token
	$session_token = stristr($salted_token, $trimmed_secret, true);

	//Compare the SESSION Token and secret key string to the passed Salted Token
	if($_SESSION['token'] == $session_token && $secret_key == "secretkey"){
		//YOUR MYSQL QUERY HERE
	}	


### Prevent CSRF and SQL Injection Attack

	$passed_input = clean_input($_POST['data']);

    
