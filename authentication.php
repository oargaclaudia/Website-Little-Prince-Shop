<?php      
    include('config/constants.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select * from tbl_login where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if ($count == 1){  
            echo "<script>window.location.href = 'http://localhost/little-prince-shop';</script>";
        } else {  
            echo "<h1>Autentificare eșuată. Nume de utilizator sau parolă invalidă.</h1>";  
        }   
?>  