<?php
include('conn.php');
$query = "SELECT r.reportID, r.taskID, r.userID, r.completionDate, u.firstName, u.lastName
          FROM reports r
          INNER JOIN users u ON r.userID = u.userID";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Reports and Compliance</title>

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
                    REPORTS
                </div>
                <div class="offcanvas-body">
                    <div>
                        <h5><a href="dashboard.php" id="hlink">DASHBOARD</a></h5>
                        <h5><a href="#" id="hlink">SCHEDULE</a></h5>
                        <h5><a href="#" id="hlink">NOTIFICATIONS</a></h5>
                        <h5><a href="#" id="selectedlink">REPORTS</a></h5>
                        <h5><a href="#" id="hlink">USERS</a></h5>
                    </div>
                </div>
            </div>
            
            <!-- Navbar Content -->
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
    
    <div class="header-reports">
        <h2 class="reports-header">Report Types</h2>
        <div class="reports-options">
            <select class="rounded" id="select-report-1">
                <option value="Report1">Report1</option>
                <option value="Report2">Report2</option>
                <option value="Report3">Report3</option>
            </select>
            <select class="rounded" id="select-report-2">
                <option value="Report1">Report1</option>
                <option value="Report2">Report2</option>
                <option value="Report3">Report3</option>
            </select>
            <select class="rounded" id="select-report-3">
                <option value="Report1">Report1</option>
                <option value="Report2">Report2</option>
                <option value="Report3">Report3</option>
            </select>
            <select class="rounded" id="select-report-4">
                <option value="Report1">Report1</option>
                <option value="Report2">Report2</option>
                <option value="Report3">Report3</option>
            </select>
            <select class="rounded" id="select-report-5">
                <option value="Report1">Report1</option>
                <option value="Report2">Report2</option>
                <option value="Report3">Report3</option>
            </select>
            <button class="search-button">Search</button>
        </div>
    </div>
    
    <div class="reports-table-container" id="reports_table">
        <table class="reports-table">
            <thead>
                <tr>
                    <th>Report Type</th>
                    <th>Task ID</th>
                    <th>Assignment</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
            if($result) {
    // Fetching data row by row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $row['reportID'] .'</td>';
        echo '<td>'. $row['taskID'] .'</td>';
        echo '<td>'. $row['firstName'] .' '. $row['lastName'] .'</td>';
        echo '<td>'. $row['completionDate'] .'</td>';
        echo '</tr>';
    }
} else {
    // Query failed
    echo '<tr><td colspan="4">Failed to fetch data from database.</td></tr>';
}
?>
            </tbody>
        </table>
    </div>
    
    <div class="export-buttons">
      <a href="expexcel.php"> <button class="export-pdf-button">Export PDF</button></a> 
        <button class="export-excel-button">Export Excel</button>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var offcanvasElement = document.getElementById('offcanvasExample');
        var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
    </script>
</body>
</html>
