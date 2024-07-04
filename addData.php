<?php
session_start();
include('conn.php');


if(isset($_POST['save'])){
    $taskid = $_POST['taskid'];
    $date = date('Y-m-d',strtotime(($_POST['date'])));
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

    $query = "INSERT INTO `tasks`(`taskID`, `startDate`, `orderType`, `orderDescription`, `maintenance_plan`, `mpDescription`, `mainWorkCtr`, `systemStatus`, `ssDescription`, `plannerGroup`, `costCenter`, `equipmentID`, `TaskStatus`) VALUES 
    ('$taskid','$date','$ordertype',' $orderdesc','$mplan','$pdesc','$mwctr','$sysstat','$sysdesc','$pgroup','$cstcen','$eqid ','$tskstat')";
   // $query_run = mysqli_query($conn,$query);

    if(mysqli_query($conn, $query)){ //If the condition
        echo "Record inserted!";
    }else{
        echo "Failed to insert! ". mysqli_error($conn);
    }


    }




