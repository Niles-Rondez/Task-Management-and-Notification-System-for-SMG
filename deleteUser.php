<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = $_POST['userID'];

    // Delete related reports first
    $deleteReportsQuery = "DELETE FROM reports WHERE userID = ?";
    $stmt = $conn->prepare($deleteReportsQuery);
    $stmt->bind_param("s", $userID);
    $stmt->execute();
    $stmt->close();

    // Now delete the user
    $deleteUserQuery = "DELETE FROM users WHERE userID = ?";
    $stmt = $conn->prepare($deleteUserQuery);
    $stmt->bind_param("s", $userID);
    $stmt->execute();
    $stmt->close();

    header("Location: user.php");
    exit();
}
?>
