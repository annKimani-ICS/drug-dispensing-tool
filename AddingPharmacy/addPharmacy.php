<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>

<?php

require_once("connect3.php");

if (isset($_POST["addPharmacy"])){



    $P_pharmacy_name = $_POST["pharmacy_name"];
    $P_pharmacy_phone_no =  $_POST["pharmacy_phone_no"];
    $P_pharma_drug_price =  $_POST["pharma_drug_price"];
    $P_pharmacy_stock =  $_POST["pharmacy_stock"];
    $P_contract_id =  $_POST["contract_id"];
    $P_drug_trade_name =  $_POST["drug_trade_name"];
    $P_pharmacy_password = $_POST["pharmacy_password"];
  

    $insert_sql = "INSERT INTO `tblpharmacy`(pharmacy_name, pharmacy_phone_no, pharma_drug_price, pharmacy_stock, contract_id, drug_trade_name, pharmacy_password)
    VALUES ('$P_pharmacy_name', $P_pharmacy_phone_no, $P_pharma_drug_price, $P_pharmacy_stock, $P_contract_id, '$P_drug_trade_name', $P_pharmacy_password)";
    
    $worked=mysqli_query($conn,$insert_sql);

    if (!$worked) {
        echo '
                           <script type="text/javascript">
                           
                           $(document).ready(function(){
                             swal({
                               title: "Error!",
                               text:Pharmacist could not be added",
                               type: "error".'.mysqli_errno($conn);'
                               
                           }).then(function() {
                            window.location = "addPharmacy.php";
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
                                          text: "Pharmacist Added Successfuly",
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