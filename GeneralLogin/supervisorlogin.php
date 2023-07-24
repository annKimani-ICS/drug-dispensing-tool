<?php
require("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $supervisor_id = $_POST["supervisor_id"];
    $superv_pass = $_POST["superv_pass"];

    $stmt = $conn->prepare("SELECT supervisor_name FROM tblsuperv WHERE supervisor_id = ? AND superv_pass = ?");
    $stmt->bind_param("is", $supervisor_id, $superv_pass);

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