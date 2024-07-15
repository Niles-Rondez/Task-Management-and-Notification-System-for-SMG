<?php
    include('conn.php');
// Default SQL query to fetch all reports
$query = "SELECT * FROM reports";

// Check if sorting option is selected via GET parameter
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    switch ($sort) {
        case 'asc_task':
            $query .= " ORDER BY taskID ASC";
            break;
        case 'desc_task':
            $query .= " ORDER BY taskID DESC";
            break;
        case 'asc_assignment':
            $query .= " ORDER BY userID ASC";
            break;
        case 'desc_assignment':
            $query .= " ORDER BY userID DESC";
            break;
        case 'asc_date':
            $query .= " ORDER BY completionDate ASC";
            break;
        case 'desc_date':
            $query .= " ORDER BY completionDate DESC";
            break;
        default:
            // Default sorting (if invalid sort option)
            $query .= " ORDER BY reportID ASC";
            break;
    }
}

$result = mysqli_query($conn, $query);
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
                    <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1" class="ms-3 mt-0">
                    <h1 id="navheader" class="ms-2">REPORTS</h1>
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
    <div class="header-reports pb-0">
        <h2 class="reports-header fw-bold ps-3 pb-3">Report Types</h2>
        <div class="reports-options ps-3">
            <!-- Dropdowns in the desired order: Report Type, Task ID, Assignment, Completion Date -->
            <div class="dropdown">
                <button class="btn dropdown-toggle rounded mb-0" type="button" id="reportSortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    REPORT TYPE
                </button>
                <ul class="dropdown-menu" aria-labelledby="reportSortDropdown">
                    <li><a class="dropdown-item" href="reports.php?sort=asc_report">ASCENDING</a></li>
                    <li><a class="dropdown-item" href="reports.php?sort=desc_report">DESCENDING</a></li>
                </ul>
            </div>
            
            <div class="dropdown">
                <button class="btn dropdown-toggle rounded mb-0" type="button" id="taskSortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    TASK ID
                </button>
                <ul class="dropdown-menu" aria-labelledby="taskSortDropdown">
                    <li><a class="dropdown-item" href="reports.php?sort=asc_task">ASCENDING</a></li>
                    <li><a class="dropdown-item" href="reports.php?sort=desc_task">DESCENDING</a></li>
                </ul>
            </div>
            
            <div class="dropdown">
                <button class="btn dropdown-toggle rounded mb-0" type="button" id="assignmentSortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    ASSIGNMENT
                </button>
                <ul class="dropdown-menu" aria-labelledby="assignmentSortDropdown">
                    <li><a class="dropdown-item" href="reports.php?sort=asc_assignment">ASCENDING</a></li>
                    <li><a class="dropdown-item" href="reports.php?sort=desc_assignment">DESCENDING</a></li>
                </ul>
            </div>
            
            <div class="dropdown">
                <button class="btn dropdown-toggle rounded me-5 mb-0" type="button" id="dateSortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    COMPLETION DATE
                </button>
                <ul class="dropdown-menu" aria-labelledby="dateSortDropdown">
                    <li><a class="dropdown-item" href="reports.php?sort=asc_date">ASCENDING</a></li>
                    <li><a class="dropdown-item" href="reports.php?sort=desc_date">DESCENDING</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="reports-table-container mx-1 p-0" id="reports_table">
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
    if($result) {
        // Fetching data row by row
        while($row = mysqli_fetch_assoc($result)) {
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
      <!-- <a href="expexcel.php"> <button class="export-pdf-button" id = 'exportBtn'>EXPORT PDF</button></a>  -->
      <a href="expexcel.php" target="_blank" class="export-excel-button">EXPORT EXCEL</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var offcanvasElement = document.getElementById('offcanvasExample');
        var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
    </script>
</body>
</html>
