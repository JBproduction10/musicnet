<?php
if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);

	if($result == true) {
		// creating a session a user has logged in
		$_SESSION["userLoggedIn"] = $username;
		header("Location: index.php");
	}

}
?>