<?php include('partials-front/menu.php');?>
<?php ob_start();//am daugat o ca sa nu mai apara acea eroare
    //Check whether food_id is set or not
    if (isset($_GET['food_id']))
    {
        //Get the food_id and details of the selected food
        $food_id=$_GET['food_id'];

        //Get the details of the selected product
        $sql="SELECT * FROM tbl_objects WHERE id=$food_id";

        //Execute the Query
        $res=mysqli_query($conn,$sql);

        //Count rows
        $count=mysqli_num_rows($res);

        //Check whether the data is available or not
        if ($count==1)
        {
            //We have data
            //Get the data from database
            $row=mysqli_fetch_assoc($res);
            $title=$row['title'];
            $price=$row['price'];
            $image_name=$row['image_name'];

        }
        else
        {
            //We do not have data
            //Redirect to Home Page
            header('location:'.SITEURL);
        }
    }
    else
    {
        //Redirect to Home Page
        header('location:'.SITEURL);
       
    }

?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Product</legend>

                    <div class="food-menu-img">
                        <?php
                        //Check whether the image is available or not
                        if ($image_name=="")
                        {
                            //Image Not Available
                            echo "<div class='error'>Image Not Available. </div>";
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
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="object" value="<?php echo $title;?>">
                        <p class="food-price"><?php echo $price;?></p>
                            <input type="hidden" name="price" value="<?php echo $price;?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                    </div>
                </fieldset>
                <style>
                .input-responsive {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                    }

                .valid-sign::after {
                    content: "✓";
                    color: #2ecc71;
                    margin-left: 5px;
                }

                .invalid-sign::after {
                    content: "✗";
                    color: #e74c3c;
                    margin-left: 5px;
                }
            </style>

                            
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Popescu Mihai" class="input-responsive" required required pattern="[A-Za-z\s]+" title="Please enter only letters and spaces">
                    <span class="valid-sign" id="full-name-validity"></span>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 0742xxxxxx" class="input-responsive" required required pattern="^0\d{3}\s?\d{3}\s?\d{3}$" title="Please enter a Valid Romanian Number">

                    <span class="valid-sign" id="contact-validity"></span>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. claudiaandreea24@yahoo.com" class="input-responsive" required required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please enter a valid email">
                    <span class="valid-sign" id="email-validity"></span>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    <span class="valid-sign" id="address-validity"></span>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
                </form>
                <script>
    const validateInput = (input, validitySpan) => {
        if (input.validity.valid) {
            validitySpan.classList.remove('invalid-sign');
            validitySpan.classList.add('valid-sign');
        } else {
            validitySpan.classList.remove('valid-sign');
            validitySpan.classList.add('invalid-sign');
        }
    };

    document.querySelectorAll('.input-responsive').forEach(input => {
        const validitySpan = document.getElementById(input.name + '-validity');
        input.addEventListener('input', () => {
            validateInput(input, validitySpan);
        });
    });
</script>
            
            <?php
                //Check whether submit button is clicked or not
                if (isset($_POST['submit']))
                {
                    //Get all the details from the form
                    $object=$_POST['object'];
                    $price=$_POST['price'];
                    $qty=$_POST['qty'];
                    $total=$price*$qty; //total=price*quantity
                    $order_date=date("Y-m-d h:i:sa"); //Our order date
                    $status="Ordered"; //Ordered, On Delivery, Delivered, Canceled
                    $customer_name=$_POST['full-name'];
                    $customer_contact=$_POST['contact'];
                    $customer_email=$_POST['email'];
                    $customer_address=$_POST['address'];
                    //Save the order in Database
                    //Create SQL to save the data
                    $sql2="INSERT INTO tbl_order SET
                        object='$object',
                        price=$price,
                        qty=$qty,
                        total=$total,
                        order_date='$order_date',
                        status='$status',
                        customer_name='$customer_name',
                        customer_contact='$customer_contact',
                        customer_email='$customer_email',
                        customer_address='$customer_address'           
                    ";
                    //echo $sql2; die();
                    //Execute the Query
                    $res2=mysqli_query($conn,$sql2);

                    //Check whether executed successfully or not
                    if ($res2==true)
                    {
                        //Query executed and order saved
                        $_SESSION['order']="<div class='success text-center'>Order Placed Successfully.</div>";
                        //Redirect to Home Page
                        header('location:'.SITEURL);
                    }
                    else
                    {
                            //Failed to save order
                            $_SESSION['order']="<div class='error text-center'>Failed to Place Order.</div>";
                            //Redirect to Home Page
                            header('location:'.SITEURL);

                    }
                }
            ?>
        </div>
            </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php include('partials-front/footer.php');?>