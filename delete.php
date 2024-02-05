<?php
    include 'config.php';
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM `idproduct` WHERE id='$id'";
    mysqli_query($connection,$deleteQuery);
    header('location:register.php');