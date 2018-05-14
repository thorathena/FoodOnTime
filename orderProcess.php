<?php session_start();
require 'includes/common.php';
?>
<html>
<head>
<?php include 'includes/base.html';
include 'includes/header.php';
?>

<link rel="stylesheet" type="text/css" href="style.css">
<script src="myscripts.js"></script>
</head>
<br><br><br><br><br>
<?php
$date = date("Y/m/d");

//echo $date;
//code to generate order id.
					$handle = fopen("order.txt", "r");
					if(!$handle){
						
					 echo "could not open the file" ;

					}
					else {
						
						
						$cnt = (int ) fread($handle,20);
						fclose ($handle);
						$cnt++;
						//echo" <strong> you are visitor no ". $counter . " </strong> " ;
					$handle = fopen("order.txt", "w" );
					fwrite($handle,$cnt) ;
					fclose ($handle) ;
					}
					
if($_POST['pay']=="cod")
{
	$sql = "SELECT * FROM food_cart where stud_id='$_SESSION[id]'";
			

					





			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$query = "INSERT INTO orders (order_id,user_id,f_id,name,qty,price,paymethod,delivery_time,date)VALUES($cnt,'$_SESSION[id]',$row[f_id],'$row[name]',$row[qty],$row[f_price],'$_POST[pay]','$_POST[time]','$date')";
			
			$conn->query($query) ; 
				//echo "yes";
			}
			}
	mysqli_query($conn, "DELETE FROM food_cart WHERE stud_id='$_SESSION[id]' ");
?>
<div class="container">
<center>
<img src = "image/tick.png" height=150 width=150>
<h2>
<?php	echo "order placed successfully"; ?>
</h2>
<h4>
<?php	echo "order id: ".$cnt ; ?>
</h4>
</div>
<br>
			<div align="center">
                     <a href = "menu.php"><button class="btn btn-orange" >Go to Menu</button></a>
			</div>
<?php
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
?>
				<br><br><br><br>
				<div class="container">
				<center>
				<img src = "image/wallet.png" height=100 width=100>
				<h2>
				<?php	echo "Not enough funds. Add balance to your wallet"; ?>
				</h2>
				</center>
				</div>
				<div align="center">
                     <a href = "addBalance.php"><button class="btn btn-orange" >Add Balance</button></a>
				</div>
<?php			
		}
		else
		{
			$sql = "SELECT * FROM food_cart where stud_id='$_SESSION[id]'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$query = "INSERT INTO orders (order_id,user_id,f_id,name,qty,price,paymethod,delivery_time,date)VALUES($cnt,'$_SESSION[id]',$row[f_id],'$row[name]',$row[qty],$row[f_price],'$_POST[pay]','$_POST[time]','$date')";
			
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
?>			<br>
			<div class="container">
			<center>
			<img src = "image/tick.png" height=150 width=150>
			<h2>
			<?php	echo "order placed successfully"; ?>
			</h2>
			<h4>
			<?php	echo "order id: ".$cnt ; ?>
			</h4>
			</center>
			</div>
			<br>
			<div align="center">
                     <a href = "menu.php"><button class="btn btn-orange" >Go to Menu</button></a>
			</div>
			
			
			
<?php			
		}
	}
}
?>