<?php
  include('conn.php'); // Include your database connection details

  if (isset($_GET['action']) && $_GET['action'] === 'fetch') {
      // Fetch events from database
      $sql = "SELECT taskID AS id, taskID AS title, startDate AS start FROM tasks";
      $result = $conn->query($sql);

      $events = [];
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              // Add event data to the array, ensuring 'start' is in YYYY-MM-DD format
              $events[] = [
                  'id' => $row['id'],
                  'title' => $row['title'],
                  'start' => date('Y-m-d', strtotime($row['start']))
              ];
          }
      }

      // Close the connection
      $conn->close();

      // Return events data as JSON
      header('Content-Type: application/json');
      echo json_encode($events);
      exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Schedule</title>
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
                    <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1">
                    <h1 id="navheader">SCHEDULE</h1>
                </div>
                <div class="offcanvas-body">
                    <div>
                        <h5><a href="dashboard.php" id="hlink">DASHBOARD</a></h5>
                        <h5><a href="schedule.php" id="selectedlink">SCHEDULE</a></h5>
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
    
    <div class="header-divider mb-5"></div>

    <div class="row" id="wrap">
       
        <div class="col-3 mt-5 ms-5 my-0" id = "leftCal">
          <div class="btn-group my-1">
                  <button type="button" class="btn px-4 border border-secondary-subtle" id="btnMonth" style="background-color: #a1a1a1; color: black">Month</button>
                  <button type="button" class="btn px-4 border border-secondary-subtle" id="btnWeek" style="background-color: #a1a1a1; color: black">Week</button>
                  <button type="button" class="btn px-4 border border-secondary-subtle" id="btnDay" style="background-color: #a1a1a1; color: black">Day</button>
          </div>
            <!-- Modal -->
          <button type="button" class="btn my-2 border border-secondary-subtle" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addtaskSched"> Add Task </button>
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
          <div id="notiflistCalc2">
          <table class="table">
                <?php
                $sql_tasks = "SELECT * FROM tasks";
                $result_tasks = $conn->query($sql_tasks);

                if ($result_tasks) {
                  while ($row = mysqli_fetch_assoc($result_tasks)) {
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
                    echo '<tr><td colspan="2">No tasks found.</td></tr>';
                }
                ?>
            </table>
          </div>

      </div>
<!-- Update Task Modal -->
<div class="modal fade" id="updateTaskModal" tabindex="-1" aria-labelledby="updateTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateTaskModalLabel">Update Task Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="editData.php" id="updateTaskForm">
                    <!-- Hidden input field for taskID -->
                    <input type="hidden" name="taskID" id="taskID">

                    <!-- Display taskID (not editable) -->
                    <div class="mb-3">
                        <label for="taskIDDisplay" class="form-label">Task ID</label>
                        <input type="text" class="form-control" id="taskIDDisplay" name="taskIDDisplay" >
                    </div>

                    <div class="mb-3">
                        <label for="orderType" class="form-label">Order Type</label>
                        <input type="text" class="form-control" id="orderType" name="orderType" >
                    </div>
                    <div class="mb-3">
                        <label for="orderDesc" class="form-label">Order Description</label>
                        <input type="text" class="form-control" id="orderDesc" name="orderDesc" >
                    </div>
                    <div class="mb-3">
                        <label for="mplan" class="form-label">Maintenance Plan</label>
                        <input type="text" class="form-control" id="mplan" name="mplan" >
                    </div>
                    <div class="mb-3">
                        <label for="pdesc" class="form-label">Plan Description</label>
                        <input type="text" class="form-control" id="pdesc" name="pdesc" >
                    </div>
                    <div class="mb-3">
                        <label for="mainWorkCtr" class="form-label">Main Work CTR</label>
                        <input type="text" class="form-control" id="mainWorkCtr" name="mainWorkCtr" >
                    </div>
                    <div class="mb-3">
                        <label for="sysstat" class="form-label">System Status</label>
                        <input type="text" class="form-control" id="sysstat" name="sysstat" >
                    </div>
                    <div class="mb-3">
                        <label for="sysdesc" class="form-label">System Status Description</label>
                        <input type="text" class="form-control" id="sysdesc" name="sysdesc" >
                    </div>
                    <div class="mb-3">
                        <label for="pgroup" class="form-label">Planner Group</label>
                        <input type="text" class="form-control" id="pgroup" name="pgroup" >
                    </div>
                    <div class="mb-3">
                        <label for="cstcen" class="form-label">Cost Center</label>
                        <input type="text" class="form-control" id="cstcen" name="cstcen" >
                    </div>
                    <div class="mb-3">
                        <label for="eqid" class="form-label">Equipment ID</label>
                        <input type="text" class="form-control" id="eqid" name="eqid" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Task Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="taskStatusPending" name="taskStatus" value="Pending">
                            <label class="form-check-label" for="taskStatusPending">Pending</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="taskStatusCompleted" name="taskStatus" value="Completed">
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
        <div class="col-9">
        <div id='calendar-container' class="ms-0">
            <div id='calendar' class=""></div>
        </div>
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize FullCalendar
            $('#calendar').fullCalendar({
                editable: false, // Disable event editing
                eventLimit: true, // Allow "more" link when too many events
                selectable: false, // Disable event selection
                selectHelper: false, // Disable selecting helper
                events: 'schedule.php?action=fetch', // Fetch events from schedule.php?action=fetch
                aspectRatio: 1.3,
                eventRender: function(event, element) {
                    // Display taskID as a tooltip on the event
                    element.attr('title', 'TaskID: ' + event.id);
                }
            });
                  $('#btnMonth').on('click', function() {
                  $('#calendar').fullCalendar('changeView', 'month');
              });

              $('#btnWeek').on('click', function() {
                  $('#calendar').fullCalendar('changeView', 'agendaWeek');
              });

              $('#btnDay').on('click', function() {
                  $('#calendar').fullCalendar('changeView', 'agendaDay');
              });
        });
        
    </script>
<script>
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

        // Clear previous selection of task status
        var radios = document.getElementsByName('taskStatus');
        for (var i = 0; i < radios.length; i++) {
            radios[i].checked = false;
        }
    }
</script>
</body>
</html>

