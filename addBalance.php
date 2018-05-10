<html>
<head>
<!-- adds bootstrap cdn -->
<?php include 'includes/base.html';?>

<link rel="stylesheet" type="text/css" href="loginPage.css">
</head>
<body>
<?php
session_start();
include 'includes/header.php';
?>
<br>
<br>
<br>

	<div class="container">
	<div class="row login_box">
	    <div class="col-md-12 col-xs-12" align="center">
            <br>
               
            <h1>Choose Method</h1>
           
	    </div>
        
       
        <div class="col-md-12 col-xs-12 login_control">
 			<div class="control">
                    <form action="addMoney.php" method="POST">
						  <input type="radio" name="addbalance" value="Credit card"> Credit<br>
						  <input type="radio" name="addbalance" value="Debit"> Debit<br>
						  <center><button class="btn btn-orange" >Proceed</button></center>
					</form>
            </div>                
        </div>
		
        
            
    </div>
	</div>
  		 
                   
			

<?php
include 'includes/footer.php';
?>
</body>
</html>