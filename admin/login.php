<?php include('../config/constants.php'); ?>
<html>
    <head>
        <title>
            Login - Little Prince Order System      </title>
            <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1> <br> <br>
            <?php 
            if (isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            
            if (isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            
            ?>
            <br> <br>


            <!-- Login Form Starts Here -->
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter username:"> <br> <br>

            Password:  <br>
            <input type="password" name="password" placeholder="Enter password:">  <br> <br>

            <input type="submit" name="submit" value="Login" class="btn-primary"> <br> <br>
            </form>






            <!-- Login Form Ends Here -->
            <p class="text-center">Created By - <a href="https://www.linkedin.com/in/claudia-oarga-2b158026a/">Oarga Claudia</p>


        </div>

    </body>
</html>


<?php 
    //Check Whether the submit button is clicked or not
    if (isset($_POST['submit']))
    {//Process for Login
        //1. Get the data from Login form
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $raw_password=md5($_POST['password']);
        $password=mysqli_real_escape_string($conn,$raw_password);


        //2. SQL to check whether the user with username and password exists or not
        $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        

        //3. Execute SQL Query

        $res=mysqli_query($conn,$sql);


        //Count rows to check whether the user exists or not
        $count=mysqli_num_rows($res);

        if ($count==1)
        {//User Available and Login Success
            $_SESSION['login']="<div class='success'>Login Successfully</div>";
            $_SESSION['user']=$username; //To check whether the user is logged in or not and logout will unset it





            //Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'admin/');


        }
        else
        {
            //User not Available and Login Failed
            $_SESSION['login']="<div class='error text-center'>Login Failed. Username or password did not match. </div>";
            //Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');


        }




    }



?>