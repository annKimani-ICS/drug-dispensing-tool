<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>

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
                header('Location: ../AddingDoctors/addingDoctor.html');
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
                header('Location: ../AddingPharmacy/index.html');
                exit;
            } else {
                header('Location: index.html');
                exit;
            }

        }
    } else if ($P_user_type_select == "admin") {
        $sqlquery = "SELECT * FROM tbladmin WHERE admin_name = '$P_username' LIMIT 1";
        $query_result = $conn->query($sqlquery);
        if ($query_result->num_rows > 0) {
            $_SESSION["control"] = $query_result->fetch_assoc();
            $password_stored = $_SESSION["control"]["admin_password"];
            $stored_username = $_SESSION["control"]["admin_name"];

            if ($P_username === $stored_username && password_verify($P_password, $password_stored)) {
                header('Location: ../admin/admin.html');
                exit;
            } else {
                header('Location: index.html');
                exit;
            }

        }
    } else {
        header('Location: index.html');
        exit;
    }



}

?>