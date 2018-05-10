<?php
session_start();
?>
<html>
<head>

<?php include 'includes/base.html';?>

<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background = "image\food.jpg">
<?php

include 'includes/header.php';
?>
<br>
<br>
<br>

<div id="banner_image">
	<div class= "container">
	<center>
		<div id="banner_content">
		<h1><b>Food On Time</b></h1>
		<h3>Order, eat and enjoy!</h3><br>
		<?php if (isset($_SESSION['id'])) {
			
?>
	<a href = "menu.php" class="btn btn-orange"> Menu </a>
<?php 
}
else
{
?> 
		<a href="signup.php" class="btn btn-orange">Sign Up </a><br><br>
		<a href="login.php" class="btn btn-orange">Login </a>
<?php 
		}
?>
		</div>
	</center>
	</div>
</div>
<?php
include 'includes/footer.php';
?>
</body>
</html>