<?php
require 'includes/common.php';


?>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="loginPage.css">
<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
</style>
</head>
<?php
include 'includes/header.php';
?>
<body>
<div class="container">
	<div class="row login_box">
	    <div class="col-md-12 col-xs-12" align="center">
            <br>
            <div class="outter"><img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="image-circle"/></div>   
            <h1>Hi Guest</h1>
           
	    </div>
        
       <form method="post" action="registration.php">
        <div class="col-md-12 col-xs-12 login_control">
                
			  	
				<div class="control">
                    <div class="label">Name</div>
                    <input type="text" class="form-control" name="name" required/>
                </div>
				
				<div class="control">
                    <div class="label">User Id</div>
                    <input type="email" class="form-control" name="roll" required/>
                </div>
			    
				<div class="control">
				    <div class="label">Password</div>
					<div class="tooltip"><span class="tooltiptext">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span></div>
                    <input type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
					
				</div>
				
				<div class="control">
                    <div class="label">Date of Birth</div>
                    <input type="date" class="form-control" name="date" required/><br>
                </div>
				
				<div class="control">
                    <div class="label">Mobile Number</div>
                    <input type="text" pattern="[0-9]{10}" title="Enter a valid phone no" class="form-control" name="phone" required/>
                </div>
				
                <div align="center">
                     <button class="btn btn-orange" type="submit" name="register">SIGN UP</button>
                </div>
				
                
        </div>
		</form>
        
        
            
    </div>
</div>
<br><br>
<footer class="footer navbar-fixed-bottom">
	<?php
include 'includes/footer.php';
?>
</footer>

</body>







</html>