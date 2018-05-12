
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
<body  background = "image\bg5.jpg">

<br><br><br><br>
<div class="col-lg-8 col-lg-offset-2">
	<div  style=" box-shadow: 2px 2px 5px 2px #aaaaaa">
		<div class="box" >
			<div align="center">
				<br>
				  
				<h1>Menu</h1>
			   
			</div>
		</div>    
	
		   
			<div class=" box-control ">
				<div class="container ">		
					
					
		   
							<br>
							<br>
							<?php
							if (isset($_SESSION['id'])) 
							{
								if(isset($_GET['search']))
								{
									
									$query = $_GET['query']; 
									// gets value sent over search form
									 
									$min_length = 1;
									// you can set minimum length of the query if you want
									 
									if(strlen($query) >= $min_length)
									{ // if query length is more or equal minimum length then
													 
										$qry = "SELECT `food_id`,`food_name`,`price`,`img` FROM menu WHERE (`food_name` LIKE '%".$query."%')";
										$srch_result = $conn->query($qry);	 
										
										if($srch_result->num_rows > 0)
										{ // if one or more rows are returned do following
											 
											while($res = $srch_result->fetch_assoc())
											{
							?>
												<div class="media">
												  <div class="media-left">
													<a href="#">
													  <img class="media-object" src="<?php echo $res['img']?>" alt="..." height=100 width = 100>
													</a>
												  </div>
												  <div class="media-body">
																							
													<form id="<?php echo $res["food_id"];?>" method="post" action='line-item.php'>	 
												<h4 class="media-heading"><?php echo $res["food_name"];?> </h4>
												<span>&#8377</span><?php echo $res["price"];?><br>
												<div><input type="text" name="quantity" value="1" size="2" /></div>
												<input type="hidden" name="f_id" value="<?php echo $res["food_id"];?>" />
												<input type="hidden" name="f_name" value="<?php echo $res["food_name"];?>" />
												<input type="hidden" name="f_price" value="<?php echo $res["price"];?>" />
												<input type="hidden" name="f_img" value="<?php echo $res["img"];?>" />
												<button class="btn btn-grn" type = "submit"><span class = "glyphicon glyphicon-shopping-cart"></span>Add to cart</button></a>
											  </div>
												</form>	
												</div>
												
							<?php					
											}
										 
										}
										else
										{ // if there is no matching rows do following
											echo "No results";
										}
									}
								}
								

								
								
								else{
									$sql = "SELECT `food_id`,`food_name`,`price`,`img` FROM menu";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) 
									{
										// output data of each row
										while($row = $result->fetch_assoc()) {?>
										<form id="<?php echo $row["food_id"];?>" method="post" action='line-item.php'>
											<div class="media" style="padding:5px">
											  <div class="media-left">
												<a href="#">
												  <img class="media-object" src="<?php echo $row['img']?>" alt="..." height=150 width = 150>
												</a>
											  </div>
											  <div class="media-body">
												<h4 class="media-heading"><?php echo $row["food_name"];?> </h4>
												<span>&#8377</span><?php echo $row["price"];?><br>
												<div><input type="text" name="quantity" value="1" size="2" /></div>
												<input type="hidden" name="f_id" value="<?php echo $row["food_id"];?>" />
												<input type="hidden" name="f_name" value="<?php echo $row["food_name"];?>" />
												<input type="hidden" name="f_price" value="<?php echo $row["price"];?>" />
												<input type="hidden" name="f_img" value="<?php echo $row["img"];?>" />
												<button class="btn btn-grn" type = "submit"><span class = "glyphicon glyphicon-shopping-cart"></span>Add to cart</button></a>
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
							}
							?>
							<br>
							<br>
				</div>
			</div>
	</div>
</div>


<script>
function cartAction(action) {
	document.getElementById("txt").innerHTML="Added to cart";
	
	
}
</script>

</body>
</html>