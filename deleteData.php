<?php
include('conn.php');

if (isset($_POST['deleteTask'])) {
    // Retrieve taskID from form submission
    $taskID = $_POST['taskID'];

    // SQL query to delete task based on taskID
    $sql = "DELETE FROM tasks WHERE taskID = '$taskID'";

    if (mysqli_query($conn, $sql)) {
        // Successful deletion
        echo "<script>alert('Task deleted successfully!');</script>";
        // Redirect to appropriate page after deletion
        $referer = $_SERVER['HTTP_REFERER'];
        if (strpos($referer, 'dashboard.php') !== false) {
            echo "<script>window.location='dashboard.php';</script>";
        } elseif (strpos($referer, 'schedule.php') !== false) {
            echo "<script>window.location='schedule.php';</script>";
        } else {
            echo "<script>window.location='dashboard.php';</script>";
        }
    } else {
        // Error in SQL execution
        echo "<script>alert('Failed to delete task! " . mysqli_error($conn) . "');</script>";
        // Redirect back to referring page
        echo "<script>window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
} else {
    // If deleteTask variable is not set, redirect back to referring page
    echo "<script>window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
}
?>
