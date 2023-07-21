<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>

<?php

require_once("connect2.php");

if (isset($_POST["addDoctor"])){



    $P_doc_hos_id = $_POST["doc_hos_id"];
    $P_doc_name =  $_POST["doc_name"];
    $P_doc_spec =  $_POST["doc_spec"];
    $P_doc_years = $_POST["doc_years"];
    $P_doc_phone = $_POST["doc_phone"];
    $P_doc_password = $_POST["doc_password"];


    $insert_sql = "INSERT INTO `tbldoctor`(doc_hos_id, doc_name, doc_spec, doc_years, doc_phone, doc_password) 
    VALUES ($P_doc_hos_id,'$P_doc_name','$P_doc_spec',$P_doc_years, $P_doc_phone,'$P_doc_password')";
    
    $worked=mysqli_query($conn,$insert_sql);

    if (!$worked) {
        echo '
                           <script type="text/javascript">
                           
                           $(document).ready(function(){
                             swal({
                               title: "Error!",
                               text:Doctor could not be added",
                               type: "error".'.mysqli_errno($conn);'
                               
                           }).then(function() {
                            window.location = "addDoctor.php";
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
                                          text: "Doctor Added Successfuly",
                                          type: "success"
                                      }).then(function() {
                                          window.location = "index.html";
                                      });
                                      
                                      
                                      });
                                      
                                      </script>
                                      ';
                                  
                                  exit();
                                 
    }


}

?>