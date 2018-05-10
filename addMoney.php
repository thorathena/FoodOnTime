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

	<div class="row login_box">
	<form method="post" action="addMoney1.php"> 
        <div class="col-md-12 col-xs-12 login_control">
                
			  	
				<div class="control">
                    <input type="text" class="form-control" name="amt"  placeholder="Enter Amount" required/>
                </div>
				
				<div class="control">
                    <input type="text" pattern="[0-9]{16}" title="Enter a valid card no" class="form-control" name="credit" id="credit" placeholder="card number" required/>
                </div>
			    
				<div class="control">
                    <input type="text" pattern="(0[1-9]|1[0-2])/([0-9]{4}|[0-9]{2})" title="Enter a valid expiry date" class="form-control" name="expiry" id="expiry" placeholder="MM/YY" required/>
                </div>
				
				<?php
					if($_POST['addbalance']=="Debit"){
				?>
						<div class="control">
							<input type="text" pattern="[[0-9]{3}" title="Enter a valid cvv" class="form-control" name="cvv" id="cvv" placeholder="CVV" required/>
						</div>
				<?php
					}
				?>
			<!--	<div class="control">
                    <input type="date" class="form-control" name="date" value="<?php //echo  $res['date'];?>" required/>
                </div>
				
				<div class="control">
                    <div class="label">Phone Number</div>
                    <input type="text" pattern="[0-9]{10}" title="Enter a valid phone no" class="form-control" name="phone" value="<?php echo  $res['phn'];?>" required/>
                </div>
				
                <div align="center">
                     <button class="btn btn-orange" type="submit" >Save</button> <a href = "profile.php" class="btn btn-orange"> Cancel </a>
                </div>
				
                
        </div>-->
				<center><button class="btn btn-orange" type="submit" >Add Money</button></center>
	</form>
	</div>
</body>
</html>