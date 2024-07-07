<?php
// Include database connection and any required files
require('conn.php');

// Fetch data from your database based on filter criteria
$query = "SELECT reportID, taskID, userID, completionDate FROM reports";
// You can add WHERE clauses to $query based on filter criteria

$result = mysqli_query($conn, $query);

if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}
?>

<form id="export-form" action="expexcel.php" method="post">
    <input type="hidden" name="query" value="<?php echo htmlspecialchars($query); ?>">
    <input type="hidden" name="filtered" value="true">
    <button type="submit" name="export_excel">Export Excel</button>
</form>

<div class="reports-table-container" id="reports_table">
    <table class="reports-table">
        <thead>
            <tr>
                <th>Report Type</th>
                <th>Task ID</th>
                <th>Assignment</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Start generating table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['reportID'] . '</td>';
            echo '<td>' . $row['taskID'] . '</td>';
            echo '<td>' . $row['userID'] . '</td>';
            echo '<td>' . $row['completionDate'] . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<?php
// Close the MySQL connection
mysqli_close($conn);
?>
