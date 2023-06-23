<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve doctor's name and updated information from the submitted form
    $doc_hos_id = $_POST['doc_hos_id'];
    $doc_name = $_POST['doc_name'];
    $doc_password = $_POST['doc_password'];

    // Update the doctor's information in the database
    $query = "UPDATE tbldoctor SET doc_name = ?, doc_password = ? WHERE  =doc_hos_id ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $doc_name, $doc_password, $doc_hos_id);
    $stmt->execute();

    // Redirect back to the main page
    header("Location: view_doctor.php");
    exit;
}
?>