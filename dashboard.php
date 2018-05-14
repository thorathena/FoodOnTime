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
<table class="table">
	
<?php									
									if ($result->num_rows > 0) 
									{
										// output data of each row
										while($row = $result->fetch_assoc()) {?>
										
										<br><br>
												<div>
												<h5>Order id:
												<?php echo $row['order_id']?><br>
												<?php echo $row['f_id']?>&nbsp<?php echo $row['name'] ?>&nbsp&nbsp<?php echo $row['price']?>&nbsp<?php echo $row['qty']?><br>
												<?php echo $row['date']?>&nbsp<?php echo '('.$row['status'].')'?>
												</h5>
									
							  <?php 	}
									} ?>
</table>

</body>
</html>