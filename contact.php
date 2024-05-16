<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
    <link rel="stylesheet" href="css/contact.css">

</head>
<body>
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
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Products</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="about.php">About Little Prince</a>
                    </li>
                    <li>
                        <a href="all-shop.php">Limited Edition Here</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <section class="contact-container">
        <form  action="https://api.web3forms.com/submit" method="POST" class="contact-left">
            <div class="contact-left-title">
                <h2>Get in Touch</h2>
                <hr>
            </div>
            <input type="hidden" name="access_key" value="ad470577-cdb2-4dd8-ac29-ce2e929fed75">

            <input type="text" name="name" placeholder="Your Name:" class="contact-inputs" required>
            <input type="email" name="email" placeholder="Your Email:" class="contact-inputs" required>
            <textarea name="message" placeholder="Your Message:" class="contact-inputs" required></textarea>
            <button type="submit">
                Submit <img src="images/arrow_icon.png" alt="">
            </button>
        </form>
        <div class="contact-right">
            <img src="images/right_img.png" alt="">

        </div>


    </section>
</body>

</html>
<?php include('partials-front/footer.php');?>

