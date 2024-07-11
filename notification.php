<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notification Settings</title>
    <?php
    include('conn.php');
    include('header.php');
  ?>
  <link href='./styles/notification.css' rel='stylesheet'>
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
          <h1 id="navheader">NOTIFICATIONS</h1>
        </div>
        <div class="offcanvas-body">
          <div >
            <h5><a href="dashboard.php" id="hlink">DASHBOARD</a></h5>
            <h5><a href="schedule.php" id="hlink">SCHEDULE</a></h5>
            <h5><a href="notification.php" id="selectedlink">NOTIFICATIONS</a></h5>
            <h5><a href="reports.php" id="hlink">REPORTS</a></h5>
            <h5><a href="user.php" id="hlink">USERS</a></h5>
          </div>
        </div>
      </div>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <img src="./images/San_Miguel_Corporation_logo.webp" id="navlogo"><br>
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

    <div class="header-notification">
        <h2 class="notification-header ms-3">Notification Types</h2>
        <h3 class="text-end pe-5 me-5">Alert for scheduled maintenance activities</h3>
    

    <div class="notification-type pt-3">
        <div class="options">
            <input class="form-check-input" type="checkbox" role="switch" id="maintenancealert" checked>
            <label class="form-check-label m-1" for="maintenancealert"></label>
            <div class="notification-header">
                <h3 class="notification-title">Maintenance Due Alerts</h3>
                <p class="sub-header">Alerts for scheduled maintenance activities.</p>
            </div>
        </div>
        <div class="options-right">
            <select class="rounded" id="select-option-1">
                <option value="" disabled selected>Select Method</option>
                <option value="SMS">SMS</option>
                <option value="Text">Text</option>
                <option value="Email">Email</option>
            </select>
            <select class="rounded" id="select-option-2">
                <option value="" disabled selected>Select Frequency</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>
    </div>
    

    <div class="notification-type">
        <div class="options">
        <input class="form-check-input" type="checkbox" role="switch" id="replacementalert" checked>
        <label class="form-check-label m-1" for="replacementalert"></label>
            <div class="notification-header">
                <h3 class="notification-title">Part Replacement Alerts</h3>
                <p class="sub-header">Notifications for when specific parts need to be replaced.</p>
            </div>
        </div>
        <div class="options-right">
            <select class="rounded" id="select-option-3">
                <option value="" disabled selected>Select Method</option>
                <option value="SMS">SMS</option>
                <option value="Text">Text</option>
                <option value="Email">Email</option>
            </select>
            <select class="rounded" id="select-option-4">
                <option value="" disabled selected>Select Frequency</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>
    </div>
    
    <div class="notification-type">
        <div class="options">
        <input class="form-check-input" type="checkbox" role="switch" id="cleaningalert" checked>
        <label class="form-check-label m-1" for="cleaningalert"></label>
            <div class="notification-header">
                <h3 class="notification-title">Cleaning Alerts</h3>
                <p class="sub-header">Notifications for when specific parts need to be replaced.</p>
            </div>
        </div>
        <div class="options-right">
            <select class="rounded" id="select-option-5">
                <option value="" disabled selected>Select Method</option>
                <option value="SMS">SMS</option>
                <option value="Text">Text</option>
                <option value="Email">Email</option>
            </select>
            <select class="rounded" id="select-option-6">
                <option value="" disabled selected>Select Frequency</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>
    </div>
    

    <div class="notification-type">
        <div class="options">
        <input class="form-check-input" type="checkbox" role="switch" id="performancealert" checked>
        <label class="form-check-label m-1" for="performancealert"></label>
            <div class="notification-header">
                <h3 class="notification-title">Performance Degradation Alerts</h3>
                <p class="sub-header">Notifications for when specific parts need to be replaced.</p>
            </div>
        </div>
        <div class="options-right">
            <select class="rounded" id="select-option-7">
                <option value="" disabled selected>Select Method</option>
                <option value="SMS">SMS</option>
                <option value="Text">Text</option>
                <option value="Email">Email</option>
            </select>
            <select class="rounded" id="select-option-8">
                <option value="" disabled selected>Select Frequency</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>
    </div>
    
   
    <div class="notification-type">
        <div class="options">
        <input class="form-check-input" type="checkbox" role="switch" id="emergencyalert" checked>
        <label class="form-check-label m-1" for="emergencyalert"></label>
            <div class="notification-header">
                <h3 class="notification-title">Emergency Alerts</h3>
                <p class="sub-header">Notifications for when specific parts need to be replaced.</p>
            </div>
        </div>
        <div class="options-right">
            <select class="rounded" id="select-option-9">
                <option value="" disabled selected>Select Method</option>
                <option value="SMS">SMS</option>
                <option value="Text">Text</option>
                <option value="Email">Email</option>
            </select>
            <select class="rounded" id="select-option-10">
                <option value="" disabled selected>Select Frequency</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>
    </div>
    
    <div class="notification-type">
        <div class="options">
        <input class="form-check-input" type="checkbox" role="switch" id="inspectionalert" checked>
        <label class="form-check-label m-1" for="inspectionalert"></label>
            <div class="notification-header">
                <h3 class="notification-title">Inspection Alerts</h3>
                <p class="sub-header">Notifications for when specific parts need to be replaced.</p>
            </div>
        </div>
        <div class="options-right">
            <select class="rounded" id="select-option-11">
                <option value="" disabled selected>Select Method</option>
                <option value="SMS">SMS</option>
                <option value="Text">Text</option>
                <option value="Email">Email</option>
            </select>
            <select class="rounded" id="select-option-12">
                <option value="" disabled selected>Select Frequency</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>
    </div>
    
 
    <div class="notification-type">
        <div class="options">
        <input class="form-check-input" type="checkbox" role="switch" id="customalert" checked>
        <label class="form-check-label m-1" for="customalert"></label>
            <div class="notification-header">
                <h3 class="notification-title">Custom Alerts</h3>
                <p class="sub-header">Notifications for when specific parts need to be replaced.</p>
            </div>
        </div>
        <div class="options-right">
            <select class="rounded" id="select-option-13">
                <option value="" disabled selected>Select Method</option>
                <option value="SMS">SMS</option>
                <option value="Text">Text</option>
                <option value="Email">Email</option>
            </select>
            <select class="rounded" id="select-option-14">
                <option value="" disabled selected>Select Frequency</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>
    </div>

    <div class="notification-type">
        <div class="options">
        <input class="form-check-input" type="checkbox" role="switch" id="downalert" checked>
        <label class="form-check-label m-1" for="downalert"></label>
            <div class="notification-header">
                <h3 class="notification-title">Downtime Alerts</h3>
                <p class="sub-header">Notifications for when specific parts need to be replaced.</p>
            </div>
        </div>
        <div class="options-right">
            <select class="rounded" id="select-option-15">
                <option value="" disabled selected>Select Method</option>
                <option value="SMS">SMS</option>
                <option value="Text">Text</option>
                <option value="Email">Email</option>
            </select>
            <select class="rounded" id="select-option-16">
                <option value="" disabled selected>Select Frequency</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
            </select>
        </div>
    </div>
           




