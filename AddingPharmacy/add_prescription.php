<?php
// The PHP code in add_prescription.php
require_once "connect3.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you have a database connection here and you are using prepared statements
    

    // Get the prescription data from the form
    $P_patient_id = $_POST['patient_id'];
    $P_drug_trade_name = $_POST['drug_trade_name'];
    $P_pres_dosage = $_POST['pres_dosage'];
    $P_pres_form = $_POST['pres_form'];
    $P_pres_amount = $_POST['pres_amount'];

    // Code to add the prescription to the "tblprescription" table (You'll need to adjust this based on your database schema)
    $stmt = $conn->prepare("INSERT INTO tblprescription (patient_id, drug_trade_name, pres_dosage, pres_form, pres_amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $P_patient_id, $P_drug_trade_name, $P_pres_dosage, $P_pres_form, $P_pres_amount);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the pharmacist dashboard
    header("Location: pharmacist_dashboard.php");
    exit();
}

