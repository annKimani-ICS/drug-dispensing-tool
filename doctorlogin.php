<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doc_hos_id = $_POST["doc_hos_id"];
    $doctor_password = $_POST["doctor_password"];

    $stmt = $conn->prepare("SELECT doc_name FROM tbldoctor WHERE doc_hos_id = ? AND doctor_password = ?");
    $stmt->bind_param("is", $doc_hos_id, $doctor_password);

    $stmt->execute();

    // Bind the result
    $stmt->bind_result($name);

    // Check if a matching record is found
    if ($stmt->fetch()) {
        // Successful login, grant access
        echo "Welcome " . $name;
    } else {
        // Invalid credentials, deny access
        echo "Invalid credentials. Please try again.";
    }

    // Close the statement
    $stmt->close();
}

$conn->close()?>