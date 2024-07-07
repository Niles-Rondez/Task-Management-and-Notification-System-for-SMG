<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <link href='https://fonts.googleapis.com/css?family=Exo 2' rel='stylesheet'>
  <link href='style.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Log in</title>
</head>
<body>
    <div class="container" id="cont">
        <div align="center">
            <img src="images/San_Miguel_Corporation_logo.webp" id="logo-login"><br>
            <h1> SAN MIGUEL <span id="corp">CORPORATION</span></h1>
            <p>Task Management System</p>

            <form method = "POST">
                <div class="row">
                    <div class="col-4">
                        <label for="idInput">Employee ID</label>
                    </div>
                    <div class="col">
                        <input type="text" id="empID" name = "empID" class="form-control" placeholder=""><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label for="idInput">Password</label>
                    </div>
                    <div class="col">
                        <input type="password" id="password"  name ="password" class="form-control" placeholder="">
                    </div>
                    <a href="#" id="fget" align="right"> Forget Password?</a>
                </div>
                <input type="submit" value="Log In"  class="submit-button w-button" id = "login">

            </form>

        </div>
    </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
   session_start();
   
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'smb');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $empID = mysqli_real_escape_string($db,$_POST['empID']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT userID FROM users WHERE userID = '$empID' AND Password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         $_SESSION['empID'] = $empID;
         header("Location: dashboard.php");
         exit();
      } else {
         echo "<script>alert('Incorrect Username or Password. Please try again.');</script>";
      }
   }
?>
