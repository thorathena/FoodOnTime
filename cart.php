
<html>
<head>
<?php include 'includes/base.html';?>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="myscripts.js"></script>
</head>

<?php

	$conn=new mysqli("localhost","root","","canteen");
	if(mysqli_connect_errno())
	{
		echo "errror:not connected";
	
	}
	session_start();
include 'includes/header.php';
?>
<body  >

<br><br><br><br>
<div class="col-lg-8 col-lg-offset-2">
	<div  style=" box-shadow: 2px 2px 5px 2px #aaaaaa">
		<div class="box" >
			<div align="center">
				<br>
				  
				<h1>Food cart</h1>
			   
			</div>
		</div>    
	
		   
			<div class=" box-control ">
				<div class="container ">		
					
					
		   
							<br>
							<br>
							<?php
							if (isset($_SESSION['id'])) 
							{
									$sql = "SELECT `f_id`,`name`,`qty`,`image`,`f_price` FROM food_cart";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) 
									{
										// output data of each row
										while($row = $result->fetch_assoc()) {?>
										<form  method="POST" action='line-item-rem.php'> 
											<div class="media" style="padding:5px">
											  <div class="media-left">
												<a href="#">
												  <img class="media-object" src="<?php echo $row['image']?>" alt="..." height=100 width = 100>
												</a>
											  </div>
											  <div class="media-body">
												<h4 class="media-heading"><?php echo $row["name"];?> </h4>
											<!--	<span>&#8377</span><?php //echo $row["price"];?><br> -->
												<h5>qty: <?php echo $row["qty"];?> </h5>
												<h5>price:<?php echo $row["qty"]*$row["f_price"]?></h5>
												<input type="hidden" name="f_id" value="<?php echo $row["f_id"];?>" />
												<button class="btn btn-grn" name="rem" type = "submit"></span> Remove</button></a>
											  </div>
											</div>
										</form>
							<?php				
										}
									} 
									else 
									{
										echo "0 results";
									}
								
							}
							?>
							<br>
							<br>
				</div>
			</div>
	</div>
</div>




</body>
</html>