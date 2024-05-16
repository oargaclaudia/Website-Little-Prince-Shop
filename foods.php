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



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Products Little Prince Collection</h2>
            <?php
                //Display Products that are Active
                //Create SQL Query
                $sql="SELECT * FROM tbl_objects WHERE active='Yes'";
                //Execute the Query
                $res=mysqli_query($conn,$sql);
                //Count rows to check whether products are available or not
                $count=mysqli_num_rows($res);
                //Check whether the products are available or not
                if ($count>0)
                {
                    //Products Available
                    while ($row=mysqli_fetch_assoc($res))
                    {
                        //Get the values 
                        $id=$row['id'];
                        $title=$row['title'];
                        $description=$row['description'];
                        $price=$row['price'];
                        $image_name=$row['image_name'];
                        ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                //Check whether image available or not
                                if ($image_name=="")
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
                { //Products Are not Available
                    echo "<div class='error'>Products Not Available</div>";
                }

            ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php');?>