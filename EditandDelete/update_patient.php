<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve patient's national id no. and updated information from the submitted form
    $patient_nat_id = $_POST['patient_nat_ID'];
    $patient_name = $_POST['patient_name'];
    $patient_password = $_POST['patient_password'];

    // Update the patient's information in the database
    $query = "UPDATE tblpatient SET patient_name = ?, patient_password = ? WHERE  =patient_nat_ID ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $patient_name, $patient_password, $patient_nat_id);
    $stmt->execute();

    // Redirect back to the main page
    header("Location: viewpatients.php");
    exit;
}
?>