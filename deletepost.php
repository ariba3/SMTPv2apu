<?php
    include './config.php';
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM `post` WHERE id='$id'";
    mysqli_query($connection,$deleteQuery);
    header('location:homepage.php');
?>