<?php

require_once("connect.php");

$entity= $_POST["entity"];

echo "<script>alert('Checkpoint 1');</script>";



    // $P_user_type_select = mysqli_real_escape_string($conn, $_POST["user_type_select"]);

    if ($entity == "patient") {
        header('Location: ../AddingPatients/addingPatient.html');
                // exit;
    }else if ($entity == "doctor") {
        header('Location: ../AddingDoctors/addingDoctor.html');
    //  exit;
    }  else if ($entity == "pharmacist") {
        header('Location: ../AddingPharmacy/addingpharmacy.html');
        // exit;
    } else if ($entity == "admin") {
        header('Location: ../admin/adminlogin.html');
        // exit;
    }else{
        // header('Location: signup.html');
        // exit;
        echo "<script>alert('End of if stat');</script>";
    }


?>