<?php include('config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little Prince Website</title>
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo" style="transform: scale(1.2);">
                <a href="#" title="Logo">
                    <img src="images/logolp.png" alt="Little Prince Shop Logo" class="img-responsive">
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL;?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>foods.php">Products</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>about.php">About Little Prince</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>all-shop.php">Limited Edition Here</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>about-me.php">About Owner</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
