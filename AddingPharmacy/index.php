<?php
// The PHP code in pharmacist_dashboard.php
require_once "connect3.php";

// Query to retrieve data from the database
$sql = "SELECT * FROM tblprescription";
$result = $conn->query($sql);

$rows = [];
if ($result->num_rows > 0) {
    // Fetch all rows and store in $rows array
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}
?>
