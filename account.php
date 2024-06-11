
<?php 
session_start();
include('server/connection.php');
if(!isset($_SESSION['logged_in'])){
  header('location: login.php');
  exit;
}

if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;

  }
}

if(isset($_POST['change_password'])){
  $password =$_POST['password'];
  $confirm_password =$_POST['confirm-password'];
  $user_email =$_SESSION['user_email'];
  if($password !== $confirm_password){
    header('location: account.php?error=Пароли не совпадают'); // Исправлена ошибка в URL и тексте
  }
  // Проверка на длину пароля
  else if(strlen($password) < 6){
    header('location: account.php?error=Пароль должен быть не меньше 6 символов'); // Исправлена опечатка в тексте
// no error
  }else{
$stmt= $conn -> prepare("UPDATE users SET user_password=? WHERE user_email =?");
$stmt->bind_param('ss',md5($password),$user_email); 
if($stmt ->execute()){
  header('location: account.php?message=пароль был успешно обновлен');
}
else{
  header('location: account.php?error=could nit update password');
}

}
}
if(isset($_SESSION['logged_in'])){
  $user_id=$_SESSION['user_id'];
  $stmt = $conn->prepare("SELECT   * from orders WHERE user_id=?");

  $stmt->bind_param('i',$user_id);
$stmt->execute();
$orders = $stmt->get_result();
}




?>






<?php include('layouts/header.php')
?>




<!--Account-->
<section class="my-5 py-5">
 <div class="row container mx-auto">
  <div class="text-center mt-3 pt-5  col-lg-6 col-md-12 col-sm-12">
  <p class="text-center" style="color:green"><?php  if(isset($_GET['register_success'])){echo $_GET['register_success'];}?></p>
  <p class="text-center" style="color:green"><?php  if(isset($_GET['login_success'])){echo $_GET['login_success'];}?></p>
    <hr class="mx-auto">
    <div class="account-info">
      <p>Имя: <span><?php if(isset($_SESSION['user_name'])) echo $_SESSION['user_name'];?></span></p>
      <p>Email: <span><?php if(isset($_SESSION['user_email'])) echo $_SESSION['user_email'];?></span></p>
      <p><a href="#orders" id="orders-btn"> Ваши заказы</a></p>
      <p><a href="account.php?logout=1" id="logout-btn"> Выход</a></p>
    </div>
  </div>


<div class="col-lg-6 col-md-12 col-sm-12">
  <form action="account.php" id="account-form" method="post">
  <p class="text-center" style="color:red"><?php  if(isset($_GET['error'])){echo $_GET['error'];}?></p>
  <p class="text-center" style="color:green"><?php  if(isset($_GET['message'])){echo $_GET['message'];}?></p>
  <h3>Изменить Пароль</h3>
    <hr class="mx-auto">
    <div class="form-group">
      <label for="" >Пароль</label>
       <input type="password" class="form-control" id="account-password" name="password" placeholder="пароль" required>
    </div>
    <div class="form-group">
      <label for="" >Подтвердите Пароль</label>
       <input type="password" class="form-control" id="account-password-confirm" name="confirm-password" placeholder="пароль" required>
    </div>
    <div class="form-group">
      
       <input type="submit" value="Изменить Пароль" class="btn" id="change-pass-btn" name="change_password">
    </div>
  </form>
</div>

 </div>

</section>


<!--Orders-->
<section  id="orders" class="orders container my-5 py-3">
  <div class="container mt-2">
    <h2 class="font-weight-bolde text-center">Ваши заказы</h2>
    <hr class="mx-auto">
 
  </div>
  
  <table class="mt-5 pt-5">
    <tr>
      <th>заказ id</th>
      <th>цена заказа</th>
      <th>статус заказа</th>
      <th>Дата</th>
      <th>Информация о заказеы</th>
     

    </tr>


    <?php while($row =$orders->fetch_assoc()){
    ?>
  <tr>
      <td>
     <span><?php   echo $row['order_id'];?></span>
      </td>

      <td>
        <span><?php echo $row['order_cost'];  ?></span>
      </td>
      <td>
        <span><?php echo $row['order_status'];  ?></span>
      </td>
      <td>
        <span><?php echo $row['order_date'];  ?></span>
      </td>
<td>
<form action="order_details.php" method="post">
<input type="hidden" value="<?php  echo $row['order_status']; ?>" name="order_status">

  <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id"/>
  <input type="submit" name="order_details_btn" class="btn order-details-btn" value="Подробнее"/>
</form>
</td>

    </tr> 
  
<?php }?>

  </table>



</section>



<?php include('layouts/footer.php')
?>