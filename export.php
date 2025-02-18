<?php
include "config.php";

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=enquiries.csv");

$output = fopen("php://output", "w");
fputcsv($output, array('ID', 'Name', 'Phone', 'Email', 'Booking Number'));

$sql = "SELECT * FROM enquiries";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
?>
