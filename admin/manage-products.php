<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
<h1>Manage Products</h1>
<br />
    <br />
    <br />
    <!-- Button to Add Admin-->
    <a href="<?php echo SITEURL;?>admin/add-products.php" class="btn-primary"> Add Products</a>
    <br />
    <br />
    <br />
    <?php 
        if (isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if (isset($_SESSION['unauthorize']))
        {
            echo $_SESSION['unauthorize'];
            unset($_SESSION['unauthorize']);
        }
        if (isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
    
    
    ?>
    <table class="tbl-full">
        <tr>
            <th>S.N.</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        <?php
            //Create a SQL Query to get all the products
            $sql="SELECT * FROM tbl_objects";
            //Execute the query
            $res=mysqli_query($conn,$sql);

            //Count rows to check whether we have products or not
            $count=mysqli_num_rows($res);
            //Create number variable and set default value as one
            $sn=1;
            if ($count>0)
            {
                //We have products in Database
                //Get the products from Database and Display
                while ($row=mysqli_fetch_assoc($res))
                {
                    //get the value from individual columns
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $image_name=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];
                    ?>
                 <tr>
                    <td><?php echo $sn++;?> </td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $price; ?></td>
                    <td>
                        <?php
                            //Check whether we have image or not
                            if ($image_name=="")
                            {
                                //We do not have image. Display error message
                                echo "<div class='error'>Image not Added.</div>";

                            }
                            else
                            {//When image name is not blank
                                //We have image
                                ?>

                                <img src="<?php echo SITEURL;?>images/products/<?php echo $image_name;?>" width="100px" >
                                <?php

                            }
                        ?>
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active;?></td>
                    <td>
                        <a href="<?php echo SITEURL;?>admin/update-product.php?id=<?php echo $id;?>" class="btn-secondary"> Update Product</a>
                        <a href="<?php echo SITEURL;?>admin/delete-product.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger"> Delete Product</a>
                    </td>

                </tr>

                    <?php
                }

            }
            else
            {
                //Products not added in Database
                echo "<tr><td colspan='7' class='error'> Product not Added Yet.</td> </tr>";
            }

        ?>
    </table>

</div>
</div>


<?php include('partials/footer.php');?>