<?php
include './config.php';
session_start();
$id = $_SESSION['id'];
if(isset($_POST['id']) && isset($_POST['status'])){
    $status= $_POST['status'];
    $id= $_POST['id'];
    $updateQuery = "UPDATE friend_request SET request_status = ? WHERE id = ?";
    $stmt = $connection->prepare($updateQuery);
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $response = array('success' => true);
    } else {
        $response = array('error' => 'Failed to update record.');
    }

    $stmt->close();
}








?>