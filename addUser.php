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

    $sql = "INSERT INTO users (userID, firstName, middleName, lastName, contact, email, address, role) 
            VALUES ('$userID', '$firstName', '$middleName', '$lastName', '$contact', '$email', '$address', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "New user added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: users.php");
}
?>
