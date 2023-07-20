<?php

require_once("connect2.php");

?>

<html>

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctor Sign up</title>
        <link rel="stylesheet" href="style2.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <h1>Doctor's Sign Up</h1>
        <form method="POST"  autocomplete = "off" enctype="multipart/form-data" autofocus action="">
            <div class="input-box">
               <input type="text" id="doc_hos_id" name="doc_hos_id" placeholder="Doctor's Hospital id">
               <i class='bx bx-id-card'></i>
            </div>

            <div class="input-box">
               <input type="text" id="doc_name" name="doc_name" placeholder="Doctor Name" required>
               <i class='bx bx-plus-medical' ></i>
            </div>

            <div class="input-box">
                <input type="text" id="doc_spec" name="doc_spec" placeholder="Doctor Speciality" required>
                <i class='bx bx-plus-medical' ></i>
            </div>
    
            <div class="input-box">
                <input typr="text" id="doc_years" name="doc_years" placeholder="Doctor Years of Practice" required>
                <i class='bx bx-calendar'></i>
            </div>

            <div class="input-box">
                <input type="text" id="doc_years" name="doc_phone" placeholder="Doctor Phone no" required>
                <i class='bx bx-phone'></i>
            </div>

            <div class="input-box">
                <input type="password" id="doc_password" name="doc_password" placeholder="Passsword" required >
                <i class='bx bx-check-double'></i>
            </div>

            <button type="submit" class="btn"  name="addDoctor">Submit</button><br>
            <br>
            <button type="submit" class="btn">Cancel</button>

            <div class="login-link">
                <p>Already Have an account? <a href="#">Login now</a></p>
            </div>
        </form>
       
    </div>
</body>

</html>



<?php

if (isset($_POST["addDoctor"])){


    $P_doc_hos_id = mysqli_real_escape_string($conn, $_POST["doc_hos_id"]);
    $P_doc_name = mysqli_real_escape_string($conn, $_POST["doc_name"]);
    $P_doc_spec = mysqli_real_escape_string($conn, $_POST["doc_spec"]);
    $P_doc_years = mysqli_real_escape_string($conn, $_POST["doc_years"]);
    $P_doc_phone = mysqli_real_escape_string($conn, $_POST["doc_phone"]);
    $P_doc_password = mysqli_real_escape_string($conn, $_POST["doc_password"]);
    $password = $password = password_hash($P_doc_password, PASSWORD_DEFAULT);

    $insert_sql = "INSERT INTO `tbldoctor`(doc_hos_id, doc_name, doc_spec, doc_years, doc_phone, doc_password) 
    VALUES ('$P_doc_hos_id','$P_doc_name','$P_doc_spec','$P_doc_years','$P_doc_phone','$password')";
    
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
                            window.location = "addDoc.php";
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