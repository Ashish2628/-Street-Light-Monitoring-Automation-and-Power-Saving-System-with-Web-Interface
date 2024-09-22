<?php
// Replace with your actual database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "sensorinformation";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select rows with status = 0
$sql = "SELECT id, Landmark FROM dht11 WHERE status = 0";
$result = $conn->query($sql);

// Check if there are any rows with status 0
if ($result->num_rows > 0) {
    // Initialize an empty array to store the data
    $data = array();
    // Fetch associative array of each row
    while ($row = $result->fetch_assoc()) {
        // Push the row data into the array
        $data[] = $row;
    }
    // Encode the array as JSON and output it
    echo json_encode($data);
} else {
    // If no rows found with status 0, return an empty array
    echo json_encode(array());
}

// Close connection
$conn->close();
?>