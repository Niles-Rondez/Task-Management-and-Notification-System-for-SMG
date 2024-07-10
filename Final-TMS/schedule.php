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
  <div id="calendar"></div>

  <title>SCHEDULE</title>
  <?php
    include('conn.php');
    include('addData.php');
    include('header.php');
  ?>
</head>
<body>
  <?php include 'topbar.php' ?>

  <div id="calendar"></div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    var offcanvasElement = document.getElementById('offcanvasExample');
    var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
</script>

</body>
</html>
