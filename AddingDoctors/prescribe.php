<?php

//OOP METHOD
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdrugtool";

// Establish a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $drug_trade_name = $_POST["drug_trade_name"];
    $pres_amount = $_POST["pres_amount"];
    $pres_form = $_POST["pres_form"];
    $pres_dosage = $_POST["pres_dosage"];
    $patient_id = $_POST["patient_id"];

    // Check if the patient exists in the database using prepared statement
    $query = "SELECT * FROM tblpatient WHERE patient_nat_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // The patient is registered, proceed with the prescription insertion
        // Perform an SQL INSERT query to store the prescription in the database
        $sql = "INSERT INTO `tblprescription`(drug_trade_name, pres_amount, pres_form, pres_dosage, patient_id) 
        VALUES ('$drug_trade_name','$pres_amount','$pres_dosage','$patient_id')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $drug_trade_name, $pres_amount, $pres_form, $pres_dosage, $patient_id);

        if ($stmt->execute()) {
            echo "Prescription added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        // The patient is not registered, show an error message or redirect back to the form
        echo "Error: Patient is not registered.";
    }
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
?>
