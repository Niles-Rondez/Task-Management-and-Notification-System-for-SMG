<?php
    include('conn.php');

    // Default sort column and order
    $sortColumn = 'completionDate'; // Default sort by completionDate
    $sortOrder = 'ASC'; // Default ascending order

    // Check if sorting parameters are provided via GET
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];

        // Determine the actual column name for sorting
        switch ($sort) {
            case 'date_ASC':
                $sortColumn = 'completionDate';
                $sortOrder = 'ASC';
                break;
            case 'date_DESC':
                $sortColumn = 'completionDate';
                $sortOrder = 'DESC';
                break;
            case 'task_id_ASC':
                $sortColumn = 'taskID';
                $sortOrder = 'ASC';
                break;
            case 'task_id_DESC':
                $sortColumn = 'taskID';
                $sortOrder = 'DESC';
                break;
            case 'assignment_ASC':
                $sortColumn = 'userID';
                $sortOrder = 'ASC';
                break;
            case 'assignment_DESC':
                $sortColumn = 'userID';
                $sortOrder = 'DESC';
                break;
            case 'report_ASC':
                $sortColumn = 'reportID';
                $sortOrder = 'ASC';
                break;
            case 'report_DESC':
                $sortColumn = 'reportID';
                $sortOrder = 'DESC';
                break;
            default:
                // Default to completionDate if invalid sort column
                $sortColumn = 'completionDate';
                $sortOrder = 'ASC';
                break;
        }
    }

    // SQL query with dynamic sorting
    $selquery = "SELECT * FROM reports ORDER BY $sortColumn $sortOrder";
    $selresult = mysqli_query($conn, $selquery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports and Compliance</title>
    <link href='https://fonts.googleapis.com/css?family=Exo 2' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        <h5><a href="schedule.php" id="hlink">SCHEDULE</a></h5>
                        <h5><a href="#" id="hlink">NOTIFICATIONS</a></h5>
                        <h5><a href="reports.php" id="selectedlink">REPORTS</a></h5>
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
            <!-- Dropdowns for sorting -->
            <select class="rounded" id="select-report" onchange="sortTable()">
                <option value="report_ASC" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'report_ASC') echo 'selected'; ?>>Report Type Ascending</option>
                <option value="report_DESC" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'report_DESC') echo 'selected'; ?>>Report Type Descending</option>
                <option value="date_ASC" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'date_ASC') echo 'selected'; ?>>Date Ascending</option>
                <option value="date_DESC" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'date_DESC') echo 'selected'; ?>>Date Descending</option>
                <option value="task_id_ASC" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'task_id_ASC') echo 'selected'; ?>>Task ID Ascending</option>
                <option value="task_id_DESC" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'task_id_DESC') echo 'selected'; ?>>Task ID Descending</option>
                <option value="assignment_ASC" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'assignment_ASC') echo 'selected'; ?>>Assignment Ascending</option>
                <option value="assignment_DESC" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'assignment_DESC') echo 'selected'; ?>>Assignment Descending</option>
            </select>
        </div>
    </div>
    
    <div class="reports-table-container" id="reports_table">
        <table class="reports-table">
            <thead>
                <tr>
                    <th><a href="reports.php?sort=report_ASC">Report Type</a></th>
                    <th><a href="reports.php?sort=task_id_ASC">Task ID</a></th>
                    <th><a href="reports.php?sort=assignment_ASC">Assignment</a></th>
                    <th><a href="reports.php?sort=date_ASC">Date</a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($selresult) {
                    // Fetching data row by row
                    while ($row = mysqli_fetch_assoc($selresult)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['reportID']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['taskID']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['userID']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['completionDate']) . '</td>';
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
        <a href="expexcel.php"><button class="export-pdf-button">Export PDF</button></a>
        <button class="export-excel-button">Export Excel</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        // Function to sort table based on user selection
        function sortTable() {
            var selectBox = document.getElementById("select-report");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;

            // Redirect to reports.php with sorting parameters
            window.location.href = `reports.php?sort=${selectedValue}`;
        }
    </script>
</body>
</html>
