<?php
require_once("connect5.php");

$S_supervisor_id = $_POST['supervisor_id'];
$S_supervisor_name = $_POST['supervisor_name'];
$S_contract_id = $_POST['contract_id'];
$S_superv_pass = $_POST['superv_pass'];

$insert_sql = "INSERT INTO `tblsuperv`(`supervisor_id`, `supervisor_name`, `contract_id`, `superv_pass`) 
VALUES ('$S_supervisor_id','$S_supervisor_name','$S_contract_id','$S_superv_pass')";

if($conn->query($insert_sql) === TRUE)
{
    echo "Supervisor added successfully!";
}else{
    echo "Error:Supervisor not added" . $conn->error;
}


?>