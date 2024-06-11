<?php 
session_start();

if(!isset($_SESSION['logged_in'])){
  header('location: ../checkout.php?message=Пожалуйста войдите/зарегистрируйтесь чтобы оформить заказ');
  exit;
}

$order_status = "";
$order_total_price = 0;

if(isset($_POST['order_pay_btn'])){
  $order_status = $_POST['order_status'];
  $order_total_price = $_POST['order_total_price'];
}
?>

<?php include('layouts/header.php') ?>

<!--Payment-->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-3">
    <h2 class="form-weight-bold">Оплата товара</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container text-center">
  
    <?php if(isset($_SESSION['total']) && $_SESSION['total'] != 0){ ?>
      <p>Сумма оплаты: ₽ <?php echo $_SESSION['total']; ?></p>
      <form action="process_payment.php" method="post">
        <input type="hidden" name="order_total_price" value="<?php echo $_SESSION['total']; ?>">
        <input type="hidden" name="order_status" value="Not paid">
        <input class="btn btn-primary" type="submit" name="pay_now" value="Оплатить"/>
      </form>
    <?php } else if($order_status == "Not paid"){ ?>
      <p>Сумма оплаты: ₽<?php echo $order_total_price; ?></p>
      <form action="process_payment.php" method="post">
        <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>">
        <input type="hidden" name="order_status" value="Not paid">
        <input class="btn btn-dark" type="submit" name="pay_now" value="Оплатить"/>
      </form>
    <?php } else { ?> 
      <p>У вас нет заказа</p>
    <?php } ?>

  </div>
</section>

<?php include('layouts/footer.php') ?>
