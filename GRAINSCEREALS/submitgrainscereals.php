<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /PROJECTS/FOODWEB/DATABASE/index.php");
    exit();
}

$user_id = $_SESSION['user_id'] ?? null;

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve and sanitize form datafdfdfdfdf
  $foodName = $_POST['foodName'] ?? '';
  $locationStored = $_POST['location_stored'] ?? '';
  $notes = $_POST['notes'] ?? '';
  $expirationDate = $_POST['expiration_date'] ?? '';
  $shelfLife = $_POST['shelf_life'] ?? '';

  // Validate and sanitize data
  $foodName = $conn->real_escape_string($foodName);
  $locationStored = $conn->real_escape_string($locationStored);
  $notes = $conn->real_escape_string($notes);
  $expirationDate = !empty($expirationDate) ? $expirationDate : "0000-00-00";
  $shelfLife = !empty($shelfLife) ? (int)$shelfLife : 0;

  // Insert data into the appropriate table
  $sql = "INSERT INTO grainscereals (foodName, location_stored, notes, expiration_date, shelf_life, user_id)
        VALUES ('$foodName', '$locationStored', '$notes', '$expirationDate', '$shelfLife', '$user_id')";

  if ($conn->query($sql) === TRUE) {
    // Redirect to a success page or details page after successful insertion
    header("Location: grainscereals.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
