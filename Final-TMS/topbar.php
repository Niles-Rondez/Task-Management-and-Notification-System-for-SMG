
 <nav class="navbar navbar-expand-lg bg-body-tertiary" id="width-container"> 
    <div class="container-fluid" id="side-menu">
      <!--Burger in dashboard-->
      <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger">
      
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header" id="dash">
          <!--Sidebar Burger-->
          <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1">
          NAVIGATION
        </div>
        <div class="offcanvas-body">
          <div >
            <h5><a href="index.php" id="hlink">DASHBOARD</a></h5>
            <h5><a href="schedule.php" id="hlink">SCHEDULE</a></h5>
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
            <a class="nav-link" href="login.php" id="logout">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>