<html>

<head>
<?php include 'includes/base.html';?>
<link rel="stylesheet" type="text/css" href="loginPage.css">
</head>
<?php
	session_start();
	include 'includes/header.php';
	$conn=new mysqli("localhost","root","","canteen");
	
	if(mysqli_connect_errno())
	{
		echo "errror:not connected";
	
	}
	else
	{
		$res = array();
		
		if (isset($_SESSION['id'])) 
		{ 
			if($a1=$conn->prepare("SELECT `id`, `name`, `dob`, `phone`,`password` FROM student where id=? "))
			{
				$a1->bind_param("s",$_SESSION['id']);
				if($a1->execute())
				{

					$a1->bind_result($stud_id,$name,$date,$phn,$pass);
					while ($a1->fetch()) 
					{
						$res['stud_id'] = $stud_id;
						$res['name'] = $name;
						$res['date'] = $date;
						$res['phn'] = $phn;
						$res['pass'] = $pass;
					}
				}
			}
			else
			{
				echo "fail";
			}
			$a1->close();
		}
			
	}	
	
            
	
?>
<body>

<div class="container">
	<div class="row login_box">
	    <div class="col-md-12 col-xs-12" align="center">
            <br>
            
            <h1>Edit Profile</h1>
           
	    </div>
        
       <form method="post" action="edit_submit.php">
        <div class="col-md-12 col-xs-12 login_control">
                
			  	
				<div class="control">
                    <div class="label">Name</div>
                    <input type="text" class="form-control" name="name" value="<?php echo  $res['name'];?>" required/>
                </div>
				
				<div class="control">
                    <div class="label">User Id</div>
                    <input type="email" class="form-control" name="roll" value="<?php echo  $res['stud_id'];?>" required/>
                </div>
			    
				<div class="control">
                    <div class="label">Password</div>
                    <input type="password" class="form-control" name="password" value="<?php echo  $res['pass'];?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                </div>
				
				<div class="control">
                    <div class="label">Date of Birth</div>
                    <input type="date" class="form-control" name="date" value="<?php echo  $res['date'];?>" required/>
                </div>
				
				<div class="control">
                    <div class="label">Phone Number</div>
                    <input type="text" pattern="[0-9]{10}" title="Enter a valid phone no" class="form-control" name="phone" value="<?php echo  $res['phn'];?>" required/>
                </div>
				
                <div align="center">
                     <button class="btn btn-orange" type="submit" >Save</button> <a href = "profile.php" class="btn btn-orange"> Cancel </a>
                </div>
				
                
        </div>
		</form>
        
        
            
    </div>
</div>
<br><br>

</body>
</html>