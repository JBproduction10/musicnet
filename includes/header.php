<?php
	//session_destroy();
	include("includes/config.php");
	include("includes/classes/Artist.php");
	include("includes/classes/Album.php");
	include("includes/classes/Song.php");
	
	if(isset($_SESSION["userLoggedIn"])){
		$userLoggedIn = $_SESSION["userLoggedIn"];
	}
	else{
		//redirect the user to the register page
		header("Location: register.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>splender</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>

	<body>
		
		<div id="mainContainer">

			<div id="topConatiner">
				<?php include("includes/navBarContainer.php"); ?>

				<div id="mainViewContainer">
					<div id="mainContent">