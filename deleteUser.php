<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID'];

    $sql = "DELETE FROM users WHERE userID='$userID'";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: users.php");
}
?>
