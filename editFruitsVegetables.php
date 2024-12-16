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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update the record
    $foodID = $_POST['foodID'];
    $foodName = $_POST['foodName'];
    $locationStored = $_POST['location_stored'];
    $notes = $_POST['notes'];
    $expirationDate = $_POST['expiration_date'];
    $shelfLife = $_POST['shelf_life'];

    $sql = "UPDATE fruitsvegetables SET foodName='$foodName', location_stored='$locationStored', notes='$notes', expiration_date='$expirationDate', shelf_life='$shelfLife' WHERE foodID=$foodID";

    if ($conn->query($sql) === TRUE) {
        header('Location: /PROJECTS/FOODWEB/FruitsVegetables.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Retrieve the record
    $foodID = $_GET['id'];
    $sql = "SELECT * FROM fruitsvegetables WHERE foodID=$foodID";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/details.css">
    <style>
        /* Add some styling for the timer */
        .timer-container {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .equals {
            font-size: 1.5rem;
            color: gray;
        }

        #timer-display {
            font-weight: bold;
            color: #333;
        }
        input[type="number"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1em;
        }
    </style>

    <title>Edit Food Item</title>
    <style>
        /* Add some styling for the timer */
        .timer-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .equals {
            font-size: 1.5rem;
            color: gray;
        }

        #timer-display {
            font-weight: bold;
            color: #333;
        }

        .long-buttons {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .long-buttons button {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border: none;
            border-radius: 8px;
            padding: 5px;
            font-size: 24px;
            cursor: pointer;
            color: white;
        }

        .long-buttons .confirm{
            background-color: black;
        }

        .long-buttons .back-button{
            background-color: #1598a5;
        }
        .long-buttons button:hover {
            transform: scale(1.1);
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Food Item</h1>

        <form action="editFruitsVegetables.php" method="post" onsubmit="return validateForm()">
            <input type="hidden" name="foodID" value="<?php echo $row['foodID']; ?>">
            <label for="foodName">Name</label>
            <input type="text" name="foodName" value="<?php echo $row['foodName']; ?>" required>
            
            <label for="expiration-date">Expiration date</label>
            <input type="date" id="expiration-date" name="expiration_date" value="<?php echo $row['expiration_date']; ?>">
            
            <!-- Shelf-life and Timer -->
            <div class="timer-container">
                <div>
                    <label for="shelf-life">Shelf-life</label>
                    <input type="number" id="shelf-life" name="shelf_life" value="<?php echo $row['shelf_life']; ?>" placeholder="hour(s) before spoilage" min="1">
                </div>
                <div class="equals">=</div>
                <div>
                    <label for="timer-display">Timer</label>
                    <span id="timer-display">00:00:00</span>
                </div>
            </div>

            
            <label for="location-stored">Location stored</label>
            <input type="text" id="location-stored" name="location_stored" value="<?php echo $row['location_stored']; ?>">
            
            <label for="notes">Notes</label>
            <textarea id="notes" name="notes"><?php echo $row['notes']; ?></textarea>
            
            <div class="long-buttons">
            <button type="submit" class="confirm update">Update</button>
            <button onclick="history.back()" class="back-button">Back</button>
            </div>
        </form>
    </div>

    <script>
        const shelfLifeInput = document.getElementById('shelf-life');
        const timerDisplay = document.getElementById('timer-display');
        let countdownInterval;

        // Function to format time (hh:mm:ss)
        function formatTime(seconds) {
            const hours = Math.floor(seconds / 3600);
            const minutes = Math.floor((seconds % 3600) / 60);
            const secs = seconds % 60;
            return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        }

        // Function to start the countdown
        function startCountdown(hours) {
            if (countdownInterval) clearInterval(countdownInterval); // Clear previous interval
            let remainingSeconds = hours * 3600;

            // Update timer display immediately
            timerDisplay.textContent = formatTime(remainingSeconds);

            countdownInterval = setInterval(() => {
                remainingSeconds--;

                if (remainingSeconds >= 0) {
                    timerDisplay.textContent = formatTime(remainingSeconds);
                } else {
                    clearInterval(countdownInterval); // Stop the timer when it reaches 0
                    alert('Shelf-life timer has expired!');
                }
            }, 1000); // Update every second
        }

        // Event listener for shelf-life inputfdfdfdfd
        shelfLifeInput.addEventListener('input', (e) => {
            const hours = parseFloat(e.target.value);
            console.log("Shelf-life input value:", hours); // Debugging linefd
            if (hours > 0) {
                startCountdown(hours);
            } else {
                timerDisplay.textContent = "00:00:00"; // Reset display if input is invalidfdfd
            }
        });

        // Start countdown with the initial value from the database
        const initialHours = parseFloat(shelfLifeInput.value);
        if (initialHours > 0) {
            startCountdown(initialHours);
        }

        //Either expiration date or shelf-life, but not both
        function validateForm() {
            const expirationDate = document.getElementById('expiration-date').value;
            const shelfLife = document.getElementById('shelf-life').value;

            if (expirationDate && shelfLife) {
                alert("Please enter either an expiration date or shelf-life, but not both.");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
</body>
</html>
