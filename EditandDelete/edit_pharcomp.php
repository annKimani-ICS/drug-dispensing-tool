<?php
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve pharcmmp's ID from the submitted form
    $phar_comp_name = $_POST['phar_comp_name'];

    // Retrieve the pharcomp's information from the database
    $query = "SELECT * FROM pharcomp WHERE phar_comp_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $phar_comp_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Display a form to edit the pharcomp's information
    if ($row) {
        ?>
        <form action="update_pharcomp.php" method="POST">
            <label for="phar_comp_name">Doctor Name:</label>
            <input type="text" name="phar_comp_name" value="<?php echo $row['phar_comp_name']; ?>"><br>
            <label for="doc_password">Password:</label>
            <input type="password" name="pharcomp_pass" value="<?php echo $row['pharcomp_pass']; ?>"><br>
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "User not found.";
    }
}
?>