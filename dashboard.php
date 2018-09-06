<html>
<head>
<?php
session_start();
require 'includes/common.php'; 
 include 'includes/base.html';?>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><br><br><br>
<div class = "container" >

<?php include 'includes/header.php';
$sql = "SELECT * FROM orders WHERE `user_id`='$_SESSION[id]' ORDER BY order_id LIMIT 10 ";
									$result = $conn->query($sql);
?>	
<br><br><br>
<center><h2>Orders History</h2></center>
<br>
										
<table class="table">
<h5>
<tr>
<th>Order id</th>
<th>Food id</th>
<th>Name</th>
<th>qty</th>
<th>Price</th>
<th>Date</th>
<th>Status</th>
</tr>	
<?php									
									if ($result->num_rows > 0) 
									{
										// output data of each row
										while($row = $result->fetch_assoc()) {?>
										
											<tr>
												
												
												<td><?php echo $row['order_id']?></td>
												<td><?php echo $row['f_id']?></td>
												<td><?php echo $row['name'] ?></td>
												<td><?php echo $row['qty']?></td>
												<td><?php echo $row['price']?></td>
												<td><?php echo $row['date']?></td>
												<td><?php echo '('.$row['status'].')'?></td>
												
											<tr>
							  <?php 	}
									} ?>
</h5>
</table>

</body>
</html>