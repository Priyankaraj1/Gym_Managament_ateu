<?php
include "config.php";

$search = isset($_GET["query"]) ? $_GET["query"] : "";

$sql = "SELECT * FROM enquiries WHERE booking_number LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Bookings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Search Booking</h2>
    <form method="GET">
        <input type="text" name="query" placeholder="Enter Booking Number" value="<?php echo $search; ?>">
        <button type="submit">Search</button>
    </form>

    <h3>Results:</h3>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?php echo $row["name"] . " - " . $row["booking_number"] . " - " . $row["status"]; ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
