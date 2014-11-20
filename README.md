# PHP SESSION TOKEN, SALTING, ENCRYPTION and FILTER

Tweaked security for requesting API and passing input for query

-----------------------

## What does it contribute? 

*	Prevents outside request to get info from your database

*   Prevent CSRF Attack

*   Prevent SQL Injection

*	Decrease the chances of your website being hacked

-------

### SESSION TOKEN + SALTING

From your main page, create a SESSION TOKEN for salting
    
    $_SESSION['token'] = get_token();
    
At the same page, create a secret key and encrypt it.

	$secret = encryptx("secretkey");

Concatinate Session Token and Secret key, and create a salted token

	$salted = $_SESSION['token'].$secret;

Now use the salted key to communicate with your backend using (ajax post request) and if statement



### Prevent CSRF and SQL Injection Attack

	$passed_input = clean_input($_POST['data']);

    

