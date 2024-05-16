<?php
session_start(); // Inițializați sesiunea
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little Prince Shop</title>
    <h1>Welcome to Little Prince Shop</h1>
    <style>
        /* Stilizează butoanele */
        
        .container {
            text-align: center;
            margin-top: 20vh; /* Afișează la mijlocul ecranului */
        }
        h1 {
            font-size: 36px;
            text-decoration: underline; /* Subliniază textul */
            text-align: center;
        }
        
        .buttons {
            margin-top: 30px; /* Spațiu între titlu și butoane */
        }
        .buttons a {
            text-decoration: none;
            display: block;
            margin-bottom: 20px;
        }
        .buttons button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 20px 40px; /* Dimensiuni mai mari */
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px; /* Mărimea textului mai mare */
            margin: 0 10px; /* Spațiere între butoane */
            cursor: pointer;
            width: 250px; /* Lățimea butonului */
            transition: background-color 0.4s;
            border-radius: 5px;
        }
        .buttons button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body style="background-image: url('images/little-prince-cover.jpg'); background-size: cover;">
    <div class="container">
    <?php
    if (isset($_SESSION['success_message'])) {
        echo "<h1 style='color: green'>" . $_SESSION['success_message'] . "</h1>";
        unset($_SESSION['success_message']); // Ștergeți mesajul după afișare pentru a nu fi afișat din nou
    }
    if (isset($_SESSION['error_message'])) {
        echo "<h1 style='color:red';>" . $_SESSION['error_message'] . "</h1>";
        unset($_SESSION['error_message']); // Ștergeți mesajul după afișare pentru a nu fi afișat din nou
    }
    if (isset($_SESSION['error_pass'])) {
        echo "<h1 style='color : red;'>" . $_SESSION['error_pass'] . "</h1>";
        unset($_SESSION['error_pass']); // Ștergeți mesajul după afișare pentru a nu fi afișat din nou
    }
    ?>
        <div class="buttons">
            <a href="register.php"><button>Creează un cont</button></a>
            <a href="login.php"><button>Conectează-te</button></a>
        </div>
    </div>
</body>
</html>
