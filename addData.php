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
    $tskstat = $_POST['tskstat'];

    $query = "INSERT INTO `tasks`(`taskID`, `startDate`, `orderType`, `orderDescription`, `maintenance_plan`, `mpDescription`, `mainWorkCtr`, `systemStatus`, `ssDescription`, `plannerGroup`, `costCenter`, `equipmentID`, `TaskStatus`) VALUES ('$taskid','$date','$ordertype',' $orderdesc','$mplan','$pdesc','$mwctr','$sysstat','$sysdesc','$pgroup','$cstcen','$eqid ','Pending')";
   // $query_run = mysqli_query($conn,$query);

   if(mysqli_query($conn, $query)) {
    echo "<script>alert('Record inserted!');</script>";
    echo "<script>window.location='dashboard.php';</script>"; // Redirect to success.php
} else {
    echo "<script>alert('Failed to insert record! " . mysqli_error($conn) . "');</script>";
    // You can optionally handle the error here
}
    }
?>



