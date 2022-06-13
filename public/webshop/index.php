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
          <a href="#about">about</a>
          <a href="#products">products</a>
          <a href="#review">review</a>
          
      </nav>
  
      <div class="icoon">
          
          <a href="#" class="fas fa-shopping-cart"></a>
          <a href="loginhome.html" class="fas fa-user"></a>
      </div>
  
  </header>

  <section class="home" id="home">
  
      <div class="content">
          <h3>Proteine</h3>
          <span> natuurlijke Proteine </span>
          <p></p>
          <a href="#" class="btn">shop now</a>
      </div>
      
  </section>
  
  <!-- home section ends -->
  
  <!-- about section starts  -->
  
  <section class="about" id="about">
  
      <h1 class="heading"> <span> about </span> us </h1>
  
      <div class="row">
  
          <div class="video-container">
            <img src="images/creatine.png" alt="">
              <h3>best flower sellers</h3>
          </div>
  
          <div class="content">
              <h3>why choose us?</h3>
              <p></p>
              <p></p>
              <a href="#" class="btn">learn more</a>
          </div>
  
      </div>
  
  </section>
  
  <!-- about section ends -->
  
  <!-- icons section starts  -->
  
  <section class="icons-container">
  
      <div class="icons">
          <img src="images/creatine.png" alt="">
          <div class="info">
              <h3>free delivery</h3>
              <span>on all orders</span>
          </div>
      </div>
  
      <div class="icons">
          <img src="images/creatine.png" alt="">
          <div class="info">
              <h3>10 days returns</h3>
              <span>moneyback guarantee</span>
          </div>
      </div>
  
      <div class="icons">
          <img src="images/creatine.png" alt="">
          <div class="info">
              <h3>offer & gifts</h3>
              <span>on all orders</span>
          </div>
      </div>
  
      <div class="icons">
          <img src="images/creatine.png" alt="">
          <div class="info">
              <h3>secure paymens</h3>
              <span>protected by paypal</span>
          </div>
      </div>
     
  </section>
  
  <!-- icons section ends -->
  
  <!-- prodcuts section starts  -->
  
  <section class="products" id="products">
  
        
      <h1 class="heading"> Onze <span>producten</span> </h1>
      <div class="row">
        <?php
        foreach($getAllProducts as $product)
        {
            $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($product['product_name']))."/".$product['img'];
        ?>
            <div class="col-md-3  mt-2">
                <div class="card">
                     <a href="single-product.php?product=<?php echo $product['id']?>">
                        <img class="card-img-top" src="<?php echo $imgUrl ?>" alt="<?php echo $product['product_name'] ?>">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="single-product.php?product=<?php echo $product['id'] ?>">
                                <?php echo $product['product_name']; ?>
                            </a>
                        </h5>
                        <strong>$ <?php echo $product['price']?></strong>

                        <p class="card-t">
                            <?php echo substr($product['short_description'],0,50) ?>'...
                        </p>
                        <p class="card-text">
                            <a href="single-product.php?product=<?php echo $product['id']?>" class="btn btn-primary btn-sm">
                                View
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>
      <!-- <div class="box-container">
  
          <div class="box">
              
              <div class="image">
                  <img src="images/creatine.png" alt="">
                  <div class="icons">
                      
                      <a href="#" class="cart-btn">add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
              </div>
              <div class="content">
                  <h3>flower pot</h3>
                  <div class="price"> $12.99 </div>
              </div>
          </div>
  
          <div class="box">
              
              <div class="image">
                  <img src="images/creatine.png" alt="">
                  <div class="icons">
                      
                      <a href="#" class="cart-btn">add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
              </div>
              <div class="content">
                  <h3>flower pot</h3>
                  <div class="price"> $12.99 </div>
              </div>
          </div>
  
          <div class="box">
              
              <div class="image">
                  <img src="images/creatine.png" alt="">
                  <div class="icons">
                     
                      <a href="#" class="cart-btn">add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
              </div>
              <div class="content">
                  <h3>flower pot</h3>
                  <div class="price"> $12.99 </div>
              </div>
          </div>
  
          <div class="box">
             
              <div class="image">
                  <img src="images/creatine.png" alt="">
                  <div class="icons">
                      
                      <a href="#" class="cart-btn">add to cart</a>
                      <a href="#" class="fas fa-share"></a>
                  </div>
              </div>
              <div class="content">
                  <h3>flower pot</h3>
                  <div class="price"> $12.99 </div>
              </div>
          </div>
  
      </div> -->
  
  </section>
  
  <!-- prodcuts section ends -->
  
  <!-- review section starts  -->
  
  <section class="review" id="review">
  
  <h1 class="heading"> customer's <span>review</span> </h1>
  
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
              <img src="images/pic-1.png" alt="">
              <div class="user-info">
                  <h3>john deo</h3>
                  <span>happy customer</span>
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
              <img src="images/pic-2.png" alt="">
              <div class="user-info">
                  <h3>john deo</h3>
                  <span>happy customer</span>
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
              <img src="images/pic-3.png" alt="">
              <div class="user-info">
                  <h3>john deo</h3>
                  <span>happy customer</span>
              </div>
          </div>
          <span class="fas fa-quote-right"></span>
      </div>
  
  </div>
      
  </section>
  
  <!-- review section ends -->
  
  <!-- contact section starts  -->
  

  <!-- contact section ends -->
  
  <!-- footer section starts  -->
  
  <section class="footer">
  
      <div class="box-container">
  
          <div class="box">
              <h3>quick links</h3>
              <a href="#">home</a>
              <a href="#">about</a>
              <a href="#">products</a>
              <a href="#">review</a>
          </div>
  
  
          <!-- <div class="box">
              <h3>locations</h3>
              <a href="#">india</a>
              <a href="#">USA</a>
              <a href="#">japan</a>
              <a href="#">france</a>
          </div> -->
  
          <div class="box">
              <h3>contact info</h3>
              <a href="#"></a>
              <a href="#">example@gmail.com</a>
              <a href="#"></a>
              <img src="images/payment.png" alt="">
          </div>
  
      </div>
  
      
  
  </section>
  
  <!-- footer section ends -->
<?php include('layouts/footer.php');?>