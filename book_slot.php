<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $booking_date = $_POST["booking_date"];
    $slot_time = $_POST["slot_time"];
    $booking_number = "GYM" . rand(1000, 9999); // Unique booking ID

    $sql = "INSERT INTO bookings (customer_name, booking_number, booking_date, payment_status) 
            VALUES ('$name', '$booking_number', '$booking_date', 'Pending')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Slot Booked! Your Booking Number: $booking_number');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Gym Slot</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Book a Gym Slot</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="date" name="booking_date" required>
        <select name="slot_time" required>
            <option value="6:00 AM - 7:00 AM">6:00 AM - 7:00 AM</option>
            <option value="7:00 AM - 8:00 AM">7:00 AM - 8:00 AM</option>
            <option value="8:00 AM - 9:00 AM">8:00 AM - 9:00 AM</option>
        </select>
        <button type="submit">Book Slot</button>
    </form>
</body>
</html>
