<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    $sql = "UPDATE users 
            SET firstName='$firstName', middleName='$middleName', lastName='$lastName', contact='$contact', email='$email', address='$address', role='$role', password='$password'
            WHERE userID='$userID'";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: user.php");
}
?>
