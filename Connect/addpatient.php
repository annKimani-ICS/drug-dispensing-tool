<?php
require_once("connect.php");

$patient_id = "11473";
$patient_name = "Jane";
$patient_address= "Nairobi";

$sql = "INSERT INTO tblpatient (patient_id, patient_name, patient_address) 
VALUES('$patient_id', '$patient_name', '$patient_address')";

echo($sql);
if($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn-> close();

?>