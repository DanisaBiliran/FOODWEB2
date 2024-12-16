<?php
session_start();
if (!isset($_SESSION['username'])) {
   header("Location: /PROJECTS/FOODWEB/DATABASE/index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>foodTRACK Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <link rel="stylesheet" href="css/sidebar.css">
    
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
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Header */
        .header {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            position: absolute;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #0E6B73;
            color: white;
        }

        .menu-button {
            font-size: 24px;
            font-weight: bolder;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .menu-button:hover {
            color: #4CAF50;
            transform: scale(1.5);
        }

        header a:hover {
            transform: scale(1.5);
        }

        /* Outer Box Around Title */
        .title-container {
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
            margin-top: 100px; /* Adjust top margin */
            width: 80%; /* Fixed width for the outer box */
            max-width: 600px; /* Set maximum width for better control */
            display: flex;
            justify-content: center;
            align-items: center;
            
            position: relative; 
            overflow: hidden;
        }

        .title-container img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 70%;
        }

        /* Inner Box for Title */
        .inner-title-container {
            background-color: white; /* Background for the title box */
            padding: 10px 20px; /* Padding for the inner box */
            border-radius: 10px; /* Rounded corners for the inner box */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for the inner box */
            text-align: center;
            margin-top: 20px; 

            position: absolute; 
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        /* Title Section */
        .title-section h1 {
            font-size: 48px;
            font-weight: bold;
            color: #00838f; 
        }

        /* Button Section */
        .button-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            gap: 20px;
        }

        .button-row {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .button-wrapper {
            text-align: center;
        }

        .button-wrapper img{
            width: 100%;
            object-fit: cover;
        }

        .action-button {
            width: 200px;
            height: 200px;
            border: none;
            border-radius: 22px;
            cursor: pointer;
            font-size: 25px;
            font-weight: bold;
            color: white;
            box-shadow: 5px 8px 10px rgba(0, 0, 0, 0.68);
            transition: transform 0.2s ease, background-color 0.3s ease;

            overflow: hidden;
        }

        .action-button:hover {
            transform: scale(1.05);
            background-color: #555;
        }

        .button-label {
            margin-top: 10px;
            font-size: 20px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <button class="menu-button">&#9776;</button>
        <a href="#" onclick="confirmLogout()">
            <i class="fa-solid fa-right-from-bracket" style="color: white;"></i>
        </a>
    </header>

     <!-- Sidebar Overlay -->
     <div class="sidebar-overlay"></div>

    <!-- Sidebar -->
    <div class="sidebar">
        <p>&#9776;</p>
        <a href="/PROJECTS/FOODWEB/menu.php" class="sidebar-item"><i class="fas fa-list icon-color"></i>&nbsp;&nbsp;&nbsp;Categories</a>
        <a href="/PROJECTS/FOODWEB/termsConditions.html" class="sidebar-item"><i class="fa-solid fa-scroll"></i>&nbsp;&nbsp;&nbsp;Terms & Conditions</a>
        <a href="/PROJECTS/FOODWEB/helpSupport.html" class="sidebar-item"><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;Help & Support</a>
        <a href="/PROJECTS/FOODWEB/aboutUs.html" class="sidebar-item">&nbsp;<i class="fa-solid fa-info"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;About Us</a>
        <a href="/PROJECTS/FOODWEB/rateUs.html" class="sidebar-item"><i class="fa-solid fa-star"></i>&nbsp;&nbsp;&nbsp;&nbsp;Rate Us</a>
    </div>

    <!-- Outer Box Around Title Section -->
    <div class="title-container">
        <img src="pictures/foodTRACK.png" alt="">
        <div class="inner-title-container">
            <div class="title-section">
                <h1>foodTRACK</h1>
            </div>
        </div>
    </div>

    <!-- Button Section Centered -->
    <div class="button-section">
        <div class="button-row">
            <div class="button-wrapper">
                <!-- Link to GrainsCereals.php page -->
                <a href="GRAINSCEREALS/grainscereals.php">
                    <button class="action-button">
                        <img src="pictures/Grains.png" alt="">
                    </button>
                </a>
                <p class="button-label">Grains, Cereals</p>
            </div>

            <div class="button-wrapper">
                <!-- Link to FruitsVegetables.php page -->
                <a href="FruitsVegetables.php">
                    <button class="action-button">
                        <img src="pictures/Fruits.png" alt="">
                    </button>
                </a>
                <p class="button-label">Fruits, Vegetables</p>
            </div>
        </div>

        <div class="button-row">
            <div class="button-wrapper">
                <!-- Link to MeatDairyProducts.php page -->
                <a href="MEATSDAIRY/meatsdairy.php">
                    <button class="action-button">
                        <img src="pictures/Dairy.png" alt="">
                    </button>
                </a>
                <p class="button-label">Meat, Dairy Products</p>
            </div>

            <div class="button-wrapper">
                <!-- Link to Sweets.php page -->
                <a href="SWEETS/sweets.php">
                    <button class="action-button">
                        <img src="pictures/Sweets.png" alt="">
                    </button>
                </a>
                <p class="button-label">Sweets</p>
            </div>
        </div>
    </div>
    <br><br>

    <script src="js/sidebar.js"></script>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "/PROJECTS/FOODWEB/DATABASE/logout.php";
            } else {
                window.location.href = "/PROJECTS/FOODWEB/menu.php";
            }
        }
    </script>
</html>
