<?php
session_start();
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

// Redirect authenticated users to the welcome page
if (isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}

$message = ""; // Message initialization

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            header("Location: welcome.php");
            exit();
        } else {
            $message = "<h3 style='color: #FFA500;'>Invalid password.</h3>";
        }
    } else {
        $message = "<h3 style='color: #FFA500;'>No user found.</h3>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/database.css"> 
</head>
<body>
    <div class="message-container">
        <?php if (!empty($message)): ?>
            <?php echo $message; ?>
        <?php else: ?>
            <h1>Welcome Back! Please log in.</h1>
        <?php endif; ?>
    </div>
    
    <div class="container">
        <form method="post" class="signup-form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <p class="question">Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</body>
</html>
