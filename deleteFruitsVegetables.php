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

// Get the foodID from the URL parameterfdfd
$foodID = $_GET['id'];

// SQL to delete a record
$sql = "DELETE FROM fruitsvegetables WHERE foodID=$foodID";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    // Redirect to the main page
    header("Location: FruitsVegetables.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
