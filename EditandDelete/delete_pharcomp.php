<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve pharcomp's name from the submitted form
    $phar_comp_name = $_POST['phar_comp_name'];

    // Delete the user's information from the database
    $query = "DELETE FROM pharcomp WHERE phar_comp_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $phar_comp_name);
    $stmt->execute();

    // Redirect back to the main page
    header("Location: view_pharcomp.php");
    exit;
}
?>