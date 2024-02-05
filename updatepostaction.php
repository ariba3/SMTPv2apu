<?php
    include 'config.php';
    $id = $_POST['id'];
 
    $status_text = $_POST['status_text'];
    $image = $_FILES['image'];

     $imageLocation = $_FILES['image']['tmp_name'];
     $imageName = $_FILES['image']['name'];
     $image_des = $imageName;
     move_uploaded_file($imageLocation,$image_des);

     $updateQuery = "UPDATE `post` SET `status_text`='$status_text',`image`='$image_des' WHERE id='$id'";

     if(mysqli_query($connection,$updateQuery)){
        echo "<script>alert('Updated!!! !!')</script>";
        echo "<script>location.href='homepage.php'</script>";
     }else{
        echo "<script>alert('not Updated!!! !!')</script>";
     }