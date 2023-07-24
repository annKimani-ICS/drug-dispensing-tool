<?php
require("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pharmacy_name = $_POST["pharmacy_name"];
    $pharmacy_password = $_POST["pharmacy_password"];

    $stmt = $conn->prepare("SELECT pharmacy_name FROM tblpharmacy WHERE pharmacy_name = ? AND pharmacy_password = ?");
    $stmt->bind_param("is", $pharmacy_name, $pharmacy_password);    

    if($stmt->execute()){
        //Bind the result
        $stmt->bind_result($name);

        //Check if a matching record is found
        if($stmt->fetch()){
            //Successful login, grant access
            echo "Welcome Pharmacy " . $name;
        }else{
            //Invalid credentials, deny access
            echo "Invalid credentials. Please try again.";
        }
    }else{
            //Error occurred during query execution
            echo "An error occurred. Please try again later.";
        }

        //Close the statement
        $stmt->close();

}

//Close the connection  
$conn->close();
?>