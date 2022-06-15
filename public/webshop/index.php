<?php 
    session_start();
    require_once('./inc/config.php');    


    $sql = "SELECT p.*,pdi.img from products p
                    INNER JOIN product_images pdi ON pdi.product_id = p.id
                    WHERE pdi.is_featured = 1";
    $handle = $db->prepare($sql);
    $handle->execute();
    $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);

    $pageTitle = 'Winkelshopje';
    include('layouts/header.php');
?>
   
      
    
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>Shop</title>
  
  </head>
  <body>
  <header>
  

  
      <a href="#" class="logo">Proteïne<span>.</span></a>
  
      <nav class="navbar">
          <a href="#home">home</a>
          <a href="#about">Over ons</a>
          <a href="#products">producten</a>
          <a href="#review">reviews</a>
          
      </nav>
  
      <div class="icoon">
          
          <a href="cart.php" class="fas fa-shopping-cart"></a>
          <a href="loginhome.html" class="fas fa-user"></a>
      </div>
  
  </header>

  <section class="home" id="home">
  
      <div class="content">
          <h3>Proteine</h3>
          <span> natuurlijke Proteine </span>
          <p></p>
          <a href="#products" class="btn">Bestel hier!</a>
      </div>
      
  </section>
  
  
  <section class="about" id="about">
  
      <h1 class="heading"> <span> Over </span> ons </h1>
  <h2><span> vertegenwoordigt sport supplementen die 100% zuiver zijn, daarmee bedoelen we zonder toegevoegde suikers en / of aspartaam​​. Aangezien wij alleen de beste ingrediënten in onze producten willen, testen we de ingrediënten zelf voordat ze daadwerkelijk toegevoegd worden aan het eindproduct.

Om de ultieme producten te ontwikkelen werken wij samen met diverse gerenommeerde farmaceutische bedrijven in Europa, waaronder een van de grootste in Nederland. Kortom, pure winst!</span></h2>
      <div class="row">
  
          <div class="video-container">
            <img src="images/" alt="">
              <h3>Beste suplementen van heel Nederland!</h3>
          </div>
  
         
              
          </div>
  
      </div>
  
  </section>
  
  <section class="icons-container">
  
      <div class="icons">
          <img src="images/de-kleine-bestelwagen-van-de-levering-89680720.jpg" alt="">
          <div class="info">
              <h3>Gratis levering</h3>
              <span>Gratis levering vanaf 10 euro</span>
          </div>
      </div>
  
      <div class="icons">
          <img src="images/depositphotos_2705367-stock-photo-percent.jpg" alt="">
          <div class="info">
              <h3>Stuur terug garantie</h3>
              <span>Geld terug garantie</span>
          </div>
      </div>
  
      <div class="icons">
          <img src="images/bigstock--223563178+copy.jpg" alt="">
          <div class="info">
              <h3>Goeie kwaliteit garantie</h3>
              <span>Gemaakt volgens de regels van de wet</span>
          </div>
      </div>
  
      <div class="icons">
          <img src="images/Online-betaalmethoden.jpg" alt="">
          <div class="info">
              <h3>veilige betaalmethoden</h3>
              <span>beschermd bij eu voorwaarden</span>
          </div>
      </div>
     
  </section>
  
  
  <section class="products" id="products">
  
        
      <h1 class="heading"> Onze <span>producten</span> </h1>
        <?php
        foreach($getAllProducts as $product)
        {
            $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($product['product_name']))."/".$product['img'];
        ?>
        <div class="box-container">
  
  <div class="box">
      
      <div class="image">
      <img class="card-img-top" src="<?php echo $imgUrl ?>" alt="<?php echo $product['product_name'] ?>">
          <div class="icons">
              
          <a class="fas fa-share" href="single-product.php?product=<?php echo $product['id']?>">Bekijk</a>
          </div>
      </div>
      <div class="content">
      <h5 class="card-title">
      <?php echo $product['product_name']; ?>
          <div class="price">  <h5 class="card-title">

                        </h5><strong>$ <?php echo $product['price']?></strong> </div>
      </div>
  </div>
        
                </div>
        </div>
        <?php 
        }
        ?>
    
  
  </section>
  
  
  <section class="review" id="review">
  
  <h1 class="heading"> klanten <span>review</span> </h1>
  
  <div class="box-container">
  
      <div class="box">
          <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <p></p>
          <div class="user">
              <img src="images/johnny-deep.jpg" alt="">
              <div class="user-info">
                  <h3>Johny depp</h3>
                  <span>tevreden</span>
              </div>
          </div>
          <span class="fas fa-quote-right"></span>
      </div>
  
      <div class="box">
          <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <p></p>
          <div class="user">
              <img src="images/Aktris-Amber-Heard (1).jpg" alt="">
              <div class="user-info">
                  <h3>Amber Heard</h3>
                  <span>tevreden</span>
              </div>
          </div>
          <span class="fas fa-quote-right"></span>
      </div>
  
      <div class="box">
          <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <p></p>
          <div class="user">
              <img src="images/joel.png" alt="">
              <div class="user-info">
                  <h3>joel beuker</h3>
                  <span>Tevreden</span>
              </div>
          </div>
          <span class="fas fa-quote-right"></span>
      </div>
  
  </div>
      
  </section>
  
  <section class="footer">
  
      <div class="box-container">
  
          <div class="box">
              <h3>Snelle links</h3>
              <a href="#">home</a>
              <a href="#">Over ons</a>
              <a href="#">producten</a>
              <a href="#">reviews</a>
          </div>
  
          <div class="box">
              <h3>contact info</h3>
              <a href="#"></a>
              <a href="#">Quinten@gmail.com</a>
              <a href="#"></a>
              <img src="images/payment.png" alt="">
          </div>
  
      </div>
  
      
  
  </section>
  

<?php include('layouts/footer.php');?>