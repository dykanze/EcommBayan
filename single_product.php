<?php 
include('server/connection.php');


if(isset($_GET['product_id'])){

$product_id =$_GET['product_id'];
$stmt = $conn->prepare("select * from products  where product_id = ?");

$stmt->bind_param("i",$product_id);

$stmt->execute();
$product = $stmt->get_result();
}
// no product id
else{
  header('location:index.php');
}
?>





<?php  include('layouts/header.php') ?>




<!--Single product-->


<section class="container single-product my-5 pt-5">
  <div class="row mt-5 ">
    <?php  while($row =$product->fetch_assoc()) { ?>
      
    <div class="col-lg-5 col-md-6 col-sm-12">
      <img  class="img-fluid w-100 pb-1" src="assets/css/js/images/<?php  echo $row['product_image']; ?>" id="mainImg">
      <div class="small-img-group">
        <div class="small-img-col">
          <img src="assets/css/js/images/<?php  echo $row['product_image']; ?>" alt="" width="100%" class="small-img">
        </div>
        <div class="small-img-col">
          <img src="assets/css/js/images/<?php  echo $row['product_image2']; ?>" alt="" width="100%" class="small-img">
        </div>
        <div class="small-img-col">
          <img src="assets/css/js/images/<?php  echo $row['product_image3']; ?>" alt="" width="100%" class="small-img">
        </div>
      </div>
    </div>

    

<div class="col-lg-6 col-md-12 col-12">
  <h6>Женщины/Платья</h6>
  <h3 class="py-4"><?php  echo $row['product_name']; ?></h3>
  <h2><?php  echo $row['product_price']; ?></h2>
  <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="<?php  echo $row['product_id']; ?>" />
        <input type="hidden" name="product_image" value="<?php  echo $row['product_image']; ?>" />
        <input type="hidden" name="product_name" value="<?php  echo $row['product_name']; ?>" />
        <input type="hidden" name="product_price" value="<?php  echo $row['product_price']; ?>" />
  <label for="quantity">Количество:</label>
  <input type="number" id="quantity" name="product_quantity" value="1"/>
  <label for="size">Размер:</label>
  <select id="size" name="size">
    <option value="XS">XS</option>
    <option value="S">S</option>
    <option value="M" selected>M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
  </select>
<br><br>
 
  <button class="buy-btn"  type="submit" name="add_to_cart">Добавить в корзину</button>
  </form>
  <h4 class="mt-5 mb-5">Материал</h4>
  <span><?php  echo $row['product_description']; ?></span>
</div>
      
<?php } ?>
  </div>
</section>

<!--Related product-->
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Смотрите так же</h3>
    <hr class="mx-auto">

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


<?php  include('layouts/footer.php') ?>



 

<script>

    var  mainImg =  document.getElementById("mainImg"); 
    var smallImg =  document.getElementsByClassName("small-img");

for(let i=0;i<3;i++){
  smallImg[i].onclick= function(){
      mainImg.src =smallImg[i].src;
    }
}
  
  
   

</script>
