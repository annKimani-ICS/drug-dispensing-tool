<?php
// index.php

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

if (count($rows) > 0) {
     foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["prescription_id"] . "</td>";
                    echo "<td>" . $row["patient_id"] . "</td>";
                    echo "<td>" . $row["drug_trade_name"] . "</td>";
                    echo "<td>" . $row["pres_form"] . "</td>";
                    echo "<td>" . $row["pres_amount"] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row["prescription_id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["prescription_id"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No prescriptions found.</td></tr>";
            }
 $conn->close();
        


?>




            