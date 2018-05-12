<?php session_start();
require 'includes/common.php';
?>
<html>
<head>
<?php include 'includes/base.html';?>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="myscripts.js"></script>
</head>
<?php
$cnt = 1;
if($_POST['pay']=="cod")
{
	$sql = "SELECT * FROM food_cart where stud_id='$_SESSION[id]'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$query = "INSERT INTO orders (order_id,user_id,f_id,name,qty,price,delivery_time)VALUES($cnt,'$_SESSION[id]',$row[f_id],'$row[name]',$row[qty],$row[f_price],'$_POST[time]')";
			
			$conn->query($query) ; 
				//echo "yes";
			}
			}
	mysqli_query($conn, "DELETE FROM food_cart WHERE stud_id='$_SESSION[id]' ");
	echo "order placed successfully";
}
else
{
	if($_POST['pay']=="wallet")
	{
		$sql = "SELECT `balance` FROM wallet";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		//echo $row['balance'];
		if($row['balance'] < $_POST['cost'])
		{
			echo "Not enough funds. Add balance to your wallet";
		}
		else
		{
			$sql = "SELECT * FROM food_cart where stud_id='$_SESSION[id]'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$query = "INSERT INTO orders (order_id,user_id,f_id,name,qty,price,delivery_time)VALUES($cnt,'$_SESSION[id]',$row[f_id],'$row[name]',$row[qty],$row[f_price],'$_POST[time]')";
			
			$conn->query($query) ; 
				//echo "yes";
			}
			}
			mysqli_query($conn, "DELETE FROM food_cart WHERE stud_id='$_SESSION[id]' ");
			
				if($a1=$conn->prepare("UPDATE wallet SET `balance`=`balance`-? WHERE student_id=?"))
			{
					$a1->bind_param("ss",$_POST['cost'],$_SESSION['id']);
					//if ($conn->query($query) === TRUE)
					if($a1->execute()===TRUE)
					
					{
						//echo "Data updated successfully";
						//header('Location:wallet.php'); 
					}
					
				$a1->close();
			}
		
			echo "order placed successfully";
		 
			
			
			
		}
	}
}
?>