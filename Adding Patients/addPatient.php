<?php
require_once("connect.php");

$P_nat_id = $_POST['patient_nat_ID'];
$P_name = $_POST['patient_name'];
$P_address = $_POST['patient_address'];
$P_age = $_POST['patient_age'];
$P_phone = $_POST['patient_phone'];
$P_email = $_POST['patient_email'];
$P_order = $_POST['order_no'];
$P_doc = $_POST['doc_hos_id'];

$insert_sql = "INSERT INTO `tblpatient`(`patient_nat_ID`, `patient_name`, `patient_address`, `patient_age`, `patient_phone`, `patient_email`, `order_id`, `doc_hos_id`) 
VALUES ('$P_nat_id','$P_name','$P_address','$P_age','$P_phone','$P_email','$P_order','$P_doc')";

if($conn->query($insert_sql) === TRUE)
{
    echo "Patient added successfully";
} else{
    echo "Error:Patient not added" . $conn->error;
}

?>