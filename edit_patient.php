<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve patient's ID from the submitted form
    $patient_nat_ID = $_POST['patient_nat_ID'];

    // Retrieve the patient's information from the database
    $query = "SELECT * FROM tblpatient WHERE patient_nat_ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $patient_nat_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Display a form to edit the patient's information
    if ($row) {
        ?>
        <form action="update_patient.php" method="POST">
            <input type="hidden" name="patient_nat_ID" value="<?php echo $row['patient_nat_ID']; ?>">
            <label for="patient_name">Patient Name:</label>
            <input type="text" name="patient_name" value="<?php echo $row['patient_name']; ?>"><br>
            <label for="patient_password">Password:</label>
            <input type="password" name="patient_password" value="<?php echo $row['patient_password']; ?>"><br>
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "User not found.";
    }
}
?>