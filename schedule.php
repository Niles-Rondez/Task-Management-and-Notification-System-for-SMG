<?php

include('conn.php');

$query = "SELECT * FROM tasks";
$result = mysqli_query($conn, $query);


?>
<!-- Write your comments here -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href='https://fonts.googleapis.com/css?family=Exo 2' rel='stylesheet'>
  <link href='style.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <div id="calendar"></div>

  <title>SCHEDULE</title>
  <?php
    include('conn.php');
    include('addData.php');
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
          <div >
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

  <div id="calendar"></div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    var offcanvasElement = document.getElementById('offcanvasExample');
    var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
</script>

</body>
</html>
