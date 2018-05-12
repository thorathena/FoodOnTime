<?php
require 'includes/common.php';


?>
<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="loginPage.css">
<link rel="stylesheet" type="text/css" href="style.css">
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
        
        <form method="POST" action="login_submit.php">
        <div class="col-md-12 col-xs-12 login_control">
                
                <div class="control">
                    <div class="label">User Id</div>
                    <input type="text" class="form-control" name="id" value="admin@gmail.com"/>
                </div>
                
                <div class="control">
                     <div class="label">Password</div>
                    <input type="password" class="form-control" name="password" value="123456"/>
                </div>
                <div align="center">
                     <button class="btn btn-orange" type="submit" name="login">LOGIN</button>
                </div>
                
        </div>
		</form>
        
        
            
    </div>
</div>
</body>







</html>