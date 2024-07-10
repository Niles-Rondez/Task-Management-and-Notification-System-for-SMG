<?php
    include('conn.php');
    $selquery = "SELECT * FROM reports WHERE completionDate > '2024-05-16'";
    $selresult = mysqli_query($conn, $selquery);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include('header.php'); ?>
</head>
<body>
    <?php include 'topbar.php' ?>
    <div class="header-divider"></div>
    <div class="header-reports">
        <h2 class="reports-header fw-bold">Report Types</h2>
        <div class="reports-options">
            <select class="rounded fw-bold" id="select-report-1">
                <option value="Report1">REPORT</option>
                <option value="Report2">Report2</option>
                <option value="Report3">Report3</option>
            </select>
            <select class="rounded fw-bold" id="select-report-2">
                <option value="Report1">TASK</option>
                <option value="Report2">Report2</option>
                <option value="Report3">Report3</option>
            </select>
            <select class="rounded fw-bold" id="select-report-3">
                <option value="Report1">ASSIGNMENT</option>
                <option value="Report2">Report2</option>
                <option value="Report3">Report3</option>
            </select>
            <select class="rounded fw-bold" id="select-report-4">
                <option value="Report1">START DATE</option>
                <option value="Report2">Report2</option>
                <option value="Report3">Report3</option>
            </select>
            <select class="rounded fw-bold" id="select-report-5">
                <option value="Report1">END DATE</option>
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
                    <th>REPORT TYPE</th>
                    <th>TASK ID</th>
                    <th>ASSIGNMENT</th>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody>
            <?php
    if($selresult) {
        // Fetching data row by row
        while($row = mysqli_fetch_assoc($selresult)) {
            echo '<tr>';
            echo '<td>'.($row['reportID']). '</td>';
            echo '<td>'.($row['taskID']). '</td>';
            echo '<td>'.($row['userID']). '</td>';
            echo '<td>'.($row['completionDate']). '</td>';

            echo '</tr>';
        }
    } else {
        // Query failed
        echo '<tr><td colspan="2">Failed to fetch data from database.</td></tr>';
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
