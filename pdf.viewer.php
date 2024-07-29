<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skmedia";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get file ID from the URL
$file_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the file from the database
$sql = "SELECT file_name, file_type, file_content FROM law WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $file_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($file_name, $file_type, $file_content);
$stmt->fetch();

if ($stmt->num_rows > 0) {
    header("Content-Type: " . $file_type);
    header("Content-Disposition: inline; filename=" . $file_name);
    echo $file_content;
} else {
    echo "File not found.";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
