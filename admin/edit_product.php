<?php 
include('../server/connection.php')
?>
<?php 
if(isset($_GET['product_id'])){
  $product_id=$_GET['product_id'];
$stmt =$conn->prepare("SELECT * FROM products where product_id=? ");
$stmt->bind_param('i',$product_id);
$stmt->execute();
$products=$stmt->get_result();
}else if(isset($_POST['edit_btn'])){

  $product_id =$_POST['product_id'];
  $title =$_POST['title'];
  $description =$_POST['description'];
  $price =$_POST['price'];
  $offer =$_POST['offer'];
  $color =$_POST['color'];
  $category =$_POST['category'];
  $stmt= $conn -> prepare("UPDATE products SET product_name=?,product_description=?,product_price=?,
  product_special_offer=?,product_color=?,product_category=? WHERE product_id =?");
  $stmt->bind_param('ssssssi',$title,$description,$price,$offer,$color,$category,$product_id); 

 if ($stmt->execute()){
  header('location:products.php?edit_success_message=Product has been updated successfully');
}else{
  header('location:products.php?edit_failure_message=Попробйте еще раз');
}

}
else{
  header('products.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <link rel="stylesheet" href="dashboard.css">
    <title>Bootstrap Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Jobs Dashboard</a>
 
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </nav>

<?php include('sidemenu.php')?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h3>Редактирование товаров</h3>
                <hr>
                <div class="table-responsive">
                <div class="mx-auto container">
                <form id="edit-form" method="post" action="edit_product.php">
    <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p>
    <div class="form-group mt-2">
      <?php  foreach($products as $product) {?>
        <input type="hidden" name="product_id" value="<?php echo  $product['product_id'];?>"/>
        <label>Название</label>
        <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_name']?>" name="title" placeholder="Название">
    </div>
    <div class="form-group mt-2">
        <label>Описание</label>
        <input type="text" class="form-control" id="product-desc" value="<?php echo $product['product_description']?>"  name="description" placeholder="Описание">
    </div>
    <div class="form-group mt-2">
        <label>Цена</label>
        <input type="number" class="form-control" id="product-price" value="<?php echo  $product['product_price']?>"   name="price" placeholder="Цена">
    </div>
    <div class="form-group mt-2">
        <label>Категория</label>
        <select class="form-select" required name="category">
            <option value="dress">Платья</option>
            <option value="jacket">Куртки</option>
            <option value="custom">Костюмы</option>
            <option value="remen">Ремни</option>
            <option value="wallet">Кошельки</option>
        </select>
    </div>
    <div class="form-group mt-2">
        <label>Цвет</label>
        <input type="text" class="form-control" value="<?php echo $product['product_color']?>"  id="product-color" name="color" placeholder="Цвет">
    </div>
    <div class="form-group mt-2">
        <label>Скидка</label>
        <input type="number" class="form-control" id="product-offer" name="offer" value="<?php echo $product['product_special_offer']?>"  placeholder="Скидка" min="0" max="100">
    </div>
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary" name="edit_btn">Редактировать</button>
    </div>
    <?php } ?>
</form>
