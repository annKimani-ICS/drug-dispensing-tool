<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
<?php
// The PHP code in prescribe.php
require_once "connect2.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve prescription details from the form
    $patientID = $_POST['patient_nat_ID']; // Corrected field name here
    $drugName = $_POST['drug_trade_name'];
    $dosage = $_POST['pres_dosage'];
    $form = $_POST['pres_form'];
    $amount = $_POST['pres_amount'];

    $sql = "INSERT INTO tblprescription (patient_nat_ID, drug_trade_name, pres_dosage, pres_form, pres_amount) 
    VALUES ($patientID, '$drugName', '$dosage', '$form', $amount)";

    $worked=mysqli_query($conn,$sql);


    if (!$worked) {
        echo '
                           <script type="text/javascript">
                           
                           $(document).ready(function(){
                             swal({
                               title: "Error!",
                               text:Prescription could not be added, please try again",
                               type: "error".'.mysqli_errno($conn);'
                               
                           }).then(function() {
                            window.location = "index.html";
                           });
                           
                           
                           });
                           
                           </script>
                           ';
                        }
                           else{
                            echo '
                            <script type="text/javascript">
                            
                            $(document).ready(function(){
                              swal({
                                title: "Success!",
                                text: "Prescription Added Successfuly, Awaiting Approval",
                                type: "success"
                            }).then(function() {
                                window.location = "index.html";
                            });
                            
                            
                            });
                            
                            </script>
                            ';

}
    // Perform validation and data processing as needed

    // Check if the patient with the provided patient_nat_ID exists in the tblpatient table

    // Function to check if the patient exists in the database
    // Function to check if the patient exists in the database
    function checkPatientExists($patientID) {
    global $conn;

    // Check the database connection
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Execute the query
    $sql = "SELECT patient_nat_ID FROM tblpatient WHERE patient_nat_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $patientID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Debugging: Check if the query is executed correctly
    if (!$result) {
        die("Query execution failed: " . $conn->error);
    }

    // Debugging: Check the number of rows returned
    echo "Number of rows: " . $result->num_rows . "<br>";

    if ($result->num_rows > 0) {
        return true; // Patient exists
    } else {
        return false; // Patient not found
    }
}

}


    // Save the prescription details in the database and auto-generate the prescription ID
    // $prescriptionID = savePrescriptionToDatabase($patientID, $drugName, $dosage, $form, $amount);

    // // Send the prescription request to the pharmacist (you can use email, notification, or any other method)
    // sendPrescriptionToPharmacist($prescriptionID, $patientID, $drugName, $dosage, $form, $amount);

    // // Redirect the doctor to a success page or show a success message
    // echo "Prescription request sent successfully.";
    // exit();



// Function to save prescription details in the database and auto-generate the prescription ID
// Function to save prescription details in the database and auto-generate the prescription ID
// Function to save prescription details in the database and auto-generate the prescription ID
// Function to save prescription details in the database and auto-generate the prescription ID
// function savePrescriptionToDatabase($patientID, $drugName, $dosage, $form, $amount) {
//     // Replace this function with the code to save the prescription to the database
//     // Ensure that the "tblprescription" table has an auto-incrementing primary key column for the prescription ID

//     global $conn;

//     // Prepare and execute the SQL statement to insert the prescription details
//     $sql = "INSERT INTO tblprescription (patient_nat_ID, drug_trade_name, pres_dosage, pres_form, pres_amount) 
//             VALUES ($patientID, $drugName, $dosage, $form, $amount)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("sssss", $patientID, $drugName, $dosage, $form, $amount); // what is this for? That's what chat gpt gave me to 
//     //add so that I can update the table in the database but it didn't work 

//     if ($stmt->execute()) {
//         // Get the auto-generated prescription ID
//         $prescriptionID = $stmt->insert_id;
//         $stmt->close();
//         return $prescriptionID;
//     } else {
//         echo "Error: " . $stmt->error;
//         // Handle the error appropriately
//         return false;
//     }
// }

// Function to send prescription request to the pharmacist (you need to implement this part)
// function sendPrescriptionToPharmacist($prescriptionID, $patientID, $drugName, $dosage, $form, $amount) {
//     // Replace this function with the code or communication method you intend to use to send the prescription to the pharmacist

//     // You can use email, notification, or any other communication method
//     // For simplicity, we'll just print the prescription details here

//     echo "Prescription Request Sent to Pharmacist:<br>";
//     echo "Prescription ID: " . $prescriptionID . "<br>";
//     echo "Patient ID: " . $patientID . "<br>";
//     echo "Drug Name: " . $drugName . "<br>";
//     echo "Dosage: " . $dosage . "<br>";
//     echo "Form: " . $form . "<br>";
//     echo "Amount: " . $amount . "<br>";
// }
?>
