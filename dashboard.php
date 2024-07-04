
<!-- Write your comments here -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href='https://fonts.googleapis.com/css?family=Exo 2' rel='stylesheet'>
  <link href='style.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <?php
    include('conn.php');
    include('addData.php');
  ?>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary"> <!--Navbar-->
    <div class="container-fluid" id="side-menu">
      <!--Burger in dashboard-->
      <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger">
      
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"  >
        <div class="offcanvas-header" id="dash">
          <!--Sidebar Burger-->
          <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1">
          DASHBOARD
        </div>
        <div class="offcanvas-body">
          <div >
            <h5><a href="dash.html" id="selectedlink">DASHBOARD</a></h5>
            <h5><a href="#" id="hlink">SCHEDULE</a></h5>
            <h5><a href="#" id="hlink">NOTIFICATIONS</a></h5>
            <h5><a href="#" id="hlink">REPORTS</a></h5>
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
  </nav><!--End of Navbar-->
  <div class="container text-center">
    <div class="row">
      <div class="col">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Total Tasks</h5>
          <h3>
           
          </h3>
         
      </div>
    </div>
      </div>
      <div class="col">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Pending Tasks</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Upcoming Tasks</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Completed Tasks</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>
      </div>
    </div>
  </div>
  <div class="container">
    <h4>Notification List</h4>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->

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
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Task Status</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tskstat">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="close">Close</button>
            <input type="submit" class="btn btn-primary" name="submit" value="SAVE"> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
    
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
