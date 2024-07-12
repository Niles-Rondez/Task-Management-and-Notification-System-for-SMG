<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notification Settings</title>
    <?php
    include('conn.php');
    include('header.php');
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    </style>
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
          <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1" class="ms-3 mt-0">
          <h1 id="navheader" class="ms-2">NOTIFICATIONS</h1>
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
    <div class="header-divider"></div><br>

    <div class="header-notification mt-0">
        <h2 class="notification-header ms-3 fw-bolder">Notification Types</h2>
        <h3 class="text-end pe-5 me-5 my-0">Alert for scheduled maintenance activities</h3>

        <div class="notification-type pt-0 ps-5">
            <div class="options">
                <input class="form-check-input" type="checkbox" role="switch" id="maintenancealert" checked>
                <label class="form-check-label mx-1" for="maintenancealert"></label>
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

        <div class="notification-type ps-5">
            <div class="options">
                <input class="form-check-input" type="checkbox" role="switch" id="replacementalert" checked>
                <label class="form-check-label mx-1" for="replacementalert"></label>
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

        <div class="notification-type ps-5">
            <div class="options">
                <input class="form-check-input" type="checkbox" role="switch" id="cleaningalert" checked>
                <label class="form-check-label mx-1" for="cleaningalert"></label>
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

        <div class="notification-type ps-5">
            <div class="options">
                <input class="form-check-input" type="checkbox" role="switch" id="performancealert" checked>
                <label class="form-check-label mx-1" for="performancealert"></label>
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

        <div class="notification-type ps-5">
            <div class="options">
                <input class="form-check-input" type="checkbox" role="switch" id="emergencyalert" checked>
                <label class="form-check-label mx-1" for="emergencyalert"></label>
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

        <div class="notification-type ps-5">
            <div class="options">
                <input class="form-check-input" type="checkbox" role="switch" id="inspectionalert" checked>
                <label class="form-check-label mx-1" for="inspectionalert"></label>
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

        <div class="notification-type ps-5">
            <div class="options">
                <input class="form-check-input" type="checkbox" role="switch" id="customalert" checked>
                <label class="form-check-label mx-1" for="customalert"></label>
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

        <div class="notification-type ps-5 mb-0">
            <div class="options">
                <input class="form-check-input" type="checkbox" role="switch" id="downalert" checked>
                <label class="form-check-label mx-1" for="downalert"></label>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMN8AYYp4v2DnyDNRP+0V3RG6RTxcz9RUwE9K/sCb9qXqewXEZV9GnecfUygLhb4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-czNybBq7E3Bl8PM+PAJ5JcDs7Pe8oPo7uQToDRkm+CLRxOII9bhP0AWTx0fSkbtx" crossorigin="anonymous"></script>
</body>
</html>
