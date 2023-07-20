<?php

require_once("connect.php");

if (isset($_POST["login"])) {



    $P_username = mysqli_real_escape_string($conn, $_POST["username"]);
    $P_user_type_select = mysqli_real_escape_string($conn, $_POST["user_type_select"]);
    $P_password = mysqli_real_escape_string($conn, $_POST["password"]);



    if ($P_user_type_select == "patient") {
        $sqlquery = "SELECT * FROM tblpatient WHERE patient_name = '$P_username' LIMIT 1";
        $query_result = $conn->query($sqlquery);
        if ($query_result->num_rows > 0) {
            $_SESSION["control"] = $query_result->fetch_assoc();
            $password_stored = $_SESSION["control"]["patient_password"];
            $stored_username = $_SESSION["control"]["patient_name"];

            if ($P_username === $stored_username && password_verify($P_password, $password_stored)) {
                header('Location: #');
                exit;
            } else {
                header('Location: index.html');
                exit;
            }

        }


    } else if ($P_user_type_select == "doctor") {
        $sqlquery = "SELECT * FROM tbldoctor WHERE doc_name = '$P_username' LIMIT 1";
        $query_result = $conn->query($sqlquery);
        if ($query_result->num_rows > 0) {
            $_SESSION["control"] = $query_result->fetch_assoc();
            $password_stored = $_SESSION["control"]["doc_password"];
            $stored_username = $_SESSION["control"]["doc_name"];

            if ($P_username === $stored_username && password_verify($P_password, $password_stored)) {
                header('Location: ../AddingDoctors/index.html');
                exit;
            } else {
                header('Location: index.html');
                exit;
            }

        }


    } else if ($P_user_type_select == "pharmacist") {
        $sqlquery = "SELECT * FROM tblpharmacy WHERE pharmacy_name = '$P_username' LIMIT 1";
        $query_result = $conn->query($sqlquery);
        if ($query_result->num_rows > 0) {
            $_SESSION["control"] = $query_result->fetch_assoc();
            $password_stored = $_SESSION["control"]["pharmacy_password"];
            $stored_username = $_SESSION["control"]["pharmacy_name"];

            if ($P_username === $stored_username && password_verify($P_password, $password_stored)) {
                header('Location: ../addPharmacy/index.html');
                exit;
            } else {
                header('Location: index.html');
                exit;
            }

        }
    } else if ($P_user_type_select == "admin") {

    }



}

?>