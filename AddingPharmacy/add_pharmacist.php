<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the drug name and amount from the form
    $drugName = $_POST["drug_name"];
    $amount = $_POST["amount"];

    // Perform validation if needed

    // Save prescription to the database (You would need to set up a database and connection)
    // For simplicity, we'll just display the prescription in the table below

    // Add the prescription to the table (This is just a demonstration, not a real database)
    $prescriptionTable = '<tr><td>#123</td><td>' . $drugName . '</td><td>' . $amount . '</td><td></td></tr>';

    // Load the existing table content (You would store this in a database in a real application)
    $existingTableContent = '<tr><th>Prescription ID</th><th>Drug Name</th><th>Amount</th><th>Action</th></tr>';

    // Combine the existing and new prescription table rows
    $fullTableContent = $existingTableContent . $prescriptionTable;

    // Display the updated table
    echo $fullTableContent;
}
?>
