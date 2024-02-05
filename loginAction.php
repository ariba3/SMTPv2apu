<?php

include 'config.php';
session_start();

if (isset($_POST['l_username']) && isset($_POST['l_pass'])) {
    $l_username = $_POST['l_username'];
    $l_pass = $_POST['l_pass'];

    $stmt = $connection->prepare("SELECT * FROM idproduct WHERE user_name = ? AND pass = ?");
    $stmt->bind_param("ss", $l_username, $l_pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['r_username'] = $l_username; //session create
        $_SESSION['id'] = $row["id"]; //session create
        echo "<script>location.href='homepage.php'</script>";
    } else {
        echo "<script>alert('Invalid username and Password!!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
}
//$l_username = $_POST['l_username'];
//$l_pass = $_POST['l_pass'];
//
//$result = mysqli_query($connection, "SELECT * FROM `crud`WHERE user_name='$l_username' And pass='$l_pass'");
//
//
//if (mysqli_num_rows($result)) {
//
//    $_SESSION['r_username'] = $l_username; //session create
//    $_SESSION['id'] = $result["id"]; //session create
//    echo "<script>location.href='homepage.php'</script>";
//
//} else {
//    echo "<script>alert('Invalid username and Password!!')</script>";
//    echo "<script>location.href='login.php'</script>";
//}
?>
