<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
</head>
<body>
    <center>
        <?php
        session_start(); // Start the session

        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbdrugtool";

        // Create a new connection
        $conn = new mysqli($host, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the admin's first name and last name from the database
        $SSN = $_SESSION['admin_name'];

        $query = "SELECT 'admin_name' FROM tbl_admin WHERE ID_NO = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $SSN);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $Name = $row['Name'];
           

            echo "<h2>Welcome, $Name </h2>";
        } else {
            echo "<h2>Welcome, Admin $Name</h2>";
        }

        $conn->close();
        ?>

        <h3>Actions:</h3>

        <form action="../EditandDelete/viewpatients.php" method="POST">
            <input type="submit" value="Patients">
        </form>

        <form action="../EditandDelete/view_doctor.php" method="POST">
            <input type="submit" value="Doctors">
        </form>

        <form action="../EditandDelete/view_prescriptions.php" method="POST">
            <input type="submit" value="Drugs">
        </form>

        <form action="../EditandDelete/view_prescriptions.php" method="POST">
            <input type="submit" value="Pharmacists">
        </form>

        <form action="../EditandDelete/view_pharcomp.php" method="POST">
            <input type="submit" value="Pharmaceutical Companies">
        </form>

        <form action="../EditandDelete/view_superv.php" method="POST">
            <input type="submit" value="Supervisors">
        </form>

        <form id="logoutForm">
            <input type="button" value="Log Out" onclick="goBack()">
        </form>

    </center>

    <script>
        function goBack() {
            //window.history.back();
            window.location.href = "login.html";
        }
    </script>

<script>
    function validatePatient() {
        // Fetch input values
        const patientNatID = document.getElementById('patient_nat_ID').value;
        const drugTradeName = document.getElementById('drug_trade_name').value;
        const presDosage = document.getElementById('pres_dosage').value;
        const presAmount = document.getElementById('pres_amount').value;

        // Perform validation on input values
        // You can add your custom validation logic here
        if (patientNatID.trim() === '') {
            alert('Patient ID is required.');
            return false;
        }

        if (drugTradeName.trim() === '') {
            alert('Drug Name is required.');
            return false;
        }

        if (presDosage.trim() === '') {
            alert('Dosage is required.');
            return false;
        }

        if (presAmount.trim() === '' || isNaN(presAmount)) {
            alert('Invalid amount.');
            return false;
        }

        // If all validations pass, the form will be submitted
        return true;
    }
</script>
</body>
</html>