<?php 
session_start();
include 'connc.php';
error_reporting(0);


if (isset($_POST['login'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql="SELECT * from user where email='$email' and password='$password'";
	$query=mysqli_query($conn,$sql);
	$data=mysqli_fetch_array($query);

	if ($data['email'] == $email && $data['password']==$password) {
		$_SESSION['name']=$data['name'];
		$_SESSION['email']=$data['email'];
		$_SESSION['password']=$data['password'];
		$_SESSION['image']=$data['image'];
	}else{
		echo "<script>";
		echo "alert('Wrong email or password. Try Again!')";
		echo "</script>";
	}
	
}

if (isset($_SESSION['email'])){
	header("location:chat.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chat App</title>
	<style type="text/css">
				#container{
			border: 1px solid black;
			width: 300px;
			padding: 30px;
			margin-left: 450px;
			margin-top: 100px;
		}
		input[type="text"],input[type="password"]{
			width: 250px;
			height: 40px;
			padding: 5px;
		}
		input[type="submit"]{
			margin-left: 100px;
			background-color: blue;
			color: white;
			font-weight: bold;
			padding: 5px;
			border: 1px solid blue;
		}
		input[type="submit"]:hover{
			cursor: pointer;
			background-color: darkcyan;
			color: white;
		}
	</style>
</head>
<body>
   <div id="container">
   		<form action="loginc.php" method="POST">
   			<input type="text" name="email" placeholder="Enter Your Email" required><br><br>
   			<input type="password" name="password" placeholder="Enter Your Password" required><br><br>
   			<input type="submit" name="login" value="Login"><br>
   			<label>Don't have account ?</label><a href="registrationc.php">Sign Up</a>
   		</form>
   </div>
</body>
</html>