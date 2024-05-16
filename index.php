    <?php include('partials-front/menu.php');?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Product.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php
    if (isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center"><u>Explore Our Shop</u></h2>
            <?php 
                //Create SQL Query to Display Categories From Database
                $sql="SELECT * FROM tbl_category WHERE active='Yes' and featured='Yes' LIMIT 3";

                //Execute the Query
                $res=mysqli_query($conn,$sql);

                //Count the rows to check whether the category is available or not
                $count=mysqli_num_rows($res);

                if ($count>0)
                {//Categories Available
                    while ($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id,title, image_name
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
                            <div class="box-3 float-container">
                                <?php 
                                //Check whether image is available or not
                                    if ($image_name=="")
                                    {
                                        //Display Message
                                        echo "<div class='error'>Image Not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Name is Available
                                        ?>
                                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Toys and games" class="img-responsive img-curve">
                                        <?php
                                    }       
                                ?>
                            <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>
                        </a>
                        <?php
                    }

                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category Not Added.</div>";
                }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Products Little Prince</h2>
            <?php 
                //Getting Products From Database that are active and featured
                //Create SQL Query
                $sql2="SELECT * FROM tbl_objects WHERE active='Yes' and featured='Yes' LIMIT 9";

                //Execute the Query
                $res2=mysqli_query($conn,$sql2);

                //Count the rows
                $count2=mysqli_num_rows($res2);

                //Check whether products are available or not
                if ($count2>0)
                {
                    //Products are available
                    while ($row=mysqli_fetch_assoc($res2))
                    { //Get all the values
                        $id=$row['id'];
                        $title=$row['title'];
                        $price=$row['price'];
                        $description=$row['description'];
                        $image_name=$row['image_name'];
                        ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                //Check whether image is available or not
                                if ($image_name=="")
                                {
                                    //Image Not Available
                                     echo "<div class='error'>Image Not Available.</div>";   
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/products/<?php echo $image_name;?>"alt="Ceramic Products Little Prince" class="img-responsive img-curve">
                                    <?php
                                }                   
                            ?>                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price"><?php echo $price;?></p>
                            <p class="food-detail">
                            <?php
                                echo $description;
                            ?>
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
                    //Not available
                    echo "<div class='error'>Products Are Not Available.</div>";
                }
            ?>
            <div class="clearfix"></div>
        </div>
        <p class="text-center">
            <a href="http://localhost/little-prince-shop/foods.php">See All Products</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php');?>