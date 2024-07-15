<!doctype html>
<html>
<head>
    <title>Log in</title>
    <?php
    session_start();
    include('conn.php');
    include('header.php');
    ?>
</head>
<body>
    <div class="container user-select-none" id="cont">
        <div align="center">
            <img src="images/San_Miguel_Corporation_logo.webp" id="logo-login"><br>
            <h1> SAN MIGUEL <span id="corp">CORPORATION</span></h1>
            <p>Task Management System</p>

            <form method="POST">
                <div class="row">
                    <div class="col-4">
                        <label for="idInput">Employee ID</label>
                    </div>
                    <div class="col">
                        <input type="text" id="empID" name="empID" class="form-control" placeholder=""><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label for="idInput">Password</label>
                    </div>
                    <div class="col">
                        <input type="password" id="password" name="password" class="form-control" placeholder="">
                    </div>
                    <a href="#" id="fget" align="right"> Forget Password?</a>
                    <div class="modal fade" id="forgetPasswordModal" tabindex="-1" aria-labelledby="forgetPasswordModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="forgetPasswordModalLabel">Forget Password?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Contact a higher up or the IT department.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Log In" class="submit-button w-button border-0 mt-2 p-1" id="login">
            </form>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#fget').click(function() {
            $('#forgetPasswordModal').modal('show');
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $empID = mysqli_real_escape_string($conn, $_POST['empID']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // SQL query to fetch user details
    $sql = "SELECT userID, firstName, role FROM users WHERE userID = '$empID' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    // Check if user exists
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['userName'] = $row['firstName'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Incorrect Username or Password. Please try again.');</script>";
    }
}
?>

