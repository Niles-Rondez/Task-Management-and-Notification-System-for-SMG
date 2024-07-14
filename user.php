<?php
    include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users</title>
<?php
    include('conn.php');
    include('header.php');
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
          <img src="images/menu-bar.png" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample" id="burger1" class="ms-3 mt-0">
          <h1 id="navheader" class="ms-2">USERS</h1>
        </div>
        <div class="offcanvas-body">
          <div >
            <h5><a href="dashboard.php" id="hlink">DASHBOARD</a></h5>
            <h5><a href="schedule.php" id="hlink">SCHEDULE</a></h5>
            <h5><a href="notification.php" id="hlink">NOTIFICATIONS</a></h5>
            <h5><a href="reports.php" id="hlink">REPORTS</a></h5>
            <h5><a href="user.php" id="selectedlink">USERS</a></h5>
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
    
    <div class="header-reports">
        <h2 class="reports-header ps-3 fw-bold">User Management</h2>
        <div class="reports-options my-0">
            <!-- Modal -->
            <button type="button" class="btn ms-3 mt-2 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addtask">ADD USER</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form  method="POST" action="addUser.php">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">User ID</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="userID">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
                      <input type="text" class="form-control" name="firstName">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Middle Name</span>
                      <input type="text" class="form-control" name="middleName">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
                      <input type="text" class="form-control" name="lastName">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Phone No</span>
                      <input type="text" class="form-control" name="contact">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                      <input type="email" class="form-control" name="email">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
                      <input type="text" class="form-control" name="address">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Role</span>
                      <input type="text" class="form-control" name="role">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                      <input type="text" class="form-control" name="password">
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
            <input type="text" class="search-bar me-4 my-0" style="width: 350px;" placeholder="Search" id="searchInput">
        </div>
    </div>
    
    <div class="reports-table-container mx-0 pt-0" id="user_table">
        <table class="reports-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>MIDDLE NAME</th>
                    <th>LAST NAME</th>
                    <th>PHONE NO</th>
                    <th>EMAIL</th>
                    <th>ADDRESS</th>
                    <th>ROLE</th>
                    <th style='min-width:165px;'>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql_tasks = "SELECT * FROM users";
                $result_tasks = $conn->query($sql_tasks);

                if ($result_tasks->num_rows > 0) {
                    while ($row = $result_tasks->fetch_assoc()) {
                        echo '<tr>'; 
                        echo '<td>' . htmlspecialchars($row['userID']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['firstName']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['middleName']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['lastName']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['contact']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['address']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['role']) . '</td>';
                        echo '<td><button class="edit-button">EDIT</button> <button class="delete-button">DELETE</button></td>';
                        echo '</tr>'; 
                    }
                } else {
                    echo '<tr><td colspan="9">No users found.</td></tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
    
    <!-- Add the JavaScript here -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                // Fetch the relevant row data
                const row = this.closest('tr');
                const userID = row.children[0].textContent;
                const firstName = row.children[1].textContent;
                const middleName = row.children[2].textContent;
                const lastName = row.children[3].textContent;
                const contact = row.children[4].textContent;
                const email = row.children[5].textContent;
                const address = row.children[6].textContent;
                const role = row.children[7].textContent;

                // Set the modal fields with the row data
                const modal = document.querySelector('#exampleModal');
                modal.querySelector('input[name="userID"]').value = userID;
                modal.querySelector('input[name="firstName"]').value = firstName;
                modal.querySelector('input[name="middleName"]').value = middleName;
                modal.querySelector('input[name="lastName"]').value = lastName;
                modal.querySelector('input[name="contact"]').value = contact;
                modal.querySelector('input[name="email"]').value = email;
                modal.querySelector('input[name="address"]').value = address;
                modal.querySelector('input[name="role"]').value = role;
                modal.querySelector('form').action = 'editUser.php';

                // Show the modal
                new bootstrap.Modal(modal).show();
            });
        });

        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                // Fetch the relevant row data
                const row = this.closest('tr');
                const userID = row.children[0].textContent;

                // Show the confirmation modal
                const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
                const confirmButton = document.getElementById('confirmDeleteButton');
                
                confirmButton.onclick = function() {
                    // Create a form to submit the delete request
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'deleteUser.php';
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'userID';
                    input.value = userID;
                    form.appendChild(input);

                    // Append the form to the body and submit it
                    document.body.appendChild(form);
                    form.submit();
                };
                
                modal.show();
            });
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('.reports-table tbody tr');
            rows.forEach(row => {
                const userID = row.children[0].textContent.toLowerCase();
                const firstName = row.children[1].textContent.toLowerCase();
                const middleName = row.children[2].textContent.toLowerCase();
                const lastName = row.children[3].textContent.toLowerCase();
                const role = row.children[7].textContent.toLowerCase();
                
                if (userID.includes(searchValue) || firstName.includes(searchValue) || middleName.includes(searchValue) || lastName.includes(searchValue) || role.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
    </script>
    
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this user?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
