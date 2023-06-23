<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve doctor's ID from the submitted form
    $patient_nat_ID = $_POST['doc_hos_id'];

    // Retrieve the patient's information from the database
    $query = "SELECT * FROM tbldoctor WHERE doc_hos_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $doc_hos_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Display a form to edit the patient's information
    if ($row) {
        ?>
        <form action="update_doctor.php" method="POST">
            <input type="hidden" name="doc_hos_id" value="<?php echo $row['doc_hos_id']; ?>">
            <label for="doc_name">Doctor Name:</label>
            <input type="text" name="doc_name" value="<?php echo $row['doc_name']; ?>"><br>
            <label for="doc_password">Password:</label>
            <input type="password" name="doc_name" value="<?php echo $row['doc_name']; ?>"><br>
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "User not found.";
    }
}
?>