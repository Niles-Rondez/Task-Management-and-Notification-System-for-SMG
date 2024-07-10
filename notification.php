<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href='https://fonts.googleapis.com/css?family=Exo 2' rel='stylesheet'>
    <link rel="stylesheet" href="notification.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid" id="side-menu">
        <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger">
      
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header" id="dash">
                <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1">
                DASHBOARD
            </div>
            <div class="offcanvas-body">
                <div>
                    <h5><a href="dash.html" id="hlink">DASHBOARD</a></h5>
                    <h5><a href="schedule.php" id="hlink">SCHEDULE</a></h5>
                    <h5><a href="notification.php" id="selectedlink">NOTIFICATIONS</a></h5>
                    <h5><a href="reports.php" id="hlink">REPORTS</a></h5>
                    <h5><a href="user.php" id="hlink">USERS</a></h5>
                </div>
            </div>
        </div>
      
        <div class="collapse navbar-collapse" id="navbarNav">
            <img src="images/San_Miguel_Corporation_logo.webp" id="navlogo">
            <a class="navbar-brand" id="tms">Task Management System</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="logout">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="header-notification">
    <h2 class="notification-header">Notification Types</h2>
    <h3 class="text-end pe-5 me-5">Alert for scheduled maintenance activities</h3>
    

    <div class="notification-type pt-3">
        <div class="options">
            <input class="form-check-input" type="checkbox" role="switch" id="maintenancealert" checked>
            <label class="form-check-label" for="maintenancealert"></label>
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
        <label class="form-check-label" for="replacementalert"></label>
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
        <label class="form-check-label" for="cleaningalert"></label>
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
        <label class="form-check-label" for="performancealert"></label>
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
        <label class="form-check-label" for="emergencyalert"></label>
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
        <label class="form-check-label" for="inspectionalert"></label>
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
        <label class="form-check-label" for="customalert"></label>
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
        <label class="form-check-label" for="downalert"></label>
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
           




