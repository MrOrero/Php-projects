<?php
session_start();
require_once 'database.php';
require_once 'register-inc.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Monkey D. spatch</title>
	<link rel="stylesheet" href="includes/home1.css">
</head>
<body>
	<div class="wrapper">
			<nav class="navbar">

				<ul>
					<li><a class="active" href="index.php">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Feedback</a></li>
				</ul>
			</nav>
			<div class="center">
			<h1>Monkey D. spatch</h1>
		<!--	<h2>Create Something New</h2> -->
			<div class="buttons">
			<button><a href="userreg.php" style="text-decoration:none; color:#ffb3b3">User Section</a></button>
			<button class="btn2">
				<a href="register.php" style="text-decoration:none; color:#ffb3b3">Rider Section</a>
				</button>
		</div>
		</div>
</body>
</html>
