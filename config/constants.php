<?php
    //Start session
    session_start();
    //Create Constants to Store non repeating values
    define('SITEURL','http://localhost/little-prince-shop/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','little-prince-order');
  $conn= mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn)); //Database connection
  $db_select=mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //Selecting Database