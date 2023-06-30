<?php
require_once "config.php";

// Fetch data from the database
$query = "SELECT * FROM MIS_DATA"; // Replace 'MIS_DATA' with your actual table name
$result = mysqli_query($conn, $query);

// Create an array to store the data
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Return the data as JSON response
header("Content-Type: application/json");
echo json_encode($data);
?>