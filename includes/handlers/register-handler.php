<?php
function sanitizeFormPassowrd($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
}
function sanitizeFormUsername($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}
function sanitizeFormString($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

if(isset($_POST['signUpButton'])){
	// register button was pressed
	$username = sanitizeFormUsername($_POST['username']);
	$firstName = sanitizeFormString($_POST['firstName']);
	$lastName = sanitizeFormString($_POST['lastName']);
	$email = sanitizeFormString($_POST['email']);
	$email2 = sanitizeFormString($_POST['email2']);
	$password = sanitizeFormPassowrd($_POST['password']);
	$password2 = sanitizeFormPassowrd($_POST['password2']);

	$wasSuccessfull = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

	if($wasSuccessfull ==true){
		$_SESSION["userLoggedIn"] = $username;
		// redirect to the landing/home page
		header("Location: index.php");
	}
}


?>
