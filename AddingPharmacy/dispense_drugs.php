<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>


<!-- The PHP code in dispense_drugs.php -->
<?php
// Place this code at the top of the file to handle form submission
if (isset($_POST['dispense_drugs']) && !empty($_POST['pres_id'])) {

    // Assuming you have a database connection here and you are using prepared statements
    require_once "connect3.php";
    // Get the prescription ID from the form
    $prescriptionID = $_POST['pres_id'];

    // Code to handle prescription dispensing (You can update the status of the prescription in the database)
    // For example:
     $stmt = $conn->prepare("UPDATE tblprescription SET dispensed = 1 WHERE pres_id = ?");
     $stmt->bind_param("i", $prescriptionID);
     $stmt->execute();
     $stmt->close();

    // Display a success message (replace this with appropriate handling in a real application)
    echo "Drugs dispensed successfully for Prescription ID: " . $prescriptionID;
    }


?>
