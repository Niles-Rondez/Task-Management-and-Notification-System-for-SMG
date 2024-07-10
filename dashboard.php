<?php
include('conn.php');

$query = "SELECT * FROM tasks";

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    if ($sort === 'asc') {
        $query .= " ORDER BY taskID ASC";
    } elseif ($sort === 'desc') {
        $query .= " ORDER BY taskID DESC";
    }
}

$result = mysqli_query($conn, $query);

$currentDate = date('Y-m-d');

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
  <meta charset="UTF-8">
  <link href='https://fonts.googleapis.com/css?family=Exo 2' rel='stylesheet'>
  <link href='style.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <?php
    include('conn.php');
    include('addData.php');
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
          <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1">
          DASHBOARD
        </div>
        <div class="offcanvas-body">
          <div >
            <h5><a href="dashboard.php" id="selectedlink">DASHBOARD</a></h5>
            <h5><a href="schedule.php" id="hlink">SCHEDULE</a></h5>
            <h5><a href="#" id="hlink">NOTIFICATIONS</a></h5>
            <h5><a href="reports.php" id="hlink">REPORTS</a></h5>
            <h5><a href="#" id="hlink">USERS</a></h5>
          </div>
        </div>
      </div>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <img src="images/San_Miguel_Corporation_logo.webp" id="navlogo"><br>
        <a class="navbar-brand" id="tms">Task Management System</a>
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
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Tasks</h5>
                    <h3><?php echo $totalTasks; ?></h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Pending Tasks</h5>
                    <h3 class="card-text"><?php echo $pendingTasks; ?></h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Upcoming Tasks</h5>
                    <h3 class="card-text"><?php echo $upcomingTasks; ?></h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Completed Tasks</h5>
                    <h3 class="card-text"><?php echo $completedTasks; ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
  <!--end of tasks-->

  <!--Notification and add task-->
  <div class="container mt-5">
    <div class="row">
      <div class="col">
      <h4>Notification List</h4>
      </div>
      <div class="col-auto ">
        <p >Sort by:</p>
      </div>
      <div class="col-auto">
          <div class="dropdown">
           
            <button class="btn dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Default
            </button>
            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                <li><a class="dropdown-item" href="dashboard.php?sort=asc">Ascending</a></li>
                <li><a class="dropdown-item" href="dashboard.php?sort=desc">Descending</a></li>
            </ul>
        </div>
      </div>
      <div class="col-auto">
        <!-- Modal -->
          <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" id="addtask"> Add Task </button>
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

  <div class="container mt-3" id="notiflist">
    <table class="table">
        <?php
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>';
                echo '<a href="#" data-bs-toggle="modal" data-bs-target="#updateTaskModal" onclick="fillModal(' . $row['taskID'] . ', \'' . htmlspecialchars($row['orderType']) . '\', \'' . htmlspecialchars($row['mainWorkCtr']) . '\')">';
                echo '<p class="taskid">' . htmlspecialchars($row['taskID']) . '</p>';
                echo '<p class="order-type">' . htmlspecialchars($row['orderType']) . ' <span class="main-work-ctr">' . htmlspecialchars($row['mainWorkCtr']) . '</span></p>';
                echo '</a>';
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
                <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="editData.php" id="updateTaskForm">
                    <!-- Hidden input field for taskID -->
                    <input type="hidden" name="taskID" id="taskID">

                    <!-- Display taskID (not editable) -->
                    <div class="mb-3">
                        <label for="taskID" class="form-label">Task ID</label>
                        <input type="text" class="form-control" id="taskIDDisplay" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="orderType" class="form-label">Order Type</label>
                        <input type="text" class="form-control" id="orderType" name="orderType">
                    </div>
                    <div class="mb-3">
                        <label for="mainWorkCtr" class="form-label">Main Work CTR</label>
                        <input type="text" class="form-control" id="mainWorkCtr" name="mainWorkCtr">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Task Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="taskStatusPending" name="taskStatus" value="Pending" checked>
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
    var offcanvasElement = document.getElementById('offcanvasExample');
    var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
</script>
<script>
    function fillModal(taskID, orderType, mainWorkCtr) {
        document.getElementById('taskID').value = taskID;
        document.getElementById('taskIDDisplay').value = taskID;
        document.getElementById('orderType').value = orderType;
        document.getElementById('mainWorkCtr').value = mainWorkCtr;
    }
</script>
</script>
</body>
</html>
