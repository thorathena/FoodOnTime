<?php 
	echo $_POST['id'];
			/*if($a1=$conn->prepare("UPDATE food_cart SET `qty`= WHERE `f_id` AND `stud_id`=?"))
			{
					$a1->bind_param("ss",$_POST['currentVal'],$_SESSION['id']);
					//if ($conn->query($query) === TRUE)
					if($a1->execute()===TRUE)
					
					{
						echo "Data updated successfully";
						
					}
					else{
						echo "updation failed due to error.please make sure that you entered valid data";
					}
				$a1->close();
			}*/

?>