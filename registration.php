<?php
session_start();

// initializing variables
$name = "";
$roll   = "";
$errors = array(); 

// connect to the database
$conn=new mysqli("localhost","root","","canteen");
	if(mysqli_connect_errno())
	{
		echo "errror:not connected";
	}
// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $roll = mysqli_real_escape_string($conn, $_POST['roll']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $dob = mysqli_real_escape_string($conn, $_POST['date']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Username is required "); }
  if (empty($roll)) { array_push($errors, "Id is required "); }
  if (empty($password)) { array_push($errors, "Password is required "); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM student WHERE id='$roll' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['id'] === $roll) {
      array_push($errors, "User already exists ");
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO student (name, id, password, dob, phone) 
  			  VALUES('$name', '$roll', '$password', '$dob', '$phone')";
  	if ($conn->query($query) === TRUE) 
{
    echo "New record created successfully";
	$query = "INSERT INTO wallet (student_id) 
  			  VALUES('$roll')";
	$conn->query($query);
} 
else 
{
    echo $conn->error;
}
$conn->close();
  	$_SESSION['id'] = $roll;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
if (count($errors) > 0) 
{
  	foreach ($errors as $error){ 
  	  echo $error."<br>" ;
  	}

}
}
?>