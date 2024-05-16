<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Our Shop</title>
    <link rel="stylesheet" href="css/all-shop.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
        <!-- Adaugă aici și celelalte opțiuni pentru alte produse -->
</head>
<div class="overlay" onclick="expandImg()">
    <img id="expandedImg" src="" alt="Mărimea mărită a imaginii">
</div>
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

    <div class="container">
        <header style="background: linear-gradient(to bottom, #3498db, #2ecc71);">
            <h1>Your Shopping Cart</h1>
            <div class="shopping">
                <img src="images/shopping.svg">
                <span class="quantity">0</span>
            </div>
        </header>
        <div class="buttonContainer">
            <select id="products" class="styledSelect">
                <option value="">All Products</option>
                <option value="camasa">CAMASA PICTATA MANUAL</option>
                <option value="stilou">STILOU</option>
                <option value="ceas">CEAS PERETE</option>
                <option value="figurina">FIGURINA LE PETIT PRINCE</option>
                <option value="termos">TERMOS</option>
                <option value="magneti">SET MAGNETI</option>
                <option value="tricou">TRICOU</option>
                <option value="pin">SET PINURI LE PETIT PRINCE</option>
                <option value="geanta">GEANTA</option>
                <option value="penar">PENAR</option>
                <option value="lego">LEGO</option>
                <option value="cutie">CUTIE DECORATIVA</option>
                <option id="15">SET BIROU LE PETIT PRINCE</option>
                <option value="bol">BOL LE PETIT PRINCE</option>
                <option value="set_ceramica">SET CERAMICA LE PETIT PRINCE</option>
                <option id="18">SET POSTCARDS LE PETIT PRINCE</option>
                <option value="agenda">AGENDA LE PETIT PRINCE</option>
                <option value="esarfa">ESARFA LE PETIT PRINCE</option>
                <option value="sampon">SAMPON ORGANIC LE PETIT PRINCE</option>
                <option value="medalion">MEDALION LE PETIT PRINCE</option>
                <option id="23">CUTIE MUZICALA LE PETIT PRINCE</option>
                <option id="24">STATUETA LE PETIT PRINCE</option>
                </select>
                <button id="searchButton" class="#searchButton" class="styledButton">Search</button>
                <button id="resetButton" class="#searchButton"class="styledSelect">Reset</button>
        </div>
        <div class="list product-image">
    </div>
    </div>
    <div class="card">
        <h1>Card</h1>
        <ul class="listCard">
        </ul>
        <div class="checkOut">
            <div class="total">0</div>
            <div class="closeShopping">Close</div>
        </div>
    </div>
    <div class="overlay" onclick="closeExpandedImg()">
        <!-- Overlay pentru imaginea mărită -->
        <img id="expandedImg" src="" alt="Mărimea mărită a imaginii">
    </div>
   

    
    <script src="app.js"></script>
</body>
</html>