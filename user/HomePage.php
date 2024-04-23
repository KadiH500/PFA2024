<?php 
   session_start();
   include "connexion.php";
   echo ($_SESSION['id']);
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./HomePage.css" />
  <link rel="shortcut icon" type="x-icon" href="../imgs/logo Icon.png">
  <title>Jasminet</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
 <script src="https://kit.fontawesome.com/c8fce84889.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php include './includes/getstock.inc.php'; ?>
  <nav class="navbar">
    <div class="container">
      <div>
        <img class="logo" src="../imgs/navbarlogo.jpeg" alt="">
      </div>
      <div class="container-nav">
        <ul class="menu">
          <li onclick="smoothScroll('#home')"> <a href="##">Acceuil</a></li>
          <li onclick="smoothScroll('#anniversaire')"> <a href="##">Anniversaire</a></li>
          <li onclick="smoothScroll('#valentine')"> <a href="##">Saint valentin</a></li>
          <li onclick="smoothScroll('#mariage')"> <a href="##">Mariage</a></li>
          <li onclick="smoothScroll('#dryflowers')"> <a href="##">Fleurs séchées</a></li>
          <li onclick="smoothScroll('#decoration')"> <a href="##">Décoration</a></li>

        </ul>
        <div class="box">
          <input type="text" placeholder="Recherche...">
          <a href="#">
 <i class="fas fa-search"></i>
          </a>
        </div>
  
        </div>
        
      </div>
    </div>
    <div class="shopping-bag">
    <a href="..\profile\profile.html"><img class="user-pic" src="../imgs/profil.png" alt=""></a>
    
                <a onclick="poof()">
                    <img src="../imgs/panier.png" alt="cart">
                    Cart
                    <div class="total-items-in-cart"></div>
                </a>
      </div>
  </nav>
  <div id="panier" class="panier">
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
                  <a id="openPopup" >Proceed to checkout</a>
                </div>
        </div>
    </div>
<div class="main">
  <section>
    <div class="container-introduction">
      <img class="picture-intro" src="../imgs/footerpic.PNG" alt="">
    </div>
    
  </section>
  <section id="anniversaire">
  <p  class="wedding-collection">Des fleurs pour chaque occasion, des sourires pour chaque moment !
  </p> 
  <div class="products-list">
        <div class="products3 products ">
            <!-- render prods -->
        </div>
    </div>

<div class="container-card">
</section>
    <div class="pic-style">
      <figure>
        <img class="picture" class="user-p" src="../imgs/1st.avif" alt="">
        <h1 class="title">Satisfait, ou relivré</h1>
        <figcaption class="figcaption"> La plante ou le bouquet reçu n'est pas conforme à votre commande ?
          <br>Nous re-livrons gratuitement et avec toutes nos excuses !
        </figcaption>
      </figure>
      <figure>
        <img class="picture" class="user-p" src="../imgs/2nd.avif" alt="">

        <h1 class="title">Création par un artisan fleuriste.</h1>
        <figcaption class="figcaption"> Un service de qualité,
          <br>un réseau d'artisans fleuristes d'exception garantissant une livraison de proximité.
        </figcaption>
      </figure>
      <figure>
        <img class="picture" class="user-p" src="../imgs/3rd.avif" alt=".">

        <h1 class="title">Partout, tout le temps</h1>
        <figcaption class="figcaption"> Parce qu’une envie de fleurs n’attend pas,
          <br>nos artisans fleuristes confectionnent et livrent avec le plus grand soin
          <br> vos bouquets 7 jours sur 7, en moins de 4h.
        </figcaption>
      </figure>
    </div>
    <section id="valentine" >
      <p class="wedding-collection">
        Arrosez votre amour et regardez-le éclore avec noc plantes
      </p>
    </section>
      <div class="products-list">
        <div class="products1 products ">
            <!-- render prods -->
        </div>
    </div>
    <div id="mariage">
      <p class="wedding-collection">
      Des fleurs pour célébrer un mariage, rien de plus radieux.
      </p>
      <div class="products-list">
        <div class="products2 products">
            <!-- render prods -->
        </div>
    </div>
    <div class="jumbotron">
     <img  class="jumbotron-img" src="../imgs/BlockBrand.avif">
      <div class="content-jumbotron">
        <h1 class="display-4">-5% sur votre premiére commande !</h1>
        <p class="lead">
          Parce que le meilleur moment pour s'envoyer des fleurs, c'est toute l'année</p>
        <hr class="my-4">
        <p class="lead">
          <button  class="boutton"><a class="text-decoration" href="../login signup/losi.html">En savoir plus</a></button >
        </p>
      </div>
    </div>
    </div>
    <div id="dryflowers">
      <p class="wedding-collection">Fleurs séchées, le charme qui perdure</p></div>
    <div class="products-list">
        <div class="products4 products ">
            <!-- render prods -->
        </div>
    </div>

    <div class="pic-style">
      <figure>
        <img class="picture" class="user-p" src="../imgs/p1.avif" alt="">
        <h1 class="title">Plantes choisies avec soin</h1>
        <figcaption class="figcaption"> pour leur qualité et leur fraîcheur, auprès de producteurs labellisés en Tunisie.
        </figcaption>
      </figure>
      <figure>
        <img class="picture" class="user-p" src="../imgs/p2.avif" alt="">

        <h1 class="title">Une collection de cache-pots
          </h1>
        <figcaption class="figcaption">pour relooker votre intérieur et mettre en valeur vos nouvelles meilleures amies.
        </figcaption>
      </figure>
      <figure>
        <img class="picture" class="user-p" src="../imgs/p3.avif" alt=".">

        <h1 class="title">Des plantes bien protégées
          </h1>
        <figcaption class="figcaption"> et expédiées en 24h pour un transport en toute sécurité.
        </figcaption>
      </figure>
    </div>
    <div id="plantes"></div>
    <div class="container-card">
      
 </div>
 <div id="decoration">
  <p class="wedding-collection">Empruntez des idées captivantes pour votre décoration</p>
 </div>
 <div class="container-card">
  <video src="../vid/WhatsApp Video 2024-04-12 at 12.18.29 PM.mp4" controls></video>
  <video src="../vid/WhatsApp Video 2024-04-12 at 12.18.30 PM (1).mp4" controls></video>
  <video src="../vid/WhatsApp Video 2024-04-12 at 12.18.30 PM.mp4" controls></video>
  <video src="../vid/WhatsApp Video 2024-04-12 at 12.18.31 PM (1).mp4" controls></video>
  <video src="../vid/WhatsApp Video 2024-04-12 at 12.18.31 PM.mp4" controls></video>
  <video src="../vid/WhatsApp Video 2024-04-12 at 12.18.32 PM (1).mp4" controls></video>
</div>
 <footer>
  <div class="footer-content">
<p> À propos <br>Chez Jasminet, nous sommes bien plus qu'une simple boutique de fleurs en ligne. 
  Nous sommes des passionnés de la nature et des artisans dévoués à créer des expériences florales 
  exceptionnelles pour nos clients. Avec notre engagement indéfectible envers la qualité, 
  nous sélectionnons soigneusement chaque fleur pour assurer une fraîcheur et une beauté incomparables.
   Forts de notre expertise dans l'industrie florale et de notre créativité sans limites,
    nous concevons des arrangements floraux uniques qui captivent et émerveillent. Nous 
    croyons en la responsabilité environnementale et nous nous efforçons de promouvoir
     des pratiques durables dans tout ce que nous faisons. Nous sommes fiers de servir
      notre communauté et de contribuer à rendre chaque occasion spéciale encore plus mémorable. 
      Chez Jasminet, nous trouvons l'inspiration dans la nature et nous sommes honorés de partager cette inspiration avec vous à travers nos magnifiques créations florales
</p> 
</div> 
<div class="footer-content"> 
<p>Contact</p>  
<a href="#">
<span class="material-symbols-outlined">
  add_call
  </span></a>
  <a href="https://accounts.google.com/AccountChooser/signinchooser?service=mail&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&flowName=GlifWebSignIn&flowEntry=AccountChooser&ec=asw-gmail-globalnav-signin&theme=mn&ddm=0">
  <span class="material-symbols-outlined">
    alternate_email
    </span></a>
</div>
<div class="footer-content">
  <p> Rejoignez-nous</p>
    <ul class="social-icons">
      <li><a href="#" title="Facebook" ><i class="fab fa-facebook-f"></i></a>
      <li><a href="#" title="Twitter" class="twitter"><i class="fab fa-twitter"></i></a>
      <li><a href="#" title="Instagram" class="instagram"><i class="fab fa-instagram"></i></a>
      <li><a href="#" title="Linkedin" class="linkedin"><i class="fab fa-linkedin"></i></a>
      <li><a href="#" title="TikTok" class="tiktok"><i class="fab fa-tiktok"></i></a>
      <li><a href="#" title="YouTube" class="youtube"><i class="fab fa-youtube"></i></a>

    </ul>
  </div>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="./index.js" defer></script>

</footer>
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
    <!-- 
      failed attempt

      <div id="product-list"></div>
    -->
    </script>

    <!-- PopUp-->
    <div id="popup" class="popup">
    <div class="popup-content">
      <h2>Order Information</h2>
      <p id="orderid">Order ID: 13</p>
      <p id="items">Item: Awesome Product</p>
      <button id="confirmOrder" class="submitButton">Confirm</button>
      <button id="cancelOrder">Cancel</button>
    </div>
  </div>
  <!-- hidden form-->
  <form id="hiddenForm" action="./includes/commande.php" method="POST" style="display: none;">
    <input type="hidden" id="hiddenField1" name="orderid">
    <input type="hidden" id="hiddenField2" name="clientid">
    <input type="hidden" id="hiddenField3" name="date">
    <input type="hidden" id="hiddenField4" name="flowers">
</form>
<script>
  var userId = <?php echo json_encode($_SESSION['id']); ?>;
</script>
</body>
</html>
<?php }else{
	header("Location: ../login signup/losi.php");
} ?>