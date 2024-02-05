<?php
    include './config.php';
    session_start();
   $id = $_SESSION['id'];
    $update_name= $_POST['update_name'];
    $update_email=$_POST['update_email'];
   
     $imageLocation = $_FILES['update_image']['tmp_name'];
     $imageName = $_FILES['update_image']['name'];
     $image = "image/".$imageName;
     move_uploaded_file($imageLocation,$image);

     $updateQuery = "UPDATE `idproduct` SET `user_name`='$update_name',`user_email`='$update_email',`image`='$image' WHERE  id='$id'";
     if(mysqli_query($connection,$updateQuery)){
        echo "<script>alert('Updated!!! !!')</script>";
        echo "<script>location.href='./update_profie.php'</script>";
     }else{
        echo "<script>alert('not Updated!!! !!')</script>";
     }
     ?>
   