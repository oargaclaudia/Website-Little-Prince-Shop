<?php include('partials-front/menu.php');?>

<?php 
    //Check whether id is passed or not
    if (isset($_GET['category_id']))
    {//Category id is set and get the id
        $category_id=$_GET['category_id'];
        //Get the Category Title Based on Category Id
        $sql="SELECT title FROM tbl_category WHERE id=$category_id";

        //Execute The Query
        $res=mysqli_query($conn,$sql);
        //Get the Value From Database
        $row=mysqli_fetch_assoc($res);
        //Get the Title
        $category_title=$row['title'];

        

    }
    else
    {
        //Category not passed
        //Redirect to Home Page
        header('location:'.SITEURL);
    }
?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Products on <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Products Menu</h2>
            <?php 
                //Create SQL Query To Get Products Based on Selected Category
                $sql2="SELECT * FROM tbl_objects WHERE category_id=$category_id";

                //Execute the Query
                $res2=mysqli_query($conn,$sql2);

                //Count the rows
                $count=mysqli_num_rows($res2);

                //Check whether product is available or not
                if ($count>0)
                {
                    //Product is available
                    while ($row2=mysqli_fetch_assoc($res2))
                    {   $id=$row2['id'];
                        $title=$row2['title'];
                        $price=$row2['price'];
                        $description=$row2['description'];
                        $image_name=$row2['image_name'];
                        ?>
                       <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if($image_name=="")
                                    {
                                        //Image Not Available
                                        echo "<div class='error'>Image Not Available.</div>";

                                    } 
                                    else
                                    {
                                        //Image Available
                                        ?>
                                    <img src="<?php echo SITEURL;?>images/products/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="food-price"><?php echo $price;?></p>
                                <p class="food-detail">
                                    <?php echo $description;?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div> 
                        <?php

                    }

                }
                else
                {
                    //Product Not Available
                    echo "<div class='error'>Product Not Available.</div>";
                }

            ?>
           
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>