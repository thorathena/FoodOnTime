
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
$count = 0;
$item = 0;
?>
<body  >

<br><br><br><br>
<div class = "row">
<div class="container">
<div class=" col-lg-7 ">
	<div  style=" box-shadow: 2px 2px 5px 2px #aaaaaa">
		<!--<div class="box" >
			<div align="center">
				<br>
				  
				<h1>Food cart</h1>
			   
			</div>
		</div> -->   
		<div>
		<br>
		<h4 style = "margin : 10px">My cart</h4>
		<hr>
		</div>
		   
			<div class=" box-control ">
				<div class="container ">		
					
					
		   
							<br>
							<br>
							<?php
							if (isset($_SESSION['id'])) 
							{
									$sql = "SELECT `f_id`,`name`,`qty`,`image`,`f_price` FROM food_cart WHERE `stud_id`='$_SESSION[id]'";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) 
									{
										// output data of each row
										while($row = $result->fetch_assoc()) {
										$sql= "SELECT `img` FROM menu WHERE `food_id`='$row[f_id]'";
										$imgres = $conn->query($sql);
										$img = $imgres->fetch_assoc();
										//echo $img['img'];
										?>
										<form  method="POST" action='line-item-rem.php'> 
										<div class="row justify-content-end">
											  <div col-6>
											<div class="media" style="padding:5px">
											
											  <div class="media-left">
												<a href="#">
												
												  <img class="media-object" src="<?php echo $img['img'];?>" alt="..." height=100 width = 100>
												</a>
											  </div>
											   
											  <div class="media-body">
											  
												<h4 class="media-heading"><?php echo $row["name"];?> </h4>
											<!--	<span>&#8377</span><?php //echo $row["price"];?><br> -->
												<h5><!--<input value = "<?php echo $row["qty"];?>" required> --></h5>
												<h5>price:<?php echo $row["qty"]*$row["f_price"]?></h5>
												<form id='' method='POST' action='cart.php'>
														<input type='button' value='-' class='qtyminus' field='<?php echo $row["f_id"];?>' />
														<input type='text' name='<?php echo $row["f_id"];?>' class='qty' value = "<?php echo $row["qty"];?>"/>
														
														<input type='button' value='+' class='qtyplus' field='<?php echo $row["f_id"];?>' />														
												</form>
											  </div>
												<?php $item = $item +1; ?>
												<?php $count = $count + ($row["qty"]*$row["f_price"]) ?> 
												<div col-4>
												<input type="hidden" name="f_id" value="<?php echo $row["f_id"];?>" /><br>
												<button class="btn btn-sm"name="rem" type = "submit"> Remove</button>
												</div>
											  </div>
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
<div class="col-lg-1"></div>
<div class="col-lg-4">
	<div>
		<br>
		<h4 style = "margin : 10px">Cart Summary</h4>
		<hr>
		</div>
		<h5> &nbsp&nbsp&nbsp Item      </span><?php echo $item ?></h5>
		<h5>&nbsp&nbsp&nbsp Amount payable     <span>&#8377 </span><?php echo $count ?></h5><br>
		<hr>
		<h5>&nbsp&nbsp&nbsp Choose delivery time</h5>
		<form action="payMethod.php" method="POST" > 
		&nbsp &nbsp&nbsp&nbsp<input name="time" type="time" /><br>
		<input name = "cost" type="hidden" value = "<?php echo $count ?>">
		<br>
		<center><button class="btn btn-grn" type = "submit"></span> Place Order</button></center>
		</form>
</div>
</div>
</div>




</body>
</html>