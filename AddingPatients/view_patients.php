<!DOCTYPE html>
<html>
<head>
    <title>Admin View Patients</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin_view.css">
</head>
<body>
    <header class="header">
        <img src="hospital.png" alt="Logo" class="logo">
        <h1 class="project-name">Drug Dispensing Tool</h1>
    </header>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "example";

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Pagination variables
    $recordsPerPage = 8;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $recordsPerPage;

    // Retrieve total number of records
    $totalRecordsQuery = "SELECT COUNT(*) AS total FROM tbl_patient";
    $totalRecordsResult = $conn->query($totalRecordsQuery);
    $totalRecords = $totalRecordsResult->fetch_assoc()['total'];

    // Calculate total number of pages
    $totalPages = ceil($totalRecords / $recordsPerPage);

    // Retrieve limited records for the current page, sorted by SSN in descending order
    $sql = "SELECT * FROM tbl_patient ORDER BY SSN DESC LIMIT $offset, $recordsPerPage";
    $result = $conn->query($sql);
    ?>

    <table>
        <tr>
            <th>SSN</th>
            <th style="background-color: rgb(238, 233, 232);">First Name</th>
            <th>Last Name</th>
            <th style="background-color: rgb(238, 233, 232);">Postal Address</th>
            <th>Date of Birth</th>
            <th style="background-color: rgb(238, 233, 232);">Email</th>
            <th>Phone</th>
            <th style="background-color: rgb(238, 233, 232);">Password</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['pat_nat_ID']; ?></td>
                <td style="background-color: rgb(238, 233, 232);"><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['patient_name']; ?></td>
                <td style="background-color: rgb(238, 233, 232);"><?php echo $row['Patient_address']; ?></td>
                <td><?php echo $row['DOB']; ?></td>
                <td style="background-color: rgb(238, 233, 232);"><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Phone']; ?></td>
                <td style="background-color: rgb(238, 233, 232);"><?php echo $row['Password']; ?></td>
                <td>
                    <form action="edit_patients.php" method="POST">
                        <input type="hidden" name="patient_id_no" value="<?php echo $row['patient_id_no']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                    <form action="delete_patients.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this patient?');">
                        <input type="hidden" name="patient_id_no" value="<?php echo $row['patient_id_no']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo ($page - 1); ?>">Previous</a>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <?php if ($i == $page): ?>
                    <span><?php echo $i; ?></span>
                <?php else: ?>
                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            
            <?php if ($page < $totalPages): ?>
                <a href="?page=<?php echo ($page + 1); ?>">Next</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <button class="back-button" onclick="goBack()">Back</button>

    <script>
        function goBack() {
            window.location.href = "admin.php";
        }
    </script>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html