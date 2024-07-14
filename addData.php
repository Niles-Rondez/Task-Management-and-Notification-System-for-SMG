<?php
include('conn.php');

if (isset($_POST['submit'])) {
    // Retrieve form data
    $taskID = $_POST['taskid'];
    $startDate = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
    $orderType = $_POST['ordertype'];
    $orderDesc = $_POST['orderdesc'];
    $mplan = $_POST['mplan'];
    $pdesc = $_POST['pdesc'];
    $mainWorkCtr = $_POST['mwctr'];
    $sysstat = $_POST['sysstat'];
    $sysdesc = $_POST['sysdesc'];
    $pgroup = $_POST['pgroup'];
    $cstcen = $_POST['cstcen'];
    $eqid = $_POST['eqid'];
    $urgency = $_POST['urgency']; // Add this line to capture urgency

    // Insert data into database
    $sql = "INSERT INTO tasks (taskID, startDate, orderType, orderDescription, maintenance_plan, mpDescription, mainWorkCtr, systemStatus, ssDescription, plannerGroup, costCenter, equipmentID,TaskStatus, urgency) 
            VALUES ('$taskID', '$startDate', '$orderType', '$orderDesc', '$mplan', '$pdesc', '$mainWorkCtr', '$sysstat', '$sysdesc', '$pgroup', '$cstcen', '$eqid','Pending', '$urgency')";
    if(mysqli_query($conn, $sql)) {
        // Determine the page to redirect based on HTTP_REFERER
        $referer = $_SERVER['HTTP_REFERER'];
        if(strpos($referer, 'dashboard.php') !== false) {
            echo "<script>alert('Record inserted!');</script>";
            echo "<script>window.location='dashboard.php';</script>";
        } elseif(strpos($referer, 'schedule.php') !== false) {
            echo "<script>alert('Record inserted!');</script>";
            echo "<script>window.location='schedule.php';</script>";
        } else {
            // Default redirect if HTTP_REFERER doesn't match expected pages
            echo "<script>alert('Record inserted!');</script>";
            echo "<script>window.location='dashboard.php';</script>";
        }
    } else {
        echo "<script>alert('Failed to insert record! " . mysqli_error($conn) . "');</script>";
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
