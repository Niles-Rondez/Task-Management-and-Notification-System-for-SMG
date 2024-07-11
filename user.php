<?php
    include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include('conn.php');
    include('addData.php');
    include('header.php');
  ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" id="side-menu">
            <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger">
          
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header" id="dash">
                    <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1">
                    DASHBOARD
                </div>
                <div class="offcanvas-body">
                    <div>
                        <h5><a href="dashboard.php" id="hlink">DASHBOARD</a></h5>
                        <h5><a href="schedule.php" id="hlink">SCHEDULE</a></h5>
                        <h5><a href="notifications.php" id="hlink">NOTIFICATIONS</a></h5>
                        <h5><a href="reports.php" id="hlink">REPORTS</a></h5>
                        <h5><a href="user.php" id="selectedlink">USERS</a></h5>
                    </div>
                </div>
            </div>
          
            <div class="collapse navbar-collapse" id="navbarNav">
                <img src="images/San_Miguel_Corporation_logo.webp" id="navlogo">
                <a class="navbar-brand" id="tms" href="dashboard.php">Task Management System</a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="header-divider"></div>
    
    <div class="header-reports">
        <h2 class="reports-header ps-3">User Management</h2>
        <div class="reports-options">
            <!-- Modal -->
            <button type="button" class="btn ms-3 mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addtask">ADD TASK</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form  method="POST" action="addUser.php">
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
            <input type="text" class="search-bar me-3" placeholder="Search...">
        </div>
    </div>
    
    <div class="reports-table-container">
        <table class="reports-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FIRSTNAME</th>
                    <th>MIDDLE NAME</th>
                    <th>LAST NAME</th>
                    <th>PHONE NO</th>
                    <th>EMAIL</th>
                    <th>ADDRESS</th>
                    <th>ROLE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <?php
                $sql_tasks = "SELECT * FROM users";
                $result_tasks = $conn->query($sql_tasks);

                if ($result_tasks->num_rows > 0) {
                    while ($row = $result_tasks->fetch_assoc()) {
                        echo '<tr>'; 
                        echo '<td>' . htmlspecialchars($row['userID']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['firstName']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['middleName']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['lastName']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['contact']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['address']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['role']) . '</td>';
                        echo '<td><button class="edit-button">EDIT</button> <button class="delete-button">DELETE</button></td>';
                        echo '</tr>'; 
                    }
                } else {
                    echo '<tr><td colspan="2">No tasks found.</td></tr>';
                }
            ?>
        
            </tbody>
        </table>
    </div>
</body>
</html>
