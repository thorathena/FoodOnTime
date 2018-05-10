<head>
<div class="navbar navbar-inverse navbar-fixed-top"> 
<div class="container"> 
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> 
<span class="icon-bar"></span> 
<span class="icon-bar"></span> 
<span class="icon-bar"></span> 
</button> 
<a class="navbar-brand" href="index.php">FoodOnTime</a> 
</div> 
<div class="collapse navbar-collapse" id="myNavbar"> 
<ul class="nav navbar-nav navbar-right"> 
<?php if (isset($_SESSION['id'])) { ?> 
<li><form class="navbar-form navbar-left navbar-dark bg-dark" method="GET" action="menu.php">
        <div class="form-group">
          <input type="text" style=" border-radius: 4px; padding: 7px 20px;"  placeholder="Search" name = "query">
        </div>
        <button type ="submit" class="btn btn-dark" name = "search"><span class = "glyphicon glyphicon-search " ></span></button>
      </form></li>
	<li><a href = "menu.php">
	<span class = "glyphicon glyphicon-list-alt"></span> Menu </a></li> 
	
	<li><a href = "cart.php">
	<span class = "glyphicon glyphicon-shopping-cart"></span> Cart </a></li> 
	
	<li class="dropdown"><a href = "#" class="dropdown-toggle" type="button" id="dropdownMenu1" class = "open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
	<span class = "glyphicon glyphicon-user"></span>
    
	<?php 
	echo $_SESSION['id'];
	
?><span class="caret"></span>  </a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="profile.php">Profile</a></li>
    <li><a href="wallet.php">wallet</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href = "logout.php"><span class = "glyphicon glyphicon-log-in"></span> Logout</a></li>
  </ul>
</li> 
	<li></li> 
	 
	<?php
	} else { 
		?> 
		<li><a href="signup.php"><span class="glyphicon glyphicon-user" class="dropdown-toggle"></span> Sign Up</a></li> 
		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		 <?php } ?> 
		 </ul> 
		 </div> 
		 </div> 
		 </div>