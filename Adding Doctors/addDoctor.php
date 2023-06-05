<?php
require_once("connect2.php");

$P_doc_hos_id = $_POST["doc_hos_id"];
$P_doc_name = $_POST["doc_name"];
$P_doc_spec = $_POST["doc_spec"];
$P_doc_years = $_POST["doc_years"];
$P_doc_phone = $_POST["doc_phone"];


$insert_sql = "INSERT INTO `tbldoctor`(`doc_hos_id`, `doc_name`, `doc_spec`, `doc_years`, `doc_phone`) 
VALUES ('$P_doc_hos_id','$P_doc_name','$P_doc_spec','$P_doc_years','$P_doc_phone')";

if($conn->query($insert_sql) === TRUE)
{
    echo "Doctor added successfully!";
}else{
    echo "Error:Doctor not added" . $conn->error;
}

?> 