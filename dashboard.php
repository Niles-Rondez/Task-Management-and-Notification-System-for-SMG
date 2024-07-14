<?php
include('conn.php');

$query = "SELECT * FROM tasks";

$currentDate = date('Y-m-d');
$tomorrowDate = date('Y-m-d', strtotime('+1 day'));
$weekEndDate = date('Y-m-d', strtotime('+1 week'));

$query = "SELECT * FROM tasks";

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    if ($sort === 'asc') {
        $query .= " ORDER BY taskID ASC";
    } elseif ($sort === 'desc') {
        $query .= " ORDER BY taskID DESC";
    } elseif ($sort === 'today') {
        $query .= " WHERE startDate = '$currentDate'";
    } elseif ($sort === 'tomorrow') {
        $query .= " WHERE startDate = '$tomorrowDate'";
    } elseif ($sort === 'week') {
        $query .= " WHERE startDate <= '$weekEndDate' AND startDate >= '$currentDate'";
    }
}

$result = mysqli_query($conn, $query);

$sqlTotalTasks = "SELECT COUNT(*) AS totalTasks FROM tasks";
$resultTotalTasks = mysqli_query($conn, $sqlTotalTasks);
$rowTotalTasks = mysqli_fetch_assoc($resultTotalTasks);
$totalTasks = $rowTotalTasks['totalTasks'];

$sqlPendingTasks = "SELECT COUNT(*) AS pendingTasks FROM tasks WHERE  taskStatus = 'Pending'";
$resultPendingTasks = mysqli_query($conn, $sqlPendingTasks);
$rowPendingTasks = mysqli_fetch_assoc($resultPendingTasks);
$pendingTasks = $rowPendingTasks['pendingTasks'];

$sqlUpcomingTasks = "SELECT COUNT(*) AS upcomingTasks FROM tasks WHERE startDate > '$currentDate'";
$resultUpcomingTasks = mysqli_query($conn, $sqlUpcomingTasks);
$rowUpcomingTasks = mysqli_fetch_assoc($resultUpcomingTasks);
$upcomingTasks = $rowUpcomingTasks['upcomingTasks'];

$sqlCompletedTasks = "SELECT COUNT(*) AS completedTasks FROM tasks WHERE taskStatus = 'Completed'";
$resultCompletedTasks = mysqli_query($conn, $sqlCompletedTasks);
$rowCompletedTasks = mysqli_fetch_assoc($resultCompletedTasks);
$completedTasks = $rowCompletedTasks['completedTasks'];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Dashboard</title>
  <?php
    include('conn.php');
    include('addData.php');
    include('header.php');
  ?>
</head>
<body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid" id="side-menu">
      <!--Burger in dashboard-->
      <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger">
      
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header" id="dash">
          <!--Sidebar Burger-->
          <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1" class="ms-3 mt-0">
          <h1 id="navheader" class="ms-2">DASHBOARD</h1>
        </div>
        <div class="offcanvas-body">
          <div >
            <h5><a href="dashboard.php" id="selectedlink">DASHBOARD</a></h5>
            <h5><a href="schedule.php" id="hlink">SCHEDULE</a></h5>
            <h5><a href="notification.php" id="hlink">NOTIFICATIONS</a></h5>
            <h5><a href="reports.php" id="hlink">REPORTS</a></h5>
            <h5><a href="user.php" id="hlink">USERS</a></h5>
          </div>
        </div>
      </div>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <img src="images/San_Miguel_Corporation_logo.webp" id="navlogo"><br>
        <a class="navbar-brand" id="tms" href="dashboard.php">Task Management System</a>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php" id="logout">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--End of Navbar-->
  <div class="header-divider"></div><br>
  <!--tasks-->
  <div class="container text-center">
    <div class="row">
        <div class="col mx-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Total Tasks</h5>
                    <h3><?php echo $totalTasks; ?></h3>
                    <h7>All Task Due This Month</h7>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Pending Tasks</h5>
                    <h3 class="card-text"><?php echo $pendingTasks; ?></h3>
                    <h7>All Task Due Today</h7>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Upcoming Tasks</h5>
                    <h3 class="card-text"><?php echo $upcomingTasks; ?></h3>
                    <h7>All Task Due Tomorrow</h7>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Completed Tasks</h5>
                    <h3 class="card-text"><?php echo $completedTasks; ?></h3>
                    <h7>All Finished Task This Month</h7>
                </div>
            </div>
        </div>
    </div>
</div>
  <!--end of tasks-->

  <!--Notification and add task-->
  <div class="mx-4 mt-5">
    <div class="row">
      <div class="col">
      <h4 class="fw-bold">Notification List</h4>
      </div>
      <div class="col-auto ">
        <p>SORT BY:</p>
      </div>
      <div class="col-auto">
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                DEFAULT
            </button>
            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
              <li><a class="dropdown-item" href="dashboard.php?sort=asc">ASCENDING</a></li>
              <li><a class="dropdown-item" href="dashboard.php?sort=desc">DESCENDING</a></li>
              <li><a class="dropdown-item" href="dashboard.php?sort=today">TODAY</a></li>
              <li><a class="dropdown-item" href="dashboard.php?sort=tomorrow">TOMORROW</a></li>
              <li><a class="dropdown-item" href="dashboard.php?sort=week">WITHIN THIS WEEK</a></li>
            </ul>
        </div>
      </div>
      <div class="col-auto">
        <!-- Modal -->
          <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" id="addtask">ADD TASK</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form  method="POST" action="addData.php">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Task ID</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="taskid">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Start Date</span>
                      <input type="text" class="form-control" name="year" placeholder= "YYYY">
                      <input type="text" class="form-control" name="month" placeholder= "MM">
                      <input type="text" class="form-control" name="day" placeholder= "DD">

                      </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Order Type</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="ordertype">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Order Description</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="orderdesc">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Maintenance Plan</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="mplan">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Plan Description</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="pdesc">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Main Work CTR</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="mwctr">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">System Status</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="sysstat">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">System Status Description</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="sysdesc">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Planner Group</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="pgroup">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Cost Center</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="cstcen">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Equipment ID</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="eqid">
                    </div>
                    <!--Aask status
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Task Status</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tskstat">
                    </div>-->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="close">Close</button>
                      <input type="submit" class="btn btn-primary" name="submit" value="SAVE"> 
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <!-- Modal -->
      </div>
      
    </div>
  </div>
  <!--End of Notification and add task-->

  <div class="mt-3 mx-4" id="notiflist">
    <table class="table">
        <?php
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr onclick="fillModal(' . $row['taskID'] . ', \'' . 
                    (isset($row['orderType']) ? htmlspecialchars($row['orderType']) : '') . '\', \'' . 
                    (isset($row['mainWorkCtr']) ? htmlspecialchars($row['mainWorkCtr']) : '') . '\', \'' . 
                    (isset($row['orderDescription']) ? htmlspecialchars($row['orderDescription']) : '') . '\', \'' . 
                    (isset($row['maintenance_plan']) ? htmlspecialchars($row['maintenance_plan']) : '') . '\', \'' . 
                    (isset($row['mpDescription']) ? htmlspecialchars($row['mpDescription']) : '') . '\', \'' . 
                    (isset($row['systemStatus']) ? htmlspecialchars($row['systemStatus']) : '') . '\', \'' . 
                    (isset($row['ssDescription']) ? htmlspecialchars($row['ssDescription']) : '') . '\', \'' . 
                    (isset($row['plannerGroup']) ? htmlspecialchars($row['plannerGroup']) : '') . '\', \'' . 
                    (isset($row['costCenter']) ? htmlspecialchars($row['costCenter']) : '') . '\', \'' . 
                    (isset($row['equipmentID']) ? htmlspecialchars($row['equipmentID']) : '') . '\', \'' . 
                    (isset($row['taskStatus']) ? htmlspecialchars($row['taskStatus']) : '') . '\')" 
                    data-bs-toggle="modal" data-bs-target="#updateTaskModal">';
                echo '<td>';
                echo '<p class="taskid">' . htmlspecialchars($row['taskID']) . '</p>';
                echo '<p class="order-type">' . htmlspecialchars($row['orderType']) . ' <span class="main-work-ctr">' . htmlspecialchars($row['mainWorkCtr']) . '</span></p>';
                echo '</td>';
                echo '</tr>';
                echo '<tr style="height: 20px;"></tr>';
            }
        } else {
            echo '<tr><td colspan="2">Failed to fetch data from database.</td></tr>';
        }
        ?>
    </table>
</div>
<!-- Modal for updating task details -->
<div class="modal fade" id="updateTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="updateTaskModalLabel">Update Task Status <span id="currentTaskID"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="editData.php" id="updateTaskForm">
                    <!-- Hidden input field for taskID -->
                    <input type="hidden" name="taskID" id="taskID">

                    <!-- Display taskID (not editable) -->
                    <div class="mb-3">
                        <label for="taskIDDisplay" class="form-label">Task ID</label>
                        <input type="text" class="form-control" id="taskIDDisplay" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="orderType" class="form-label">Order Type</label>
                        <input type="text" class="form-control" id="orderType" name="orderType" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="orderDesc" class="form-label">Order Description</label>
                        <input type="text" class="form-control" id="orderDesc" name="orderDesc" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="mplan" class="form-label">Maintenance Plan</label>
                        <input type="text" class="form-control" id="mplan" name="mplan" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="pdesc" class="form-label">Plan Description</label>
                        <input type="text" class="form-control" id="pdesc" name="pdesc" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="mainWorkCtr" class="form-label">Main Work CTR</label>
                        <input type="text" class="form-control" id="mainWorkCtr" name="mainWorkCtr" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="sysstat" class="form-label">System Status</label>
                        <input type="text" class="form-control" id="sysstat" name="sysstat" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="sysdesc" class="form-label">System Status Description</label>
                        <input type="text" class="form-control" id="sysdesc" name="sysdesc" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="pgroup" class="form-label">Planner Group</label>
                        <input type="text" class="form-control" id="pgroup" name="pgroup" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="cstcen" class="form-label">Cost Center</label>
                        <input type="text" class="form-control" id="cstcen" name="cstcen" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="eqid" class="form-label">Equipment ID</label>
                        <input type="text" class="form-control" id="eqid" name="eqid" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Task Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="taskStatusPending" name="taskStatus" value="Pending">
                            <label class="form-check-label" for="taskStatusPending">Pending</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="taskStatusCompleted" name="taskStatus" value="Completed">
                            <label class="form-check-label" for="taskStatusCompleted">Completed</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    // JavaScript to update modal title with task ID
    $('#updateTaskModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var taskID = button.data('taskID'); // Extract task ID from data-* attributes
        var modal = $(this);
        
        // Update modal title with current task ID
        modal.find('.modal-title #currentTaskID').text(taskID);
        
        // Set the value of hidden input field
        modal.find('#taskID').val(taskID);
    });
    var offcanvasElement = document.getElementById('offcanvasExample');
    var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
</script>
<script>
    var offcanvasElement = document.getElementById('offcanvasExample');
    var offcanvas = new bootstrap.Offcanvas(offcanvasElement);

    function fillModal(taskID, orderType, mainWorkCtr, orderDesc, mplan, pdesc, sysstat, sysdesc, pgroup, cstcen, eqid, taskStatus) {
        // Fill Modal Inputs with Data
        document.getElementById('taskID').value = taskID;
        document.getElementById('taskIDDisplay').value = taskID;
        document.getElementById('orderType').value = orderType;
        document.getElementById('orderDesc').value = orderDesc;
        document.getElementById('mplan').value = mplan;
        document.getElementById('pdesc').value = pdesc;
        document.getElementById('mainWorkCtr').value = mainWorkCtr;
        document.getElementById('sysstat').value = sysstat;
        document.getElementById('sysdesc').value = sysdesc;
        document.getElementById('pgroup').value = pgroup;
        document.getElementById('cstcen').value = cstcen;
        document.getElementById('eqid').value = eqid;

        // Set Task Status Checkbox
        document.getElementById('taskStatusPending').checked = (taskStatus === 'Pending');
        document.getElementById('taskStatusCompleted').checked = (taskStatus === 'Completed');
    }
</script>
</body>
</html>
