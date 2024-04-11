<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart JS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
    <?php include 'includes/getstock.inc.php';
    session_start(); ?>
    <div class="app-container">
        <div class="app-bg">
            <div class="left-side"></div>
            <div class="right-side"> <div class="cart">
            <div class="cart-header">
                <div class="column1">Item</div>
                <div class="column2">Unit price</div>
                <div class="column3">Units</div>
            </div>
            <div class="cart-items">
                <!-- render cart items here -->
            </div>
            <div class="cart-footer">
                <div class="subtotal">
                    Subtotal (0 items): $0
                </div>
                <div class="checkout">
                    Proceed to checkout
                </div>
            </div>
        </div></div>
        </div>
        <header>
            <nav>
                <ul>
                    <li class="btn btn2 home">
                        <a href="./">
                            <img src="./icons/home.png" alt=""> Home
                        </a>
                    </li>
                    <li class="btn btn2">
                        <a href="#">
                            <img src="./icons/filter.png" alt="filter">
                        </a>
                    </li>
                    <li class="btn2" onclick="changeClass(this)">
                        <a href="#">
                            Boxes
                        </a>
                    </li>
                    <li class="btn2 active"onclick="changeClass(this)">
                        <a href="#">
                            Flowers
                        </a>
                    </li>
                    <li class="btn2" onclick="changeClass(this)">
                        <a href="#">
                            More
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="shopping-bag">
                <a href="./cart.html">
                    <img src="./icons/bag.png" alt="cart">
                    Cart
                    <div class="total-items-in-cart">
                        0
                    </div>
                </a>
            </div>
        </header>
        <main>
            <div class="content">
                <div class="products-preview">
                    <div class="products-container">
                        <div class="product">
                            <img src="./img/f5.png" alt="Flower 1">
                        </div>
                        <div class="product">
                            <img src="./img/f3.png" alt="Flower 2">
                        </div>
                        <div class="product">
                            <img src="./img/f4.png" alt="Flower 3">
                        </div>
                    </div>
                    <div class="more-details">
                        <div class="see-more-btn">
                                <img src="./icons/right-arrow.png" alt="">
                                Details
                        </div>
                        <div class="description">
                            <small>New Season</small>
                            <h1>Summer Flowers</h1>
                        </div>
                    </div>
                </div>
                <div class="model">
                    <img class="model-img" src="./img/flower.png" alt="model">
                    <!--<div class="product" id="x">
                         <img src="./img/flower2.png" alt="Flower 4"> 
                    </div>-->
                </div>
            </div>
        </main>
    </div>
    <div class="products-list">
        <div class="products">
            <!-- render porducts here -->
        </div>
    </div>

    <script>
        const porductsListEl = document.querySelector(".products-list");
        const seeMoreBtn = document.querySelector(".see-more-btn");

        seeMoreBtn.addEventListener('click', () => {
            porductsListEl.scrollIntoView({behavior: "smooth"})
        })
    </script>
    <script>
        // Output PHP variable into JavaScript variable
        var phpVar1 = "<?php echo $res[0]["qte"]; ?>";
        var phpVar2 = "<?php echo $res[1]["qte"]; ?>";
        var phpVar3 = "<?php echo $res[2]["qte"]; ?>";
        var phpVar4 = "<?php echo $res[3]["qte"]; ?>";
        var phpVar5 = "<?php echo $res[4]["qte"]; ?>";
        var phpVar6 = "<?php echo $res[5]["qte"]; ?>";
    </script>
    <script src="./products.js"></script>
    <script src="./app.js"></script>
    <script>
        function changeClass(liElement) {
          // Remove 'active' class from all li elements
          var liElements = document.querySelectorAll('li');
          liElements.forEach(function(li) {
            li.classList.remove('active');
          });
        
          // Add 'active' class to the clicked li element
          liElement.classList.add('active');
        }
        </script>
        
</body>
</html>