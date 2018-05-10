<?php
session_start();
	$conn=new mysqli("localhost","root","","canteen");
	if(mysqli_connect_errno())
	{
		echo "errror:not connected";
	}
	else{
		if($a1=$conn->prepare("UPDATE student SET `id`=?,`name`=?,`password`=?,`dob`=?,`phone`=? WHERE id=?")){
			$a1->bind_param("ssssss",$_POST['roll'],$_POST['name'],$_POST['password'],$_POST['date'],$_POST['phone'],$_SESSION['id']);
			if($a1->execute()===TRUE)
			{
				echo "Data updated successfully";
			}
			else{
				echo "updation failed due to error.please make sure that you entered valid data";
			}
		$a1->close();
		}
		
		header('Location:profile.php');
	
	
	}


?>