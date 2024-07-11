<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Management</title>
    <?php
    include('conn.php');
    include('header.php');
  ?>
  <link href='./styles/user.css' rel='stylesheet'>
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
          <h1 id="navheader">USERS</h1>
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
        <h2 class="reports-header">User Management</h2>
        <div class="reports-options">
            <button class="add-button">Add</button>
            <input type="text" class="search-bar" placeholder="Search...">
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
            <tbody>
                <tr>
                    <td>01</td>
                    <td>John</td>
                    <td>Michael</td>
                    <td>Doe</td>
                    <td>0912345678</td>
                    <td>john.doe@example.com</td>
                    <td>Cebu City, PH</td>
                    <td>ED Manager</td>
                    <td><button class="edit-button">EDIT</button> <button class="delete-button">DELETE</button></td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Jane</td>
                    <td>Anne</td>
                    <td>Smith</td>
                    <td>0912345679</td>
                    <td>jane.smith@example.com</td>
                    <td>Cebu City, PH</td>
                    <td>ED Manager</td>
                    <td><button class="edit-button">EDIT</button> <button class="delete-button">DELETE</button></td>
                </tr>
                <tr>
                    <td>03</td>
                    <td>Bob</td>
                    <td>James</td>
                    <td>Johnson</td>
                    <td>0912345680</td>
                    <td>bob.johnson@example.com</td>
                    <td>Cebu City, PH</td>
                    <td>ED Manager</td>
                    <td><button class="edit-button">EDIT</button> <button class="delete-button">DELETE</button></td>
                </tr>
                <tr>
                    <td>04</td>
                    <td>Alice</td>
                    <td>Marie</td>
                    <td>Brown</td>
                    <td>0912345681</td>
                    <td>alice.brown@example.com</td>
                    <td>Cebu City, PH</td>
                    <td>ED Manager</td>
                    <td><button class="edit-button">EDIT</button> <button class="delete-button">DELETE</button></td>
                </tr>
                <tr>
                    <td>05</td>
                    <td>Charlie</td>
                    <td>George</td>
                    <td>Williams</td>
                    <td>0912345682</td>
                    <td>charlie.williams@example.com</td>
                    <td>Cebu City, PH</td>
                    <td>ED Manager</td>
                    <td><button class="edit-button">EDIT</button> <button class="delete-button">DELETE</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
