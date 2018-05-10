<?php 
session_start();
require 'includes/common.php'; 

	if($a1=$conn->prepare("SELECT  `balance` FROM wallet where student_id=? ")){
    $a1->bind_param("s",$_SESSION['id']);
    if($a1->execute()){

      $a1->bind_result($balance);
      
	  $balance = $balance + $_POST['amt'];
	
	
	if($a1=$conn->prepare("UPDATE wallet SET `balance`=? WHERE student_id=?"))
	{
			$a1->bind_param("ss",$balance,$_SESSION['id']);
			//if ($conn->query($query) === TRUE)
			if($a1->execute()===TRUE)
			
			{
				echo "Data updated successfully";
				header('Location:wallet.php'); 
			}
			else{
				echo "updation failed due to error.please make sure that you entered valid data";
			}
		$a1->close();
	}
?>