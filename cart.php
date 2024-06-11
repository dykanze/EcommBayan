<?php 
session_start();

if(isset($_POST['add_to_cart'])){
    $product_id = $_POST['product_id'];

    if(isset($_SESSION['cart'])){
        $products_array_ids = array_column($_SESSION['cart'], "product_id");
        if(!in_array($_POST['product_id'], $products_array_ids)){
            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity'=> $_POST['product_quantity']
            );
            $_SESSION['cart'][$product_id] = $product_array;
        } else {
            echo '<script>alert("Товар уже добавлен в корзину")</script>';
        }
    } else {
        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $_POST['product_name'],
            'product_price'=> $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_quantity'=> $_POST['product_quantity']
        );
        $_SESSION['cart'][$product_id] = $product_array;
    }
  
  
  
  
  
  
  //тотал сумма 
  CalculateTotalCart();
  
// Удаление товара
  }else if(isset($_POST['remove_product'])){
    $product_id = $_POST['product_id'];
   
      unset($_SESSION['cart'][$product_id]);
   

      //тотал
      CalculateTotalCart();
}
else if(isset($_POST['edit_quantity'])){
  //получаем ид изменения в форме
  $product_id = $_POST['product_id'];
$product_quantity =$_POST['product_quantity'];
// получаем продукт
$product_array =$_SESSION['cart'][$product_id];
//обновление
$product_array['product_quantity'] = $product_quantity;
// возврощаем
$_SESSION['cart'][$product_id] = $product_array;
CalculateTotalCart();

}


function CalculateTotalCart(){
  $total_price =0;
  $total_quantity =0;
  foreach($_SESSION['cart'] as $key =>$value){
    $product = $_SESSION['cart'][$key];
    $price =$product['product_price'];
    $quantity =$product['product_quantity'];
    $total_price = $total_price +($price * $quantity);
    $total_quantity = $total_quantity + $quantity;
  }
$_SESSION['total'] =$total_price;
$_SESSION['quantity'] = $total_quantity;

}

?>

<?php  include('layouts/header.php') ?>





<!--Cart-->
<section class="cart container my-5 py-5">
  <div class="container mt-5">
    <h2 class="font-weight-bolde">Ваша корзина</h2>
    <hr>
  </div>
  
  <table class="mt-5 pt-5">
    <tr>
      <th>Продукт</th>
      <th>Количество</th>

      <th style="text-align:right;">Стоимость</th>
    </tr>
<?php  if(isset($_SESSION['cart'])){ ?>
<?php foreach($_SESSION['cart'] as $key => $value){?>

    <tr>
      <td>
        <div class="product-info">
          <img src="assets/css/js/images/<?php  echo $value['product_image'];  ?>" >
        <div>
          <p><?php  echo $value['product_name'];  ?></p>
          <small><span> </span><?php echo $value['product_price'];?> ₽</small>
          <br>

          <form action="cart.php" method="post">
           <input type="hidden" name="product_id" value="<?php  echo $value['product_id'];?>"> 
          <input type="submit" name="remove_product" class="remove-btn" value="Удалить"/>
          </form>
   
        </div>
        </div>
      </td>
<td>


  <form action="cart.php" method="post">
  <input type="hidden" name="product_id" value="<?php  echo $value['product_id'];  ?>"/>
  <input type="number" name="product_quantity" value="<?php  echo $value['product_quantity'];  ?>">
<input type="submit" class="edit-btn" name="edit_quantity" value="Изменить"/>

  </form>

</td>
<td>
  
  <span class="product-price"><?php    echo $value['product_quantity']* $value['product_price']; ?> ₽</span>
</td>
    </tr>
   
<?php } ?>
<?php }?>
  </table>


<div class="cart-total">
  <table> 
   
    <tr>
      <td>Общая Стоимость </td>
      <?php if(isset($_SESSION['cart'])){?>
      <td> <?php echo $_SESSION['total']; ?> ₽</td>
      <?php }?>
    </tr>
  </table>
</div>
<div class="checkout-container">
  <form action="checkout.php" method="post">
  <input type="submit" class="btn checkout-btn" value="Оформить" name="checkout"/>
  </form>
</div>

</section>






<?php  include('layouts/footer.php') ?>