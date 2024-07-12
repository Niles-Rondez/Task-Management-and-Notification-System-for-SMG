<?php
include_once 'conn.php'; 

if (isset($_POST['submit'])) {
    $taskID = $_POST['taskID']; 
    $orderType = mysqli_real_escape_string($conn, $_POST['orderType']);
    $mainWorkCtr = mysqli_real_escape_string($conn, $_POST['mainWorkCtr']);
    $taskStatus = isset($_POST['taskStatus']) ? mysqli_real_escape_string($conn, $_POST['taskStatus']) : 'Pending'; // Default to Pending if not set

    $sql = "UPDATE tasks SET orderType='$orderType', mainWorkCtr='$mainWorkCtr', taskStatus='$taskStatus' WHERE taskID='$taskID'";
    $update = mysqli_query($conn, $sql);

    if ($update) {
        // Determine where to redirect based on referer
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        if (strpos($referer, 'dashboard.php') !== false) {
            echo "<script>alert('Update Successful!');</script>";
            echo "<script>window.location='dashboard.php';</script>";
        } elseif (strpos($referer, 'schedule.php') !== false) {
            echo "<script>alert('Update Successful!');</script>";
            echo "<script>window.location='schedule.php';</script>";
        } else {
            echo "<script>alert('Update Successful!');</script>";
            echo "<script>window.location='schedule.php';</script>";
        }
    } else {
        echo "Error updating task: " . mysqli_error($conn);
    }

    mysqli_close($conn);

} else {
    header("Location: schedule.php"); // Redirect if accessed directly without form submission
    exit();
}
?>