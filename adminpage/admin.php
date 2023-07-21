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
        $SSN = $_SESSION['name'];

        $query = "SELECT `admin_name` FROM tbl_admin WHERE admin_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $SSN);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $Name = $row['admin_name'];
            echo "<h2>Welcome, $Name </h2>";
        } else {
            echo "<h2>Welcome, Admin</h2>";
        }

        $conn->close();
        ?>

        <h3>Actions:</h3>

        <form action="../EditandDelete/viewpatients.php" method="POST">
            <input type="submit" value="Patients">
        </form>

        <!-- Other forms for different actions -->

        <form id="logoutForm">
            <input type="button" value="Log Out" onclick="goBack()">
        </form>

    </center>

    <script>
        function goBack() {
            //window.history.back();
            window.location.href = "../loginpage/index.html";
        }
    </script>
</body>
</html>