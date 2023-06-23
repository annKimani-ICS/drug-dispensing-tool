<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve doctor's id from the submitted form
    $doc_hos_id = $_POST['doc_hos_id'];

    // Delete the doctor's information from the database
    $query = "DELETE FROM tbldoctor WHERE doc_hos_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $doc_hos_id);
    $stmt->execute();

    // Redirect back to the main page
    header("Location: view_doctor.php");
    exit;
}
?>