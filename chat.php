<?php 
session_start();
include 'connc.php';

if (isset($_SESSION['email'])) {
	//echo "Welcome ".$_SESSION['name'];
	$email=$_SESSION['email'];
}else{
	header("location:loginc.php");
}

if (isset($_POST['send'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$image=$_POST['image'];
	$message=$_POST['message'];

	$sql="INSERT INTO message(name, email, image, message) values('$name','$email','$image','$message')";
	$query=mysqli_query($conn,$sql);

	 header("Location: chat.php");
    exit(); // Ensure that no further code is executed after the header
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chat App</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style type="text/css">
		body{
			background-color: #F0F2F5;
		}
		#container{
			border: 1px solid white;
			height: 540px;
			width: 620px;
			margin-left: 350px;
			background-color: white;
			box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
		}
		#chat{
			border: 1px solid white;
			width: 600px;
			height: 350px;
			margin-left: 0px;
			max-height: 350px;
			overflow: auto; 
			padding: 10px;
		}
		#message{
			margin-left: 20px;
			margin-top: 10px;
		}
		#message_box{
			width: 450px;
			height: 60px;
			background-color: #E4E6EB;
			border-radius: 20px;
			border: 1px solid #E4E6EB;
			padding-left: 20px;
			float: left;
		}
		#send{
			width: 100px;
			height: 60px;
			border-radius: 20px;
			margin-left: 10px;
			border: 1px solid #E4E6EB;
			background-color: #E4E6EB;
			
		}
		#send:hover{
			background-color: blue;
			cursor: pointer;
		}
		#chat_box_message1{
			border: 1px solid #0099FF;
			background-color: #0099FF;
			/*max-width: 120px;*/
			max-width: 30%;
			margin-left: 350px;
            overflow-y: auto;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 10px;
            height: auto;
            /*box-sizing: border-box;
            width: auto;*/
            color: white;
            margin-top: 20px;

		}
		#chat_box_message2{
			border: 1px solid #E4E6EB;
			background-color: #E4E6EB;
			max-width: 30%;
            overflow-y: auto;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 10px;
            margin-left: 25px;
            height: auto;
            float: ;
            margin-top: 20px;

		}
		img{
			width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            float: left;
            margin-left: 10px;
            margin-top: 9px;
		}
		#logout{
			float: left;
			font-weight: bold;
			text-decoration: none;
			float: right;
			margin-right: 30px;
			margin-top: 24px;

		}
		#logout:hover{
			color: red;
		}
		#send_icon:hover{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="" style=""> 
			<img src="image/<?php echo $_SESSION['image'] ?>">
			<label style="float: left; margin-left: 10px; margin-top: 27px; font-weight: bold;"></label> <a id="logout" href="homepage.php">Home</a>
			 <label style="float: left; margin-left: 10px; margin-top: 27px; font-weight: bold;"><?php echo $_SESSION['name']; ?></label> <a id="logout" href="logoutc.php">Logout</a><br><br><br>
			<hr>
		 </div>
		 <div id="chat">
		 	
		 		<?php 
		 			$sql1="SELECT name, email, message, DATE_FORMAT(time, '%M %e at %l:%i %p') AS time2,image from message";
		 			$query1=mysqli_query($conn,$sql1);

		 			if (mysqli_num_rows($query1) > 0){
		 				while ($row=mysqli_fetch_array($query1)) {
		 				if ($row['email'] == $email) {
		 					?>
		 				<div id="chat_box_main1">

		 					<div id="chat_box_message1">
		 					 <?php 
		 						echo $row['message'];
		 					 ?>
		 					</div>
		 					<div style="margin-left: 400px;">
		 						<?php
		 						 echo $row['time2'];
		 						  
		 						?>
		 					</div>
		 			   </div>
 
		 				<?php 
		 				}else{
		 					?>
		 					<div id="chat_box_main2">
		 					<img style="margin-right: 10px;" src="image/<?php echo $row['image'] ?>"> 
		 					<div id="chat_box_message2">
		 					 <?php 
		 						echo $row['message'];
		 					  ?>
		 					</div>
		 					  <div style="margin-left: 120px; margin-top: ;">
		 						<?php
		 						 echo $row['time2'];
		 						?>
		 					</div>
		 			       </div>

		 					<?php 
		 				}
		 			}
		 		}
		 		?>
		 	
		 </div>
		 <div id="message">
		 	<form action="chat.php" method="POST">
		 		<input id="message_box" type="text" name="message" placeholder="Write message" required>
		 		<input type="text" name="name" value="<?php echo $_SESSION['name'] ?>" hidden>
		 		<input type="text" name="email" value="<?php echo $_SESSION['email'] ?>" hidden>
		 		<input type="text" name="image" value="<?php echo $_SESSION['image'] ?>" hidden>
		 	    <!--input id="send" type="submit" name="send" value="Send"-->
		 	    <button  id="send_icon" type="submit" name="send" style="background: none;border: none;">
		 	    	<img style="width: 70px;height: 57px; float: left; margin-top: 0px;" src="image/sendimg.png">
		 	    </button>	
		 	</form>
		 	
		 </div>
	</div>
</body>
</html>