<?php
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $phar_comp_name = $_POST["phar_comp_name"];
    $pharcomp_pass = $_POST["pharcomp_pass"];

    $stmt = $conn->prepare("SELECT phar_comp_name FROM pharcomp WHERE phar_comp_name = ? AND pharcomp_pass = ?");
    $stmt->bind_param("is", $phar_comp_name, $pharcomp_pass);

    if($stmt->execute()){
        // Bind the result
        $stmt->bind_result($name);

        // Check if a matching record is found
        if ($stmt->fetch()){
            // Successful login, grant access
            echo "Welcome " . $name;
        } else {
            // Invalid credentials, deny access
            echo "Invalid credentials. Please try again.";
        }
    } else {
        // Error occurred during query execution
        echo "An error occurred. Please try again later.";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection 
$conn->close();
?>