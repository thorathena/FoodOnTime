<?php 
session_start();
//$error = array();
$conn=new mysqli("localhost","root","","canteen");
	if(mysqli_connect_errno())
	{
		echo "errror:not connected";
	}
//if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['id']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  /*if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
*/
  //if (count($errors) == 0) {
  //	$password = md5($password);
  	$query = "SELECT * FROM student WHERE id='$username' AND password='$password'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['id'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
	  $_SESSION['name'] = " ";
	  $_SESSION['date'] = " ";
	  $_SESSION['phone'] = " ";
  	  header('location: index.php');
  	}else {
  		echo "Wrong username/password combination/empty fields";
  	}
  //}
//}
/*else
{
	echo "error";
}*/
?>
