<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>MY CREW</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1><?php echo $title; ?></h1>
<?php  if(isset($_SESSION['username'])){?>
	<nav>
		<ul>
			<li><a href="index.php?rt=mycrew">My Profile</a></li>
			<li><a href="index.php?rt=login/out"> Log out </a></li>
		</ul>
	</nav>
<?php } else "samo nekaj ispis"?>
