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
    <title>Event Calendar</title>
    <?php
    include('conn.php');
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
                    SCHEDULE
                </div>
                <div class="offcanvas-body">
                    <div>
                        <h5><a href="dashboard.php" id="hlink">DASHBOARD</a></h5>
                        <h5><a href="schedule.php" id="selectedlink">SCHEDULE</a></h5>
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
    
    <div class="header-divider"></div>

    <div class="container">
    <div class="row">
        <div class="col">
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

        <div class="col-10">
        <div id='calendar-container'>
            <div id='calendar'></div>
        </div>
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
                eventRender: function(event, element) {
                    // Display taskID as a tooltip on the event
                    element.attr('title', 'TaskID: ' + event.id);
                }
            });
        });
    </script>

</body>
</html>

