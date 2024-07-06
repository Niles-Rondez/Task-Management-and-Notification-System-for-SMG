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
    
    <div class="reports-table-container">
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
                <tr>
                    <td>Report1</td>
                    <td>TaskID</td>
                    <td>UserID</td>
                    <td>MM/DD/YYYY - MM/DD/YYYY</td>
                </tr>
                <tr>
                    <td>Report2</td>
                    <td>TaskID</td>
                    <td>UserID</td>
                    <td>MM/DD/YYYY - MM/DD/YYYY</td>
                </tr>
                <tr>
                    <td>Report3</td>
                    <td>TaskID</td>
                    <td>UserID</td>
                    <td>MM/DD/YYYY - MM/DD/YYYY</td>
                </tr>
                <tr>
                    <td>Report4</td>
                    <td>TaskID</td>
                    <td>UserID</td>
                    <td>MM/DD/YYYY - MM/DD/YYYY</td>
                </tr>
                <tr>
                    <td>Report5</td>
                    <td>TaskID</td>
                    <td>UserID</td>
                    <td>MM/DD/YYYY - MM/DD/YYYY</td>
                </tr>
                <tr>
                    <td>Report6</td>
                    <td>TaskID</td>
                    <td>UserID</td>
                    <td>MM/DD/YYYY - MM/DD/YYYY</td>
                </tr>
                <tr>
                    <td>Report7</td>
                    <td>TaskID</td>
                    <td>UserID</td>
                    <td>MM/DD/YYYY - MM/DD/YYYY</td>
                </tr>
                <tr>
                    <td>Report8</td>
                    <td>TaskID</td>
                    <td>UserID</td>
                    <td>MM/DD/YYYY - MM/DD/YYYY</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="export-buttons">
        <button class="export-pdf-button">Export PDF</button>
        <button class="export-excel-button">Export Excel</button>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var offcanvasElement = document.getElementById('offcanvasExample');
        var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
    </script>
</body>
</html>
