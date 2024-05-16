<?php
include('config/constants.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['confirm_pass'];

    // Validare și filtrare
    $email = mysqli_real_escape_string($conn, $email);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $confirm_password = mysqli_real_escape_string($conn, $confirm_password);

    // Verificare dacă parolele coincid
    if ($password !== $confirm_password) {
        $_SESSION['error_pass'] = "Parolele nu corespund";
        header("Location: http://localhost/little-prince-shop/prima_pagina.php");
        exit();
    }

    // Verificare dacă există deja un utilizator cu același nume
    $sql_check_username = "SELECT * FROM tbl_login WHERE username = '$username'";
    $result_check_username = mysqli_query($conn, $sql_check_username);
    if (mysqli_num_rows($result_check_username) > 0) {
        $_SESSION['error_message'] = "Acest nume de utilizator deja există.";
        header("Location: http://localhost/little-prince-shop/prima_pagina.php");
        exit();
    }

    // Introducere date în baza de date
    $sql = "INSERT INTO tbl_login (username, password, email) VALUES ('$username', '$password', '$email')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Cont creat cu succes";
        header("Location: http://localhost/little-prince-shop/prima_pagina.php");
        exit();
    } else {
        echo "Eroare: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
