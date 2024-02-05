<?php

include 'config.php';  
if(isset($_POST['insert'])){
    
$r_username = $_POST['r_username'];
$r_email = $_POST['r_email'];
$r_pass = $_POST['r_pass'];
$r_con_pass = $_POST['r_con_pass'];
$r_mobile = $_POST['r_mobile'];

}

$username_pattern =  "/[a-zA-Z\s]/";
$email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$phone_pattern =  "/(\+88)?-?01[3-9]\d{8}/";
$password_pattern =  "/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@!#$%&_+<>])).{6,20}/";
$conpassword_pattern =  "/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@!#$%&_+<>])).{6,20}/";

$insert_query = "INSERT INTO idproduct set user_name= '$r_username', user_email = '$r_email', pass = '$r_pass', conpass = '$r_con_pass',user_number = '$r_mobile'  ";

$sqlQury = mysqli_query($connection, $insert_query);




