<?php
require("connection.php");
if($_SERVER["REQUEST METHOD"]=="POST"){
    $patient_nat_ID=$_POST["credentials_id"];
    $patient_password=$_POST["credentials_password"];

    $stmt = $conn->prepare("SELECT patient_name FROM addPatients WHERE patient_nat_ID = ? AND patient password = ?");
    $stmt->bind_param("is", $patient_nat_id, $patient_password);

    $stmt->execute();

    // Bind the result
    $stmt->bind_result($name);

    // Check if a matching record is found
    if ($stmt->fetch()) {
        // Successful login, grant access
        echo "Welcome" . $name;
    } else {
        // Invalid credentials, deny access
        echo "Invalid credentials. Please try again.";
    }

    // Close the statement
    $stmt->close();
}

$conn->close();
?>