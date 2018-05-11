
<html>
<head>
<?php include 'includes/base.html';?>
<link rel="stylesheet" type="text/css" href="loginPage.css">
</head>
<body>
<?php
session_start();
include 'includes/header.php';
?>
<br>
<br>
<br>

<?php 

	$conn=new mysqli("localhost","root","","canteen");
	
	if(mysqli_connect_errno())
	{
		echo "errror:not connected";
	
	}
	else{
		$res = array();
		
	if (isset($_SESSION['id'])) { 
		if($a1=$conn->prepare("SELECT `wallet_id`, `student_id`, `balance` FROM wallet where student_id=? ")){
    $a1->bind_param("s",$_SESSION['id']);
    if($a1->execute()){

      $a1->bind_result($wallet_id,$student_id,$balance);
        while ($a1->fetch()) {
            $res['wallet_id'] = $wallet_id;
            $res['student_id'] = $student_id;
            $res['balance'] = $balance;
            	
            
        }
?>
<br />
		<br />
		<br />
		
	<div class="container">
	<div class="row login_box">
	    <div class="col-md-12 col-xs-12" align="center">
            <br>
               
            <h1>Wallet</h1>
           
	    </div>
        
       
        <div class="col-md-12 col-xs-12 login_control">
 			<div class="control">
                    <div><center><h3>Available Balance:&nbsp
                    <?php echo  $res['balance'];?></h3></center></div>
        </div>
		<div align="center">
                     <a href = "addBalance.php"><button class="btn btn-orange" >Add Balance</button></a>
        </div>
        
            
    </div>
	</div>
		
			  	
  
			  

<?php 
		

    }
    }
			else{
				echo "fail";
			}
		$a1->close();
		}
		
	}	
	
	
	


?>

<?php
include 'includes/footer.php';
?>
</body>
</html>