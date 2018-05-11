<?php
session_start();
include 'includes/common.php';

 $query = "SELECT * FROM food_cart WHERE f_id='$_POST[f_id]'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
		
		if($a1=$conn->prepare("UPDATE food_cart SET `qty`=`qty`+? WHERE f_id=?"))
			{
					$a1->bind_param("ss",$_POST['quantity'],$_POST[f_id]);
					//if ($conn->query($query) === TRUE)
					if($a1->execute()===TRUE)
					
					{
						echo "Data updated successfully";
						header('Location:menu.php'); 
					}
					else{
						echo "updation failed due to error.please make sure that you entered valid data";
					}
				$a1->close();
			}
		
		
		
		
	}
	
	else{
		
		$query = "INSERT INTO food_cart(f_id,name,qty,stud_id,f_price,image)VALUES('$_POST[f_id]','$_POST[f_name]','$_POST[quantity]','$_SESSION[id]',$_POST[f_price],'$_POST[f_img]')";
			if ($conn->query($query) === TRUE) 
		{
			echo "New record created successfully";
			
		} 
/*else 
{
    echo $conn->error;
}
$conn->close();

if($a1=$conn->prepare(" food_cart SET `id`=?,`name`=?,`password`=?,`dob`=?,`phone`=? WHERE id=?")){
			$a1->bind_param("ssssss",$_POST['roll'],$_POST['name'],$_POST['password'],$_POST['date'],$_POST['phone'],$_SESSION['id']);
			if($a1->execute()===TRUE)
			{
				echo "Data updated successfully";
			}
			else{
				echo "updation failed due to error.please make sure that you entered valid data";
			}
		$a1->close();
		}*/
		
		header('Location:menu.php');
	}

?>