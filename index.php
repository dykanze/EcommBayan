<?php  include('layouts/header.php') ?>


  <!-- home-->
<section id="home">
  <div class="container">
  <h1 style="color: white;">BAYAN BRAND</h1>
    <h1>Этно-стиль<span style="color: white;"> на каждый день</span></h1>
    <p>Предлагаем лучшие товары по самым доступным ценам</p>
    <a href="shop.php" class="shop-button">подробнее</a>
  </div>
</section>

  <!-- brand-->
<section id="brand" class="container">
  <div class="row">
    <img class="col-lg-3 col-md-6 col-sm-12" src="img/brand1.jpg" alt="">
    <img class="col-lg-3 col-md-6 col-sm-12" src="img/brand1.jpg" alt="">
    <img class="col-lg-3 col-md-6 col-sm-12" src="img/brand1.jpg" alt="">
    <img class="col-lg-3 col-md-6 col-sm-12" src="img/brand1.jpg" alt="">
  </div>
</section>
<!-- NEW-->
<section id="new" class="w-100">
  <div class="row p-0 m-0">
    <!-- one-->
    <div class="one col-lg-4 col-md-12 col-sm-12">
      <img  class="img-fluid" src="img/one.jpg">
<div class="details">
  <h2>Ремни</h2>
  <button class="text-uppercase">Купить</button>
</div>
    </div>
  <!--Two-->
  <div class="one col-lg-4 col-md-12 col-sm-12">
    <img  class="img-fluid" src="img/two.jpg">
<div class="details">
<h2>Кошельки</h2>
<button class="text-uppercase">Купить</button>
</div>
  </div>
    <!--Three -->
    <div class="one col-lg-4 col-md-12 col-sm-12">
      <img  class="img-fluid" src="img/three.jpg">
<div class="details">
  <h2>Кофты</h2>
  <button class="text-uppercase">Купить</button>
</div>
    </div>
  </div>
</section>

<!--Feature-->
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3 >Наши рекомендации</h3>
    <hr class="mx-auto">
    <p>здесь вы можете ознакомиться с рекомендуемыми товарами</p>
  </div>
  <div class="row mx-auto container-fluid">
    <?php include('server/get_featured_products.php') ?>
    <?php while($row =$featured_products->fetch_assoc()){?>
    <div class="product  text-center col-lg-3 col-md-4 col-sm-12">
      <img  class="img-fluid mb-3" src="assets/css/js/images/<?php echo $row['product_image']; ?>">
      
      <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
      <h4 class="p-price"><?php echo $row['product_price']; ?> ₽</h4>
      <a href="<?php  echo "single_product.php?product_id=".$row['product_id'];?>"><button class="buy-btn">В корзину</button></a>
    </div> 
    
   <?php  } ?>

  </div>
</section>

<!--Feature-->
<section id="featured" class="my-5 pb-5"></section>

<!--Banner-->
<section id="banner" class="my-5 py-5">
  <div class="container">
    <h3>Новая</h3>
    <h1>Летняя коллекция<br>2024</h1>
    <a href="shop.php" class="shop-button">Открыть каталог</a>

  </div>
</section>

<!--Clothes-->
<section id="featured" class="my-5 ">
  <div class="container text-center mt-5 py-5">
    <h3>Куртки</h3>
    <hr class="mx-auto">
    <p>здесь вы можете ознакомиться с куртками</p>
  </div>
  <div class="row mx-auto container-fluid">
    <?php   include('server/get_jacket.php'); ?>
    <?php while($row=$jacket_products->fetch_assoc()) { ?>
    <div class="product  text-center col-lg-3 col-md-4 col-sm-12">
      <img  class="img-fluid mb-3" src="assets/css/js/images/<?php  echo $row['product_image']?>">
      
      <h5 class="p-name"><?php  echo $row['product_name']?></h5>
      <h4 class="p-price"><?php  echo $row['product_price']?> ₽</h4>
      <a href="<?php  echo "single_product.php?product_id=".$row['product_id'];?>"><button class="buy-btn">В корзину</button></a>
    </div> 
    
    <?php }?>
  
  </div>
</section>

<!--Customs-->
<section id="featured" class="my-5 ">
  <div class="container text-center mt-5 py-5">
    <h3>Костюмы</h3>
    <hr class="mx-auto">
    <p>здесь вы можете ознакомиться с классными костюмами</p>
  </div>
  <div class="row mx-auto container-fluid">
    <?php   include('server/get_custom.php'); ?>
    <?php while($row=$custom_products->fetch_assoc()) { ?>
    <div class="product  text-center col-lg-3 col-md-4 col-sm-12">
      <img  class="img-fluid mb-3" src="assets/css/js/images/<?php  echo $row['product_image']?>">
      
      <h5 class="p-name"><?php  echo $row['product_name']?></h5>
      <h4 class="p-price"><?php  echo $row['product_price']?> ₽</h4>
      <a href="<?php  echo "single_product.php?product_id=".$row['product_id'];?>" ><button class="buy-btn">В корзину</button></a>
    </div> 
    
    <?php }?>
  
  </div>
</section>

<?php  include('layouts/footer.php') ?>