<html>
<head>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="loginPage.css">

</head>
<?php
session_start();

	$conn=new mysqli("localhost","root","","canteen");
	
	if(mysqli_connect_errno())
	{
		echo "errror:not connected";
	
?>
<body>

<?php 
	}
	else{
		$res = array();
		include 'includes/header.php';
	if (isset($_SESSION['id'])) { 
		if($a1=$conn->prepare("SELECT `id`, `name`, `dob`, `phone` FROM student where id=? ")){
    $a1->bind_param("s",$_SESSION['id']);
    if($a1->execute()){

      $a1->bind_result($stud_id,$name,$date,$phn);
        while ($a1->fetch()) {
            $res['stud_id'] = $stud_id;
            $res['name'] = $name;
            $res['date'] = $date;
            $res['phn'] = $phn;		
            
        }
?>

		<br />
		<br />
		<br />
		
	<div class="container">
	<div class="row login_box">
	    <div class="col-md-12 col-xs-12" align="center">
            <br>
               
            <h1>Profile</h1>
           
	    </div>
        
       
        <div class="col-md-12 col-xs-12 login_control">
                
			  	
			
				
				<div class="control">
                    <div class="label">Name</div>
                    <input  class="form-control" value="<?php echo  $res['name'];?>" />
                </div>
				
				<div class="control">
                    <div class="label">User Id</div>
                    <input  class="form-control" value="<?php echo  $res['stud_id'];?>"/>
                </div>
			    
				
				
				<div class="control">
                    <div class="label">Date of Birth</div>
                    <input  class="form-control" value="<?php echo  $res['date'];?>" />
                </div>
				
				<div class="control">
                    <div class="label">Phone Number</div>
                    <input class="form-control" value="<?php echo  $res['phn'];?>" />
                </div>
				
                <div align="center">
                     <a href = "edit.php"><button class="btn btn-orange" >Edit</button></a>
                </div>
				
                
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


				</div>
			  
			</div>
		</div>
	</div>
</div>
</body>
</html>