<?php

include 'config.php';
session_start();
//$id = $_SESSION['id'];

/*if(isset($_SESSION['id'])){
   echo $_SESSION['id'];
}
/*
if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($connection, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($connection, $_POST['update_email']);
   

   mysqli_query($connection,"SELECT * FROM `crud`WHERE user_name='$l_username' And pass='$l_pass'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($connection, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($connection, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($connection, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `crud` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($connection, "UPDATE `crud` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./style3.css">

</head>
<body>
   
<div class="update-profile">

   <?php
   
   if(isset($_SESSION['id'])){
      $id= $_SESSION['id'];
      $select = mysqli_query($connection, "SELECT * FROM idproduct WHERE id = '$id'") or die('query failed');
      $data = mysqli_fetch_assoc($select);
   }
   
   ?>

<form action="./updateAction.php"  id="form-data" enctype="multipart/form-data" method="post">
                          

  <img src='<?php echo  $data['image'];?>' alt='Image' width='100px'   >
      <div class="flex">
         <div class="inputBox">
       
            <span>Username :</span>
            <input type="text" name="update_name" value="<?php echo $data['user_name'] ?>" required class="box">
            
                    
            <span>Email :</span>
            <input type="email" name="update_email" value="<?php echo $data['user_email'] ?>"required class="box">
       
            <span>Update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png"  value="<?php echo $data['image'] ?>"required class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $data['pass']; ?>">
            <span>Old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>New password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>Confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <div>
      <input type="hidden" name='id' value="<?php echo $id?>">
   <input class="btn btn-warning col-12" type="submit" name="update" value="update" id="updatebtn">
      <a  href="./homepage.php" class="delete-btn">go back</a>
   </div>
   </form>
 


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).on('click', '#updatebtn', function () {
    
            $.ajax({
                url: './updateAction.php',
                method: 'POST',
                data: $("#form-data").serialize(),
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (!response.error) {
                     window.location.reload();
                    }
                }
            });
        });
        </script>
        
</body>
</html>