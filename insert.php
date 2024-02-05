<?php
include 'config.php';
session_start();

if (isset($_POST['status_text'])) {
    $user_id = $_SESSION['id'];
    $status_text = $_POST['status_text'];

    $imageLocation = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $image_des = $imageName;
    move_uploaded_file($imageLocation, $image_des);

    $insertQuery = "INSERT INTO `post`(`user_id`, `status_text`, `image`) VALUES ('$user_id','$status_text','$image_des')";

    if (mysqli_query($connection, $insertQuery)) {
        echo "<script>location.href='homepage.php'</script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>








