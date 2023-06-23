<?php
require_once('connect.php');

// Pagination variables
$recordsPerPage = 3; // Number of records to display per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the URL, default to 1 if not set
$offset = ($page - 1) * $recordsPerPage; // Calculate the offset for the database query

// Retrieve total number of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM tbldoctor";
$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecords = $totalRecordsResult->fetch_assoc()['total']; // Get the total number of records

// Calculate total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage); // Calculate the total number of pages based on the total records and records per page

// Retrieve limited records for the current page
$sql = "SELECT * FROM tbldoctor LIMIT $offset, $recordsPerPage";
$result = $conn->query($sql); // Execute the database query to retrieve the records for the current page
//Display the table of records next
?>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid black;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
    }
</style>
<table>
    <tr>
        <th>Doctor Hos ID</th>
        <th>Doctor Name</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
</table>

<?php while ($row = $result->fetch_assoc()) : ?>
    <tr>
        <td><?php echo $row['doc_hos_ID']; ?></td>
        <td><?php echo $row['doc_name']; ?></td>
        <td><?php echo $row['doc_password']; ?></td>
        <td>
            <form action="edit_doctor.php" method="POST">
                <input type="hidden" name="doc_hos_ID" value="<?php echo $row['doc_hos_ID']; ?>">
                <input type="submit" value="Edit">
            </form>
            <form action="delete_doctor.php" method="POST">
                    <input type="hidden" name="doc_hos_ID" value="<?php echo $row['doc_hos_ID']; ?>">
                    <input type="submit" value="Delete">
            </form>
        </td>
    </tr>   
<?php endwhile; ?>
</table>

<?php if($totalPages < 1) : ?>
    <div>
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
