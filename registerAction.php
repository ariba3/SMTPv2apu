<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

session_start();

include './config.php';  


$r_username = $_REQUEST['r_username'];
$r_email = $_REQUEST['r_email'];
$r_pass = $_REQUEST['r_pass'];
$r_con_pass = $_REQUEST['r_con_pass'];


$username_pattern =  "/[a-zA-Z\s]/";
$email_pattern = "/^[a-zA-Z0-9._%+-]+@gmail\.com$/";
$password_pattern =  "/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@!#$%&_+<>])).{6,20}/";
$conpassword_pattern =  "/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@!#$%&_+<>])).{6,20}/";


$insert_query = "INSERT INTO idproduct(user_name, pass, conpass, user_email) VALUES ('$r_username','$r_pass','$r_con_pass','$r_email')";
$sqlQury = mysqli_query($connection, $insert_query);


$duplicate_email =mysqli_query($connection,"SELECT * FROM idproduct WHERE  user_email='$r_email'");
if(!mysqli_num_rows($duplicate_email)>0){
    echo "<script>alert('Email exists')</script>";
    echo "<script>location.href='register.php'</script>";
}


elseif(!preg_match($username_pattern ,$r_username))
{
    echo "<script>alert('invalid name!!')</script>";
    echo "<script>location.href='register.php'</script>";
}
elseif(!preg_match($email_pattern,$r_email))
{
    echo "<script>alert('invalid email!!')</script>";
    echo "<script>location.href='register.php'</script>";
}


elseif(!preg_match($password_pattern,$r_pass))
 {
    echo "<script>alert('invalid password!!')</script>";
    echo "<script>location.href='register.php'</script>";
}

elseif(!preg_match($conpassword_pattern,$r_con_pass))
 {
    echo "<script>alert('invalid password!!')</script>";
    echo "<script>location.href='register.php'</script>";
}


elseif($r_pass!=$r_con_pass)
 {
    echo "<script>alert('Paasword don't matched!!')</script>";
    echo "<script>location.href='register.php'</script>";
}


else{
        
    if(!( mysqli_query($connection, "INSERT INTO idproduct set user_name= '$r_username', user_email = '$r_email', pass = '$r_pass', conpass = '$r_con_pass'")))
    {
        echo "<script>alert('Not Inserted!!')</script>";
        echo "<script>location.href = 'register.php'</script>";
    }

    else {
        echo "<script> alert('SUCCESSFULLY registered')</script>";
        if (isset($_REQUEST['login'])) {
            
            $res = mysqli_num_rows($duplicate_email); //$res=1
            if ($res > 0) {
                $data = mysqli_fetch_array($duplicate_email);
                $name = $data['user_name'];
                $_SESSION['name'] = $name;
                $otp = rand(10000, 99999); //Generate OTP
                // include_once("SMTP/class.phpmailer.php");
                // include_once("SMTP/class.smtp.php");
                $message = '<div>
             <p><b>Hello!</b></p>
             <p>You are recieving this email because we recieved a OTP request for your account.</p>
             <br>
             <p>Your OTP is: <b>' . $otp . '</b></p>
             <br>
             <p>If you did not request OTP, no further action is required.</p>
            </div>';
                $email = $r_email;
                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "tls";
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->Username = "trinapaul487@gmail.com"; // Enter your username
                $mail->Password = "xexbczvtfyirinfy"; // Enter Password
                $mail->FromName = "Twic";
                $mail->AddAddress($email);
                $mail->Subject = "OTP";
                $mail->isHTML(TRUE);
                $mail->Body = $message;
                if ($mail->send()) {
                    $insert_query = mysqli_query($connection, "insert into otp_check set otp='$otp', is_expired='0'");
                    header('location:otpverify.php');
                } else {
                    $msg = "Email not delivered";
                }
            } else {
                $msg = "Invalid Email";
            }
        }
        // echo "<script> location.href = 'login.php'</script>";

    }
} 



