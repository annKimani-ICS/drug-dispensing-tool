<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve pharcomp's name and updated information from the submitted form
    $phar_comp_name = $_POST['phar_comp_name'];
    $pharcomp_pass = $_POST['pharcomp_pass'];

    // Update the pharcomp's information in the database
    $query = "UPDATE pharcomp SET phar_comp_name = ?, pharcomp_pass = ? WHERE  =phar_comp_name ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $phar_comp_name, $pharcomp_pass, $phar_comp_name);
    $stmt->execute();

    // Redirect back to the main page
    header("Location: view_pharcomp.php");
    exit;
}
?>