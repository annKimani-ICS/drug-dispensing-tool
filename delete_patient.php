<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user's SSN from the submitted form
    $patient_nat_ID = $_POST['patient_nat_ID'];

    // Delete the user's information from the database
    $query = "DELETE FROM tblpatient WHERE patient_nat_ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $patient_nat_ID);
    $stmt->execute();

    // Redirect back to the main page
    header("Location: viewpatients.php");
    exit;
}
?>