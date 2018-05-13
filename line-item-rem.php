<?php
session_start();
$conn=new mysqli("localhost","root","","canteen");
	if(mysqli_connect_errno())
	{
		echo "errror:not connected";
	
	}
echo $_POST['f_id'];
if(isset($_POST['rem'])){
mysqli_query($conn, "DELETE FROM food_cart WHERE f_id='$_POST[f_id]' AND stud_id='$_SESSION[id]' ");

    echo "deleted successfully";
	
 
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
		
		header('Location:cart.php');

?>