<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Products</h1>
        <br>
        <br>
        <?php 
            if (isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the product">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description"  cols="30" rows="5" placeholder="Description of the product"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" >
                            <?php 
                                //Create PHP Code to Display Categories from Database
                                //Create SQL Query to get all active categories from database
                                $sql="SELECT * FROM tbl_category WHERE active='Yes'";

                                $res=mysqli_query($conn,$sql); //execute query

                                //Count rows to check whether we have categories or not
                                $count=mysqli_num_rows($res);

                                if ($count>0)
                                {//We have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of category
                                        $id=$row['id'];
                                        $title=$row['title'];
                                         ?>

                                         <option value="<?php echo $id; ?>"><?php echo $title;?></option>

                                         <?php
                                    }
                                }
                                else
                                {//We do not have categories
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php 
                                }

                                //Display on Dropdown



                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No

                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Product" class="btn-secondary">
                    </td>
                </tr>


            </table>


        </form>
        
        

        <?php
            //We will check whether the button is clicked or not
            if (isset($_POST['submit']))
            {
                //Add the Products in Database
                //echo "Clicked";

                //1. Get the data from form
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $category=$_POST['category'];
                //Check whether radio button for featured and active are checked or not
                if (isset($_POST['featured']))
                {
                    $featured=$_POST['featured'];
                }                    
                else
                {
                    $featured="No"; //default value for featured
                }
                if (isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else
                {
                    $active="No"; //default value
                }

                //2. Upload the image if it is selected
                //Check whether the select image is clicked or not and upload the image only if the image is selected
                if (isset($_FILES['image']['name']))
                {
                    //Get the details of the selected image
                    $image_name=$_FILES['image']['name'];

                    //Check whether the image is selected or not and upload image only if selected
                    if ($image_name!="")
                    {
                        //Image is selected
                        //Rename the image
                        //Get the extension of selected image
                         $ext=end(explode('.',$image_name));

                         //Create new name for our image
                         $image_name="Product-Name-".rand(0000,9999).".".$ext;

                        //Upload the image
                        //Get the source path and destination path
                        // Source path is the current location of the image
                        $src=$_FILES['image']['tmp_name'];

                        //Destination path for the image to be uploaded
                        $dst="../images/products/".$image_name;

                        //Finally, upload the product image
                        $upload=move_uploaded_file($src,$dst); 

                        //Check whether image is uploaded or not
                        if ($upload==false)
                        {
                            //Failed to Upload the Image
                            //Redirect to Add Products Page with error message
                            $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-products.php');
                            //Stop the process
                            die();

                        }
                    }

                }
                else
                {$image_name=""; //Setting default value as blank

                }

                //3. Insert into database

                //Create a SQL Query to save or Add products
                $sql2="INSERT INTO tbl_objects SET
                    title='$title',
                    description='$description',
                    price=$price,
                    image_name='$image_name',
                    category_id=$category,
                    featured='$featured',
                    active='$active'
                ";

                //Execute the Query
                $res2=mysqli_query($conn,$sql2);
                //Check whether data inserted or not
                //4. Redirect with message to Manage Products Page
                if ($res2==true)
                {
                    //Data inserted successfully
                    $_SESSION['add']="<div class='success'>Product Added Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-products.php');
                }
                else
                {
                    //Failed to insert data
                    $_SESSION['add']="<div class='error'>Failed to Add Product.</div>";
                    header('location:'.SITEURL.'admin/manage-products.php');
                }

                
            }
        ?>

    </div>





</div>





<?php
include('partials/footer.php');
?>