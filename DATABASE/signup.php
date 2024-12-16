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

$message = ""; // Message variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $username = $_POST['username'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

   // Check if the username already exists
   $checkStmt = $conn->prepare("SELECT * FROM users WHERE username=?");
   $checkStmt->bind_param("s", $username);
   $checkStmt->execute();
   $checkResult = $checkStmt->get_result();

   if ($checkResult->num_rows > 0) {
       // Username already taken
       $message = "<h3 style='color: #FFA500;'>Username already taken. Please choose another.</h3>";
   } else {
       // Proceed with registration
       $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
       if (!$stmt) {
           die("Prepare failed: " . $conn->error);
       }

       $stmt->bind_param("ss", $username, $password);

       if ($stmt->execute()) {
           // Success message
           $message = "<h3 style='color: rgb(148, 247, 151);'>Registration successful!</h3><p style='color: white;'>You can now login.</p>";
           echo "<script>
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 5000);
                </script>";
       } else {
           echo "Error: " . $stmt->error;
       }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign Up</title>
   <link rel="stylesheet" href="../css/database.css">
</head>
<body>
    <br><br>
    <div class="message-container">
        <?php if (!empty($message)): ?>
            <?php echo $message; ?>
        <?php else: ?>
            <h1>Welcome! Please fill out the form to sign up.</h1>
        <?php endif; ?>
    </div>
    <div class="container">
       <form method="post" class="signup-form">
           <label for="username">Username:</label>
           <input type="text" id="username" name="username" required>
           
           <label for="password">Password:</label>
           <input type="password" id="password" name="password" required>
           
           <button type="submit">Sign Up</button>
       </form>

       <p class="question">Already have an account? <a href="index.php">Login</a></p>
   </div>
</body>
</html>
