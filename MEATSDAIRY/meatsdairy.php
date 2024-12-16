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
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #2ca5a8; 
            color: #333;
            height: auto; 
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .header {
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(0, 0, 0, 0.027);
            position: relative; 
            width: 100%;
            display: flex;
            flex-wrap: wrap; 
            justify-content: space-between; 
            align-items: center;
            padding: 10px 20px;
            background-color: #0E6B73;
            color: white;
        }

        .back-button {
            font-size: 24px;
            background-color: transparent;
            color: white;
            border: none;
            font-weight: bolder;
        }

        .title-container {
            margin-top: 40px;
            text-align: center;
        }

        .title-container h1 {
            font-size: 36px;
            color: white;
            font-weight: bolder;
        }

        .white-box {
            background-color: white;
            width: 80%;
            height: 70vh; 
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: separate;
            border-spacing: 5px 10px;
        }

        th, td {
            text-align: left;
            padding: 10px;
            background: #f9f9f9; 
            border-radius: 4px;
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);
        }

        th {
            background: #00838f;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .edit-button, .delete-button {
            text-decoration: none;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
        }

        .edit-button {
            background-color: #4CAF50;
        }

        .delete-button {
            background-color: #f44336;
        }

        .add-button {
            box-shadow: 4px 5px 8px rgba(0, 0, 0, 0.555);
            background-color: black; 
            color: white;

            margin-top: 20px; 
            padding: 20px;
            font-size: 32px; 
            font-weight: bolder;
            border: none;
            border-radius: 50%;
        }

        .add-button:hover {
            transform: scale(1.2);
        }

        .timer {
            font-weight: bold;
        }

        .timer.expired {
            color: red;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 600px) {
            .header {
                flex-direction: column; 
                align-items: center; 
                padding-bottom: 10px; 
            }

            .add-button {
                font-size: 24px; 
                padding: 15px; 
            }
        }
    </style>
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
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data
    $sql = "SELECT foodID, foodName, location_stored, notes, expiration_date, shelf_life, created_at 
        FROM meatsdairy 
        WHERE user_id = '$user_id'";  // Filter by the logged-in user do this 
    
    $result = $conn->query($sql);
    ?>

    <!-- Header -->
    <header class="header">
        <button class="back-button" onclick="window.location.href='/PROJECTS/FOODWEB/menu.php';">
            <i class="fas fa-arrow-left"></i>
        </button>
    </header>

    
    <div class="title-container">
        <h1>Meats, Dairy Products</h1>
    </div>

    
    <div class="white-box">
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
                echo "<td><a href='editmeatsdairy.php?id=" . $row["foodID"] . "' class='edit-button'>Edit</a></td>";
                echo "<td><a href='deletemeatsdairy.php?id=" . $row["foodID"] . "' class='delete-button'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }
        $conn->close();
        ?>
    </div>

    <a href="/PROJECTS/FOODWEB/MEATSDAIRY/detailsmeatsdairy.php" class="no-decoration">
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

        
        setInterval(updateTimers, 1000);

        
        updateTimers();
    </script>
</body>
</html>

