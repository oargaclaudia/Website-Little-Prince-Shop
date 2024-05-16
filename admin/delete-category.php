<?php 
include('../config/constants.php');
   // echo "Delete Page";
  //Check whether the id and image_name value is set or not
  if (isset($_GET['id']) AND isset($_GET['image_name']))
  {//Get the value and Delete
    //echo "Get value and Delete";
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    //Remove the physical image file is available
    if ($image_name != "")
    {
        //Image is available. So remove it.
        $path="../images/category/".$image_name;
        //Remove the image 
        $remove=unlink($path);
        //If failed to remove image then add an error message and stop process
        if ($remove==false)
        {
            //Set the Session Message
            $_SESSION['remove']="<div class='error'>Failed to Remove Category Image</div>";
            //Redirect to Manage Category Page
            header('location:'.SITEURL.'admin/manage-category.php');
            //Stop the process
            die();
        }


    }


    //Delete Data from Database
    //SQL Query to Delete Data from DATABASE
    $sql="DELETE FROM tbl_category WHERE id=$id";


    //Execute the Query
    $res=mysqli_query($conn,$sql);

    //Check whether the data is deleted from Database or not
    if ($res==TRUE)
    {
        //Set Succes Message and Redirect
        $_SESSION['delete']="<div class='success'>Category Deleted Successfully.</div>";
        //Redirect to Manage Category
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else
    {
        //Set Error Message and Redirect
        $_SESSION['delete']="<div class='error'>Failed to Delete Category.</div>";
        //Redirect to Manage Category
        header('location:'.SITEURL.'admin/manage-category.php');
    }


    



  }
  else
  {
    //Redirect to Manage Category Page
    header('location:'.SITEURL.'admin/manage-category.php');
  } 

?>