<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /PROJECTS/FOODWEB/DATABASE/index.php");
    exit();
}
$user_id = $_SESSION['user_id'] ?? null;

?>

<!DOCTYPE html>
<html>
<head>
    <title>foodTRACK Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/categoryPage.css">
</head>
<body>
    <!-- PHP Logic -->
    <?php
    // Set the timezone to Philippines
    date_default_timezone_set('Asia/Manila');

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ftdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    }

    // Initialize search variable
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    // Query to fetch data
    $sql = "SELECT foodID, foodName, location_stored, notes, expiration_date, shelf_life, created_at 
             FROM sweets 
             WHERE user_id = '$user_id' AND foodName LIKE '%$search%'"; // Filter by food name

    $result = $conn->query($sql);
    ?>

    <!-- Header -->
    <header class="header">
      <button class="back-button" onclick="window.location.href='/PROJECTS/FOODWEB/menu.php';">
          <i class="fas fa-arrow-left"></i>
      </button>
    </header>

    
    <div class="title-container">
      <h1>Sweets</h1>
    </div>

    
    <div class="white-box">
      <!-- Search Form -->
      <div class="search-container">
          <form method="GET" action="">
              <input type="text" name="search" placeholder="Search" required>
              <button type="submit">Search</button>
          </form>
          <button onclick="window.location.href='?'" style="padding: 10px; background-color:#f0ad4e;color:white;border:none;border-radius:5px;margin-left:10px;">Show All</button>
      </div>

      <?php
      if ($result->num_rows > 0) {
          echo "<table>";
          echo "<tr>
                  <th>Name</th>
                  <th>Location Stored</th>
                  <th>Notes</th>
                  <th>Expiration Date</th>
                  <th>Shelf Life</th>
                  <th>Timer</th>
                  <th>Edit</th><th>Delete</th>
              </tr>";
          while ($row = $result->fetch_assoc()) {

              $created_at = strtotime($row["created_at"]);
              $shelf_life_seconds = intval($row["shelf_life"]) * 3600; 
              $expiration_time = ($created_at + $shelf_life_seconds) * 1000;

              echo "<tr>";
              echo "<td>" . htmlspecialchars($row["foodName"]) . "</td>";
              echo "<td>" . htmlspecialchars($row["location_stored"]) . "</td>";
              echo "<td>" . htmlspecialchars($row["notes"]) . "</td>";
              echo "<td>" . htmlspecialchars($row["expiration_date"]) . "</td>";
              echo "<td>" . htmlspecialchars($row["shelf_life"]) . " hours</td>";
              echo "<td><span class='timer' data-expiration='$expiration_time'>Calculating...</span></td>";
              echo "<td><a href='editSweets.php?id=" . $row["foodID"] . "' class='edit-button'>Edit</a></td>";
              echo "<td><a href='deleteSweets.php?id=" . $row["foodID"] . "' class='delete-button'>Delete</a></td>";
              echo "</tr>";
          }
          echo "</table>";
      } else {
          echo "No results found.";
      }
      $conn->close();
      ?>
    </div>

    <a href="/PROJECTS/FOODWEB/SWEETS/detailsSweets.php" class="no-decoration">
      <button class="add-button"><i class="fas fa-plus"></i></button>
    </a>
    
    <br><br>

    <script>
        
      function formatTime(seconds) {
          const hours = Math.floor(seconds / 3600);
          const minutes = Math.floor((seconds % 3600) / 60);
          const secs = seconds % 60;

          return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
      }

      
      function updateTimers() {
          const timers = document.querySelectorAll('.timer');
          
          timers.forEach(timer => {
              const expirationTime = parseInt(timer.dataset.expiration); 
              const currentTime = Date.now(); 

              const remainingTime = Math.floor((expirationTime - currentTime) / 1000); 

              if (remainingTime > 0) {
                  timer.textContent = formatTime(remainingTime); 
              } 
          });
      }

      
      setInterval(updateTimers,1000);

      
      updateTimers();
      
   </script>
</body>
</html>
