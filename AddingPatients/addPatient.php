<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>

<?php

require_once("connect.php");

if (isset($_POST["addPatient"])){



    $P_patient_nat_ID =  $_POST["patient_nat_ID"];
    $P_patient_name = $_POST["patient_name"];
    $P_patient_address = $_POST["patient_address"];
    $P_patient_age =  $_POST["patient_age"];
    $P_patient_phone =  $_POST["patient_phone"];
    $P_patient_email =  $_POST["patient_email"];
    $P_doc_hos_id = $_POST["doc_hos_id"];
    $P_patient_password = $_POST["patient_password"];
    $password = $_POST["patient_password"];

    $insert_sql= "INSERT INTO `tblpatient`(`patient_nat_ID`, `patient_name`, `patient_address`, `patient_age`, `patient_phone`, `patient_email`, `doc_hos_id`, `patient_password`) 
    VALUES ($P_patient_nat_ID, '$P_patient_name', '$P_patient_address',$P_patient_age, $P_patient_phone, '$P_patient_email', '$P_doc_hos_id', $P_patient_password)";

    
    $worked=mysqli_query($conn,$insert_sql);

    if (!$worked) {
        echo '
                           <script type="text/javascript">
                           
                           $(document).ready(function(){
                             swal({
                               title: "Error!",
                               text:Patient could not be added",
                               type: "error".'.mysqli_errno($conn);'
                               
                           }).then(function() {
                            window.location = "addPatient.php";
                           });
                           
                           
                           });
                           
                           </script>
                           ';
    }else
    {
         echo '
                                      <script type="text/javascript">
                                      
                                      $(document).ready(function(){
                                        swal({
                                          title: "Success!",
                                          text: "Patient Added Successfuly",
                                          type: "success"
                                      }).then(function() {
                                          window.location = "patientfield.html";
                                      });
                                      
                                      
                                      });
                                      
                                      </script>
                                      ';
                                  
                                  exit();
                                 
    }


}

?>