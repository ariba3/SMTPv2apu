
<?php  

$serverName="localhost";
$username="root";
$password="";
$dbName="r_regi";
$connection= mysqli_connect($serverName,$username,$password,$dbName);




if(!$connection){
    die("connection Faild :".mysqli_connect_error());
}
else{
    // echo "<script>alert('DB connected!')</script>";
}
?>