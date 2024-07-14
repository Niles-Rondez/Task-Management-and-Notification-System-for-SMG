<?php
include_once 'conn.php'; 

if (isset($_POST['submit'])) {
    $taskID = $_POST['taskID']; 
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

    // Check if the update is from dashboard.php or schedule.php
    if (strpos($referer, 'dashboard.php') !== false) {
        // Update only taskStatus and urgency
        $taskStatus = isset($_POST['taskStatus']) ? mysqli_real_escape_string($conn, $_POST['taskStatus']) : 'Pending'; // Default to Pending if not set
        $urgency = mysqli_real_escape_string($conn, $_POST['urgency']); // Get the urgency level

        $sql = "UPDATE tasks SET taskStatus='$taskStatus', urgency='$urgency' WHERE taskID='$taskID'";
    } elseif (strpos($referer, 'schedule.php') !== false) {
        // Allow any changes
        $orderType = mysqli_real_escape_string($conn, $_POST['orderType']);
        $orderDesc = mysqli_real_escape_string($conn, $_POST['orderDesc']);
        $mplan = mysqli_real_escape_string($conn, $_POST['mplan']);
        $pdesc = mysqli_real_escape_string($conn, $_POST['pdesc']);
        $mainWorkCtr = mysqli_real_escape_string($conn, $_POST['mainWorkCtr']);
        $sysstat = mysqli_real_escape_string($conn, $_POST['sysstat']);
        $sysdesc = mysqli_real_escape_string($conn, $_POST['sysdesc']);
        $pgroup = mysqli_real_escape_string($conn, $_POST['pgroup']);
        $cstcen = mysqli_real_escape_string($conn, $_POST['cstcen']);
        $eqid = mysqli_real_escape_string($conn, $_POST['eqid']);
        $taskStatus = isset($_POST['taskStatus']) ? mysqli_real_escape_string($conn, $_POST['taskStatus']) : 'Pending'; // Default to Pending if not set
      /*  $urgency = mysqli_real_escape_string($conn, $_POST['urgency']); // Get the urgency level*/

      $sql = "UPDATE tasks SET orderType='$orderType', orderDescription='$orderDesc', maintenance_plan='$mplan', mpDescription='$pdesc', mainWorkCtr='$mainWorkCtr', systemStatus='$sysstat', ssDescription='$sysdesc', plannerGroup='$pgroup', costCenter='$cstcen', equipmentID='$eqid', TaskStatus='$taskStatus' WHERE taskID='$taskID'";
    } else {
        // Redirect if accessed directly without proper referer
        header("Location: schedule.php");
        exit();
    }

    $update = mysqli_query($conn, $sql);

    if ($update) {
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
