<?php 
session_start();
require 'includes/common.php'; 
	//$balance=0;
	if($a1=$conn->prepare("SELECT `balance` FROM wallet where student_id=?"))
	{
		$a1->bind_param("s",$_SESSION['id']);
		if($a1->execute()===TRUE)
		{

		  $a1->bind_result($balance);
		  while ($a1->fetch()) 
					{
						$bal = $balance;
					}
		  
		}
	}	
			if($a1=$conn->prepare("UPDATE wallet SET `balance`=`balance`+? WHERE student_id=?"))
			{
					$a1->bind_param("ss",$_POST['amt'],$_SESSION['id']);
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