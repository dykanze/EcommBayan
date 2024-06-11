
<?php 



session_start();
if (!empty($_SESSION['cart']) ){

}
else
{
  header('location:index.php');
}


?>









<?php  include('layouts/header.php') ?>





<!--Checkout-->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-3">
    <h2 class="form-weight-bold">Оформить заказ</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form action="server/place_order.php" id="checkout-form" method="post" >
      <p class="text-center" style="color: red;">
      <?php if(isset($_GET['message'])){ echo $_GET['message'];} ?> 
      <?php if(isset($_GET['message'])){?>
        <a href="login.php" class="btn btn-primary">Войти</a>
        <?php }?>
    </p>
    
      <div class="form-group checkout-small-element">
        <label for="">Имя</label>
        <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Имя" required>
      </div>
      <div class="form-group checkout-small-element">
        <label for="">Email</label>
        <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group checkout-small-element">
        <label for="">Номер</label>
        <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Телефон" required>
      </div>
      <div class="form-group checkout-small-element">
        <label for="">Город</label>
        <input type="text" class="form-control" id="checkout-city" name="city" placeholder="Город" required>
      </div>
      <div class="form-group checkout-large-element">
        <label for="">Адрес</label>
        <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Адрес" required>
      </div>

      <div class="form-group checkout-btn-container">
   <p>Общая сумма:Р <?php  echo $_SESSION['total']; ?></p>
        <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Оформить">
      </div>
   


    </form>
  </div>

</section>






<?php  include('layouts/footer.php') ?>