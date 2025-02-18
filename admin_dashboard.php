<?php
include "config.php";

$sql = "SELECT * FROM bookings ORDER BY booking_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>All Bookings</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Booking Number</th>
            <th>Date</th>
            <th>Payment Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["customer_name"]; ?></td>
            <td><?php echo $row["booking_number"]; ?></td>
            <td><?php echo $row["booking_date"]; ?></td>
            <td><?php echo $row["payment_status"]; ?></td>
            <td>
                <a href="update_booking.php?id=<?php echo $row['id']; ?>">Update</a> |
                <a href="delete_booking.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
