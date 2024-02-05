<?php 
include 'connc.php';

if (isset($_POST['registration'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];

	$image=$_FILES['image']['name'];
    $image_type=$_FILES['image']['type'];
    $image_size=$_FILES['image']['size'];
    $image_tem_loc=$_FILES['image']['tmp_name'];
    $image_store="image/".$image;

    move_uploaded_file($image_tem_loc,$image_store);

	$sql="INSERT INTO user(name,email,password,image) values('$name','$email','$password','$image')";
	$query=mysqli_query($conn, $sql);

	if ($query) {
		echo "<script>";
		echo "alert('Registration Successful')";
		echo "</script>";
	}
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
		}
	</style>
</head>
<body>
    <div id="container">
    	<form action="registrationc.php" method="POST" enctype="multipart/form-data">
    	   <input type="text" name="name" placeholder="Enter Your Name" required><br><br>
    	   <input type="text" name="email" placeholder="Enter your Email" required><br><br>
    	   <input type="password" name="password" placeholder="Enter Your Password" required>
    	    <br><br>
    	    <input type="file" name="image" placeholder="Select Your Image" required><br><br>
    	   <input type="submit" name="registration" value="Registration"><br>
    	   <label>Already Have Account?</label> <a href="loginc.php">Login</a>
    		
    	</form>    	
    </div>
</body>
</html>