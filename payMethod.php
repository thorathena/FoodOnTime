<?php
session_start();
?>
<html>
<head>

<?php include 'includes/base.html';?>
<link rel="stylesheet" type="text/css" href="loginPage.css">
<script type="text/javascript" src="modify_records.js"></script>
</head>
<body>
<div class="container">


	<div class="row login_box">
	<form method="post" action=""> 
        <div class="col-md-12 col-xs-12 login_control">
                 <center><h2>Choose Payment Method</h2></center>
           <hr>
		   <div class="container">
			   <h4><input type="radio" name="pay" value="wallet"> Wallet</h4><br>
						  <h4><input type="radio" name="pay" value="cod"> Cash On Delivery</h4><br>
						  	
			</div>	
			<center><button class="btn btn-orange" >Proceed to pay</button></center>
	</form>
		      
        </div>
		
        
            
    </div>
	</div>
</body>
</html>