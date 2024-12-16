<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ftdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete the record
$foodID = $_GET['id'];
$sql = "DELETE FROM sweets WHERE foodID=$foodID";

if ($conn->query($sql) === TRUE) {
    header('Location: sweets.php');
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
