<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/details.css">
    <title>Details Form</title>
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
</head>
<body>
    <div class="container">
        <h1>Details</h1>
        <p class="subtitle">Enter either expiration date or shelf-life, but not both.</p>
        <br>
        <form action="submitgrainscereals.php" method="post" onsubmit="return validateForm()">
            <!-- Name -->
            <label for="foodName">Name</label>
            <input type="text" name="foodName" placeholder="Enter food name" required />

            <!-- Expiration Date -->
            <label for="expiration-date">Expiration date</label>
            <input type="date" id="expiration-date" name="expiration_date" placeholder="mm/dd/yyyy">

            <!-- Shelf-life and Timer -->
            <div class="timer-container">
                <div>
                    <label for="shelf-life">Shelf-life</label>
                    <input type="number" id="shelf-life" name="shelf_life" placeholder="hour(s) before spoilage" min="1">
                </div>
                <div class="equals">=</div>
                <div>
                    <label for="timer-display">Timer</label>
                    <span id="timer-display">00:00:00</span>
                </div>
            </div>

            <br>
            <h4 style="margin-bottom: 2px; color: rgb(165, 163, 163);">Additional Information</h4>

            <!-- Location Stored -->
            <label for="location-stored">Location stored</label>
            <input type="text" id="location-stored" name="location_stored" placeholder="(optional)">

            <!-- Notesfdfd-->
            <label for="notes">Notes</label>
            <textarea id="notes" name="notes" placeholder="(optional)"></textarea>

            <!-- Buttons -->
            <div class="buttons">
                <button type="reset" class="cancel" id="resetButton" onclick="history.back()">&#10006;</button>
                <button type="submit" class="confirm">&#10004;</button>
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

        // Event listener for shelf-life input
        shelfLifeInput.addEventListener('input', (e) => {
            const hours = parseFloat(e.target.value);
            console.log("Shelf-life input value:", hours); // Debugging line
            if (hours > 0) {
                startCountdown(hours);
            } else {
                timerDisplay.textContent = "00:00:00"; // Reset display if input is invalid
            }
        });

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
