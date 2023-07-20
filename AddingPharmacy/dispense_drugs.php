<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the prescription ID from the form
    $prescriptionID = $_POST["prescription_id"];

    // Perform validation if needed

    // Dispense drugs and update the database (you need to implement this part based on your requirements)

    // Display a success message (replace this with appropriate handling in a real application)
    echo "Drugs dispensed successfully for Prescription ID: " . $prescriptionID;
}
?>
