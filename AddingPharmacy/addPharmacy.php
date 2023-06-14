<?php

require_once("connect3.php");

$P_pharmacy_name = $_POST['pharmacy_name'];
$P_pharmacy_phone_no = $_POST['pharmacy_phone_no'];
$P_pharma_drug_price = $_POST['pharma_drug_price'];
$P_pharmacy_stock = $_POST['pharmacy_stock'];
$P_contract_id = $_POST['contract_id'];
$P_drug_trade_name = $_POST['drug_trade_name'];
$P_pharmacy_password = $_POST['pharmacy_password'];

$insert_sql = "INSERT INTO `tblpharmacy`(`pharmacy_name`, `pharmacy_phone_no`, `pharma_drug_price`, `pharmacy_stock`, `contract_id`, `drug_trade_name`,`pharmacy_password`) 
VALUES ('$P_pharmacy_name','$P_pharmacy_phone_no','$P_pharma_drug_price','$P_pharmacy_stock','$P_contract_id','$P_drug_trade_name','$P_pharmacy_password')";

if($conn->query($insert_sql) === TRUE)
{
    echo "Pharmacy added successfully!";
}else{
    echo "Error:Pharmacy not added" . $conn->error;
}

?>