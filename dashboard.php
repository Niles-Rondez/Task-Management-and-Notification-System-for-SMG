<?php
include('conn.php');

// Initialize default values
$selectedSort = isset($_GET['sort']) ? $_GET['sort'] : 'all'; // Default to 'all' if not set
$selectedStatus = isset($_GET['status']) ? $_GET['status'] : 'all'; // Default to 'all' if not set

$currentDate = date('Y-m-d');
$tomorrowDate = date('Y-m-d', strtotime('+1 day'));
$weekEndDate = date('Y-m-d', strtotime('+1 week'));

// Build base query
$query = "SELECT * FROM tasks WHERE 1=1";

// Apply sorting based on selected filter
switch ($selectedSort) {
    case 'today':
        $query .= " AND startDate = '$currentDate'";
        break;
    case 'tomorrow':
        $query .= " AND startDate = '$tomorrowDate'";
        break;
    case 'week':
        $query .= " AND startDate BETWEEN '$currentDate' AND '$weekEndDate'";
        break;
    // 'all' case does not add any date filter
    default:
        break;
}

// Apply status filter based on selected status
switch ($selectedStatus) {
    case 'pending':
        $query .= " AND taskStatus = 'Pending'";
        break;
    case 'completed':
        $query .= " AND taskStatus = 'Completed'";
        break;
    // 'all' case does not add any status filter
    default:
        break;
}

$result = mysqli_query($conn, $query);

// Fetch counts for total, pending, upcoming, completed tasks
$sqlTotalTasks = "SELECT COUNT(*) AS totalTasks FROM tasks";
$resultTotalTasks = mysqli_query($conn, $sqlTotalTasks);
$rowTotalTasks = mysqli_fetch_assoc($resultTotalTasks);
$totalTasks = $rowTotalTasks['totalTasks'];

$sqlPendingTasks = "SELECT COUNT(*) AS pendingTasks FROM tasks WHERE startDate = '$currentDate'";
$resultPendingTasks = mysqli_query($conn, $sqlPendingTasks);
$rowPendingTasks = mysqli_fetch_assoc($resultPendingTasks);
$pendingTasks = $rowPendingTasks['pendingTasks'];

$sqlUpcomingTasks = "SELECT COUNT(*) AS upcomingTasks FROM tasks WHERE startDate = '$tomorrowDate'";
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
      <h4 class="fw-bold">Task List</h4>
      </div>
      <div class="col-auto pt-2">
        <p>SORT BY:</p>
      </div>
      <div class="col-auto">
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo strtoupper($selectedSort === 'all' ? 'ALL TASKS' : $selectedSort); ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="sortDropdown">
            <li><a class="dropdown-item" href="dashboard.php?sort=all&status=<?php echo $selectedStatus; ?>">ALL TASKS</a></li>
            <li><a class="dropdown-item" href="dashboard.php?sort=today&status=<?php echo $selectedStatus; ?>">TODAY</a></li>
            <li><a class="dropdown-item" href="dashboard.php?sort=tomorrow&status=<?php echo $selectedStatus; ?>">TOMORROW</a></li>
            <li><a class="dropdown-item" href="dashboard.php?sort=week&status=<?php echo $selectedStatus; ?>">WITHIN THIS WEEK</a></li>
        </ul>
    </div>
</div>

<div class="col-auto">
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo strtoupper($selectedStatus === 'all' ? 'ALL STATUS' : $selectedStatus); ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="statusDropdown">
            <li><a class="dropdown-item" href="dashboard.php?status=all&sort=<?php echo $selectedSort; ?>">ALL STATUS</a></li>
            <li><a class="dropdown-item" href="dashboard.php?status=pending&sort=<?php echo $selectedSort; ?>">PENDING</a></li>
            <li><a class="dropdown-item" href="dashboard.php?status=completed&sort=<?php echo $selectedSort; ?>">COMPLETED</a></li>
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
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Urgency</span>
                        <select class="form-select" name="urgency">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <!--Aask status
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Task Status</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tskstat">
                    </div>-->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="close">Close</button>
                      <input type="submit" class="btn btn-primary" name="submit" value="ADD"> 
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
              $urgencyClass = '';
              if ($row['urgency'] === 'Low') {
                  $urgencyClass = 'low-urgency';
              } elseif ($row['urgency'] === 'Medium') {
                  $urgencyClass = 'medium-urgency';
              } elseif ($row['urgency'] === 'High') {
                  $urgencyClass = 'high-urgency';
              } else {
                  $urgencyClass = 'default-urgency';
              }
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
              data-bs-toggle="modal" data-bs-target="#updateTaskModal" class="' . $urgencyClass . '">';
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
                <input class="form-check-input" type="radio" id="taskStatusPending" name="taskStatus" value="Pending" checked>
                <label class="form-check-label" for="taskStatusPending">Pending</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="taskStatusCompleted" name="taskStatus" value="Completed">
                <label class="form-check-label" for="taskStatusCompleted">Completed</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="urgency" class="form-label">Urgency</label>
            <select class="form-select" id="urgency" name="urgency">
                <option value="Low" selected>Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
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
    // Check if taskID is provided
    if (!taskID) {
        alert('No task selected. Please select a task to update.');
        return false; // Prevent further execution
    }

    // Store the initial values from the modal
    var initialOrderType = document.getElementById('orderType').value;
    var initialOrderDesc = document.getElementById('orderDesc').value;
    var initialMPlan = document.getElementById('mplan').value;
    var initialPDesc = document.getElementById('pdesc').value;
    var initialMainWorkCtr = document.getElementById('mainWorkCtr').value;
    var initialSysStat = document.getElementById('sysstat').value;
    var initialSysDesc = document.getElementById('sysdesc').value;
    var initialPGroup = document.getElementById('pgroup').value;
    var initialCstCen = document.getElementById('cstcen').value;
    var initialEqID = document.getElementById('eqid').value;
    var initialTaskStatus = document.querySelector('input[name="taskStatus"]:checked').value;
    var initialUrgency = document.getElementById('urgency').value;

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

    // Set the current task status
    if (taskStatus === 'Pending') {
        document.getElementById('taskStatusPending').checked = true;
    } else if (taskStatus === 'Completed') {
        document.getElementById('taskStatusCompleted').checked = true;
    }

    // Set the urgency dropdown value
    document.getElementById('urgency').value = urgency;

}
</script>
</body>
</html>
