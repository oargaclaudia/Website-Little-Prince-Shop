<?php 
    //echo "Update Product Page";
    include ("partials/menu.php");
?>

<?php 
    //Check whether id is set or not
    if (isset($_GET['id']))
    { //Get all the details 
        $id=$_GET['id'];
        //Create SQL Query to Get the Selected Product
        $sql2="SELECT * FROM tbl_objects WHERE id=$id";

        //Execute the Query
        $res2=mysqli_query($conn,$sql2);

        //Get the value based on Query Executed
        $row2=mysqli_fetch_assoc($res2);
        //Get the Individual Values of Selected Products
        $title=$row2['title'];
        $description=$row2['description'];
        $price=$row2['price'];
        $current_image=$row2['image_name'];
        $current_category=$row2['category_id'];
        $featured=$row2['featured'];
        $active=$row2['active'];
    }
    else
    {
        //Redirect to Manage Products
        header('location:'.SITEURL.'admin/manage-products.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Product</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title"  value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description"  cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number"name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php 
                            if ($current_image=="")
                            {
                                //Image not Available
                                echo "<div class='error'>Image is Not Available. </div>";    
                            }
                            else
                            {
                                //Image Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/products/<?php echo $current_image;?>" width="100px">
                                <?php
                            }
                        
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" >

                        <?php 
                        //Query to get active categories
                            $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                            //Execute the Query
                            $res=mysqli_query($conn,$sql);
                            //Count rows
                            $count=mysqli_num_rows($res);
                            //Check whether category is available or not
                            if ($count>0)
                            {
                                //Category available
                                while ($row=mysqli_fetch_assoc($res))
                                {$category_title=$row['title'];
                                    $category_id=$row['id'];
                                    //echo "<option value='$category_id'>$category_title </option>";
                                    ?>
                                    <option <?php if($current_category==$category_id) {echo "selected";}?> value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                                    <?php    
                                }

                            }
                            else
                            {
                                //Category not available
                                echo "<option value='0'>Category not Available.</option>";
                            }
                        
                        ?>
                          
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes")  {echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured=="No")  {echo "checked";}?>  type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input  <?php if($active=="Yes")  {echo "checked";}?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No")  {echo "checked";}?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id;?>" >
                        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                        <input type="submit" name="submit" value="Update Product" class="btn-secondary">

                    </td>
                </tr>

            </table>




        </form>
       <?php 
            //Check whether the button is clicked or not
            if (isset($_POST['submit']))
            {
                //echo "Buton Clicked";
                //Get all the details from form
                $id=$_POST['id'];
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $current_image=$_POST['current_image'];
                $category=$_POST['category'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];
                //Upload the image if selected

                //Check whethet the Upload Button is clicked or not
                if (isset($_FILES['image']['name']))
                {
                    //Upload Button clicked
                    $image_name=$_FILES['image']['name']; //New Image name

                    //Check whether the file is available or not
                    if ($image_name!="")
                    {
                        //Image is available
                        //Uploading new image
                        //Rename the image
                        $ext=end(explode('.',$image_name)); //Get the Extension of the Image
                        $image_name="Product-Name-".rand(0000,9999).'.'.$ext; //This will be renamed image
                       
                        //Get the source path and destination path
                        $src_path=$_FILES['image']['tmp_name'];
                        $dst_path="../images/products/".$image_name;

                        //Upload the image
                        $upload=move_uploaded_file($src_path,$dst_path);

                        //Check whether the image is uploaded or not
                        if ($upload==false)
                        {
                            //Failed to Upload
                            $_SESSION['upload']="<div class='error'>Failed to Upload New Image.</div>";
                            //Redirect to Manage Products Page
                            header('location:'.SITEURL.'admin/manage-products.php');
                            //Stop the Process
                            die();
                        }
                        //Remove the image if new image is Uploaded and current image exists
                        //Remove current image if available
                        if ($current_image!="")
                        {
                            //Current image is available
                            //Remove the image
                            $remove_path="../images/products/".$current_image;

                            $remove=unlink($remove_path);

                            //Check whether the image is removed or not
                            if ($remove==false)
                            {
                                //Failed to remove current image
                                $_SESSION['remove-failed']="<div class='error'>Failed to Remove Current Image</div>";
                                //Redirect to Manage Products
                                header('location:'.SITEURL.'admin/manage-products.php');
                                die();
                            }
                        }


                    }
                    else
                    {
                        $image_name=$current_image; //Default Image When Image Is Not Selected
                    }
                }
                else
                {
                    //Our Image Name remains the same
                    $image_name=$current_image; //Default Image when button is not clicked
                }

                

                //Update the Product in Database
                $sql3="UPDATE tbl_objects SET
                    title='$title',
                    description='$description',
                    price=$price,
                    image_name='$image_name',
                    category_id='$category',
                    featured='$featured',
                    active='$active'
                WHERE id=$id
                
                
                
                ";

                //Execute the SQL Query
                $res3=mysqli_query($conn,$sql3);
                //Check whether the query is executed or not
                if ($res3==true)
                {
                    //Query Executed and Product Updated
                    $_SESSION['update']="<div class='success'>Product Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-products.php');
                }
                else
                {
                    //Failed to Upload Product
                    $_SESSION['update']="<div class='error'>Failed to Update Product.</div>";
                    header('location:'.SITEURL.'admin/manage-products.php');
                }

                
            }
       ?>


    </div>


</div>




<?php include("partials/footer.php");?>