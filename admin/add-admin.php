<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Add Admin</h1>
    <br > <br >


    <?php 
     if(isset($_SESSION['add'])){ //Checking whether the Session is set or not

        echo $_SESSION['add'];  //Displaying Session Message if set
        unset($_SESSION['add']); //Removing Session Message if in not set

    }
    
    ?>


<form action="" method="POST">


<table class="tbl-30">
    <tr>
        <td>Full Name: </td>
        <td><input type="text" name="full_name" placeholder="Enter Your Name"> </td>
    </tr>

    <tr>
        <td>Username: </td>
        <td><input type="text" name="username" placeholder="Enter Your Username"> </td>
    </tr>

    <tr>
        <td>Password: </td>
        <td><input type="password" name="password" placeholder="Enter Your Password"> </td>
    </tr>


    <tr>

    <td colspan="2">
        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
    </td>

    </tr>
</table>

</form>
    </div>
</div>
<?php include('partials/footer.php'); ?>
<?php 


//Process the value from form and save it in database

//Check whether the submit button is clicked or not

if(isset($_POST['submit']))
{
    //Button clicked
    //echo "Button Clicked";

    //1. Get the data from our form
    $full_name = $_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']); //Password Encryption with MD5

    //2. SQL Query to save the data into database
    $sql= "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";
    
    //3. Executing Query and Saving Data into Database
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    //4. Check whether the (Query is executed) data is inserted or not and display appropriate message
    if ($res==TRUE)
    {
        //Data inserted 
        //echo "Data inserted";
        //Create a session variable to display message
        $_SESSION['add']="<div class='success'>Admin Added Successfully</div>";
        //Redirect Page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');



    }
    else {

        //Failed to insert data
        //echo "Failed to insert";
        //Create a session variable to display message
        $_SESSION['add']="Failed to Add Admin";
        //Redirect Page to Add Admin
        header("location:".SITEURL.'admin/add-admin.php');
    }
}

?>