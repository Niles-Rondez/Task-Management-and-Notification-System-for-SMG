<?php
// Include database connection
include('conn.php');

// Fetch data based on filter criteria (if any)
$query = "SELECT reportID, taskID, userID, completionDate FROM reports";
// You can add WHERE clauses to $query based on filter criteria

$result = mysqli_query($conn, $query);

if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}

// Set headers for CSV file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="reports.csv"');
header('Cache-Control: max-age=0');

// Create a file pointer connected to the output stream
$file = fopen('php://output', 'w');

// Output CSV column headers
fputcsv($file, array('Report ID', 'Task ID', 'User ID', 'Completion Date'));

// Fetching and outputting data row by row
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($file, $row);
}

// Close the file pointer
fclose($file);

exit;
?>
