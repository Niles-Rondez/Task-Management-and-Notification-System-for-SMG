<?php
    include('conn.php');
    $selquery = "SELECT * FROM reports";
    $selresult = mysqli_query($conn, $selquery);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reports and Compliance</title>
    <?php
    include('header.php');
  ?>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary"> 
        <div class="container-fluid" id="side-menu">
            <!-- Burger Icon -->
            <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger">
            
            <!-- Offcanvas Menu -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header" id="dash">
                    <!-- Sidebar Burger -->
                    <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1">
                    <h1 id="navheader">REPORTS</h1>
                </div>
                <div class="offcanvas-body">
                    <div>
                        <h5><a href="dashboard.php" id="hlink">DASHBOARD</a></h5>
                        <h5><a href="schedule.php" id="hlink">SCHEDULE</a></h5>
                        <h5><a href="notification.php" id="hlink">NOTIFICATIONS</a></h5>
                        <h5><a href="reports.php" id="selectedlink">REPORTS</a></h5>
                        <h5><a href="user.php" id="hlink">USERS</a></h5>
                    </div>
                </div>
            </div>
            
            <!-- Navbar Content -->
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
    
    <div class="header-divider"></div>
    
    <div class="header-reports">
        <h2 class="reports-header fw-bold ps-3">Report Types</h2>
        <div class="reports-options ps-3">
            <select class="rounded fw-bold" id="select-report-1">
                <option value="Report1">REPORT</option>
                <option value="Report2">REPORT ASC</option>
                <option value="Report3">REPORT DESC</option>
            </select>
            <select class="rounded fw-bold" id="select-report-2">
                <option value="Report1">TASK</option>
                <option value="Report2">TASK ASC</option>
                <option value="Report3">TASK DESC</option>
            </select>
            <select class="rounded fw-bold" id="select-report-3">
                <option value="Report1">ASSIGNMENT</option>
                <option value="Report2">ASSIGNMENT ASC</option>
                <option value="Report3">ASSIGNMENT DESC</option>
            </select>
            <select class="rounded fw-bold" id="select-report-4">
                <option value="Report1">START DATE</option>
                <option value="Report2">START DATE ASC</option>
                <option value="Report3">START DATE DESC</option>
            </select>
            <button class="search-button me-4">Search</button>
        </div>
    </div>
    
    <div class="reports-table-container mx-1" id="reports_table">
        <table class="reports-table">
            <thead>
                <tr>
                    <th>REPORT TYPE</th>
                    <th>TASK ID</th>
                    <th>ASSIGNMENT</th>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody>
            <?php
    if($selresult) {
        // Fetching data row by row
        while($row = mysqli_fetch_assoc($selresult)) {
            echo '<tr>';
            echo '<td>'.($row['reportID']). '</td>';
            echo '<td>'.($row['taskID']). '</td>';
            echo '<td>'.($row['userID']). '</td>';
            echo '<td>'.($row['completionDate']). '</td>';

            echo '</tr>';
        }
    } else {
        // Query failed
        echo '<tr><td colspan="2">Failed to fetch data from database.</td></tr>';
    }
          ?>  
            </tbody>
        </table>
    </div>
    
    <div class="export-buttons ms-3 me">
      <a href="expexcel.php"> <button class="export-pdf-button">EXPORT PDF</button></a> 
        <button class="export-excel-button">EXPORT EXCEL</button>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var offcanvasElement = document.getElementById('offcanvasExample');
        var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
    </script>
</body>
</html>
