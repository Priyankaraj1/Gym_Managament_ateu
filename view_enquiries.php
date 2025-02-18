<?php
include "config.php";

// Pagination settings
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch all enquiries with pagination
$sql = "SELECT * FROM enquiries ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Count total records for pagination
$total_sql = "SELECT COUNT(id) FROM enquiries";
$total_result = $conn->query($total_sql);
$total_rows = $total_result->fetch_row()[0];
$total_pages = ceil($total_rows / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Enquiries</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Enquiry List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Booking Number</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['booking_number'] ?></td>
                <td>
                    <a href="edit_enquiry.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="delete_enquiry.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Pagination -->
    <div>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="view_enquiries.php?page=<?= $i ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
