<?php 
    include('../config/constants.php');
    //echo "Delete Product Page";
    //Check whether the value is passed or not
    if (isset($_GET['id']) && isset($_GET['image_name']))
    {   //Process to Delete
        //echo "Process to Delete";

        //Get id and image name 
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        //Remove the image if available
        //Check whether the image is available or not and delete only if available
        if ($image_name!="")
        {
            //It has image and need to remove from folder
            //Get the image path
            $path="../images/products/".$image_name;

            //Remove image file from folder
            $remove=unlink($path);

            //Check whether the image is removed or not
            if ($remove==false)
            {
                //Failed to remove image
                $_SESSION['upload']="<div class='error'>Failed to Remove Image File.</div>";
                //Redirect to Manage Products
                header('location:'.SITEURL.'admin/manage-products.php');
                //Stop the Process of Deleting Products
                die();

            }
        }

        //Delete product from database

        $sql="DELETE FROM tbl_objects WHERE id=$id";
        //Execute the query
        $res=mysqli_query($conn,$sql);

        //Check whether the query is executed or not and set the session message respectively
        //Redirect to Manage Products with session message
        if ($res==true)
        {
            //Product Deleted
            $_SESSION['delete']="<div class='success'>Product Deleted Successfully. </div>";
            header('location:'.SITEURL.'admin/manage-products.php');
        }
        else
        {
            //Failed to Delete Product
            $_SESSION['delete']="<div class='error'>Failed to Delete Product. </div>";
            header('location:'.SITEURL.'admin/manage-products.php');
        }
        
    }
    else
    {   //Redirect to Manage Product Page
        //echo "Redirect";
        $_SESSION['unauthorize'] ="<div class='error'>Unauthorised Access </div>";
        header('location:'.SITEURL.'admin/manage-products.php');
    }


?>