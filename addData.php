<?php
include('conn.php'); 

if(isset($_POST['submit'])){
    $taskid = $_POST['taskid'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];

    $date = "$year-$month-$day";
    $ordertype = $_POST['ordertype'];
    $orderdesc = $_POST['orderdesc'];
    $mplan = $_POST['mplan'];
    $pdesc = $_POST['pdesc'];
    $mwctr = $_POST['mwctr'];
    $sysstat = $_POST['sysstat'];
    $sysdesc = $_POST['sysdesc'];
    $pgroup = $_POST['pgroup'];
    $cstcen = $_POST['cstcen'];
    $eqid = $_POST['eqid'];
   
    $query = "INSERT INTO `tasks`(`taskID`, `startDate`, `orderType`, `orderDescription`, `maintenance_plan`, `mpDescription`, `mainWorkCtr`, `systemStatus`, `ssDescription`, `plannerGroup`, `costCenter`, `equipmentID`, `TaskStatus`) 
              VALUES ('$taskid', '$date', '$ordertype', '$orderdesc', '$mplan', '$pdesc', '$mwctr', '$sysstat', '$sysdesc', '$pgroup', '$cstcen', '$eqid', 'Pending')";
    
    if(mysqli_query($conn, $query)) {
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
