<?php
require_once("connect4.php");

$P_phar_comp_name = $_POST['phar_comp_name'];
$P_phar_comp_phone = $_POST['phar_comp_phone'];
$P_phar_comp_add = $_POST['phar_comp_add'];
$P_drug_trade_name = $_POST['drug_trade_name'];

$insert_sql = "INSERT INTO `pharcomp`(`phar_comp_name`, `phar_comp_phone`, `phar_comp_add`, `drug_trade_name`) 
VALUES ('$P_phar_comp_name','$P_phar_comp_phone','$P_phar_comp_add','$P_drug_trade_name')";

if($conn->query($insert_sql) === TRUE)
{
    echo "Pharmaceutical company added successfully!";
}else{
    echo "Error:Pharmaceutical Company not added" . $conn->error;
}


?>