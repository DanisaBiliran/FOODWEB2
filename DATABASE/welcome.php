<?php
session_start();
if (!isset($_SESSION['username'])) {
   header("Location: index.php");
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/database.css"> 
</head>
<body>
    <div class="message-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    </div>
    <div class="container">
        <p>You can now use the app.</p>
        <button onclick="location.href='/PROJECTS/FOODWEB/menu.php'" class="proceed-button">Proceed to Menu</button>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = '/PROJECTS/FOODWEB/menu.php';
        }, 5000);
    </script>
</body>
</html>

