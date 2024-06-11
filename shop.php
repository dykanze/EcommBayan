<?php
session_start(); 
include('server/connection.php');

// Установим значение по умолчанию для $price
$price = 10000; // Например, максимальная цена, можете установить свое значение

// search one prod
if(isset($_POST['search'])){

  if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
    $page_no = $_GET['page_no'];
  }else{
    $page_no = 1;
  }
  $category = $_POST['category'];

  $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products WHERE product_category=? AND product_price<=?");
  $stmt1->bind_param('si', $category, $price);
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();

  $total_records_per_page = 8;
  $offset = ($page_no - 1) * $total_records_per_page;
  $total_no_of_pages = ceil($total_records / $total_records_per_page);

  $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT ?, ?");
  $stmt2->bind_param("siii", $category, $price, $offset, $total_records_per_page);
  $stmt2->execute();
  $products = $stmt2->get_result();

} else {
  if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
    $page_no = $_GET['page_no'];
  }else{
    $page_no = 1;
  }

  $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products");
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();

  $total_records_per_page = 8;
  $offset = ($page_no - 1) * $total_records_per_page;
  $total_no_of_pages = ceil($total_records / $total_records_per_page);

  $stmt2 = $conn->prepare("SELECT * FROM products LIMIT ?, ?");
  $stmt2->bind_param("ii", $offset, $total_records_per_page);
  $stmt2->execute();
  $products = $stmt2->get_result();
}
?>

<style>
  .product img {
    width: 100%;
    height: auto;
    box-sizing: border-box;
    object-fit: cover;
  }
  .pagination a {
    color: black;
  }
  .pagination li:hover a {
    color: #fff;
    background-color: black;
  }
  #search {
    float: left;
    position: absolute;
    width: 20%;
  }

</style>


<?php include('layouts/header.php') ?>

<!--поиск-->
<section id="search" class="my-5 py-5 ms-2">
  <div class="container mt-10 py-5">
  
  </div>
  </div>
  <form action="shop.php" method="post">
    <div class="row container">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <br>
        <p>Категория</p>
        <div class="form-check">
          <input type="radio" class="form-check-input" value="dress" name="category" id="category_one" checked>
          <label for="category_one" class="form-check-label">Платья</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" value="jacket" name="category" id="category_two" checked>
          <label for="category_two" class="form-check-label">Куртки</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" value="custom" name="category" id="category_three" checked>
          <label for="category_three" class="form-check-label">Костюмы</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" value="remen" name="category" id="category_four" checked>
          <label for="category_four" class="form-check-label">Ремни</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" value="wallet" name="category" id="category_five" checked>
          <label for="category_five" class="form-check-label">Кошельки</label>
        </div>
      </div>
    </div>
    <div class="form-group my-3 mx-3">
      <input type="submit" name="search" value="Поиск" class="btn btn-dark">
    </div>
  </form>
</section>

<!--Shop-->
<section id="featured" class="my-5 py-5">
  <div class="container mt-5 py-5">
  <h3>Наши товары</h3>
    <hr>
 
  <div class="row mx-auto container">
    <?php 
    while($row = $products->fetch_assoc()) {
    ?>
    <div onclick="window.location.href='single_product.php';" class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/css/js/images/<?php echo $row['product_image']; ?>"/>
      <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
      <h4 class="p-price"><?php echo $row['product_price']; ?> ₽</h4>
      <a class="btn buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>">В корзину</a>
    </div> 
    <?php } ?>
    <nav aria-label="Page navigation example">
      <ul class="pagination mt-5">
        <li class="page-item <?php if($page_no <= 1){ echo 'disabled'; } ?>">
          <a href="<?php if($page_no <= 1){ echo '#'; } else { echo "?page_no=".($page_no-1); } ?>" class="page-link">Прошлая</a>
        </li>
        <li class="page-item"><a href="?page_no=1" class="page-link">1</a></li>
        <li class="page-item"><a href="?page_no=2" class="page-link">2</a></li>
        <li class="page-item"><a href="?page_no=3" class="page-link">3</a></li>
        <?php if ($page_no >= 3){ ?>
        <li class="page-item"><a href="#" class="page-link">...</a></li>
        <li class="page-item"><a href="<?php echo "?page_no=".$page_no; ?>" class="page-link">...</a></li>
        <?php } ?>
        <li class="page-item <?php if($page_no >= $total_no_of_pages){ echo 'disabled'; } ?>">
          <a href="<?php if($page_no >= $total_no_of_pages){ echo '#'; } else { echo "?page_no=".($page_no+1); } ?>" class="page-link">Следующая</a>
        </li>
      </ul>
    </nav>
  </div>
</section>

<?php include('layouts/footer.php') ?>
