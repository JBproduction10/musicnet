<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	//this function make the browser remember the input value inserted previously
	function getInputValue($name){
		if (isset($_POST[$name])){
			echo $_POST[$name];
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Splender</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>

	<meta charset="utf-8">
	<meta name="author" content="Jonathan Bangala">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<?php 
		if(isset($_POST['registerButton'])){
			echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				})
				</script>';
			}else{
				echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				})
				</script>';
			}

	?>
	<div id="background">
		<div id="loginContainer">
			<div id ="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed);?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" type="text" name="loginUsername" placeholder="username" value="<?php getInputValue('$loginUsername') ?>"required="loginUsername">
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" type="password" name="loginPassword" placeholder="password" required="loginPassword">
					</p>
					<button type="submit" name="loginButton">Log In</button>

					<div class="hasAccountText">
						<span id="hideLogin">Don`t have an account yet? Signup here.</span>
					</div>
				</form>

				<!-- ------------------------------egister form---------------------------------- -->
				<form id="registerForm" action="register.php" method="POST">
					<h2>Create an account</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Username</label>
						<input id="username" type="text" name="username" placeholder="user name" value="<?php getInputValue('username'); ?>" required="username">
					</p>
					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">First name</label>
						<input id="firstName" type="text" name="firstName" placeholder="eg: John" value="<?php getInputValue('firstName'); ?>" required="firstName">
					</p>
					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Last name</label>
						<input id="lastName" type="text" name="lastName" placeholder="eg: Smith" value="<?php getInputValue('lastName'); ?>" required="lastName">
					</p>
					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" type="email" name="email" placeholder="eg: example@gmail.com" value="<?php getInputValue('email') ?>" required="email">
					</p>
					<p>
						<label for="email2">Confirm email</label>
						<input id="email2" type="email" name="email2" placeholder="eg: example@gmail.com" value="<?php getInputValue('email2')?>" required="email2">
					</p>

					<p>
						<?php echo $account->getError( Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Password</label>
						<input id="password" type="password" name="password" placeholder="password" required="loginPassword">
					</p>
					<p>
						<label for="password2">Confirm password</label>
						<input id="password2" type="password" name="password2" placeholder="Confirm password" required="password2">
					</p>
					<button type="submit" name="signUpButton">Sign Up</button>

					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here.</span>
					</div>
				</form>
			</div>

			<div id="loginText">
				<h1>Get great music, right now</h1>
				<h2>Listen to loads of songs for free</h2>
				<ul>
					<li><img src="https://img.icons8.com/emoji/48/000000/check-mark-emoji.png"/>Dicover music you will fall in love with</li>
					<li><img src="https://img.icons8.com/emoji/48/000000/check-mark-emoji.png"/>Create your own playlists</li>
					<li><img src="https://img.icons8.com/emoji/48/000000/check-mark-emoji.png"/>Follow artists to keep up to date</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>