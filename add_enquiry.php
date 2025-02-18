<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $booking_number = uniqid("BOOK_");

    $sql = "INSERT INTO enquiries (name, phone, email, booking_number) VALUES ('$name', '$phone', '$email', '$booking_number')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Enquiry Added Successfully. <a href='view_enquiries.php'>View Enquiries</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Enquiry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add Enquiry</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required><br>
        <input type="text" name="phone" placeholder="Message or Query" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
