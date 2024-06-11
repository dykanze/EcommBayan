<?php 
session_start();
include('server/connection.php');


  //если юзер зареган  то перейди на уч запись
 if(isset($_SESSION['logged_in'])){
  header('location:account.php');
  exit;
}



if(isset($_POST['register'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];

  // Проверка на совпадение паролей
  if($password !== $confirmpassword){
    header('location: register.php?error=Пароли не совпадают'); // Исправлена ошибка в URL и тексте
  }
  // Проверка на длину пароля
  else if(strlen($password) < 6){
    header('location: register.php?error=Пароль должен быть не меньше 6 символов'); // Исправлена опечатка в тексте
  } else {
    // Проверка наличия пользователя с таким же email
    $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email=?"); // Исправлен запрос, чтобы сравнивать email, а не селектить user_name
    $stmt1->bind_param('s', $email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->store_result();
    $stmt1->fetch();

    // Если пользователь уже зарегистрирован
    if($num_rows != 0){
      header('location: register.php?error=Пользователь с таким email уже существует');
    } else {
      // Создание нового пользователя
      $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)"); // Исправлен запрос, чтобы вставлялись все три значения
      $stmt->bind_param('sss', $name, $email, md5($password)); // Исправлено количество параметров и md5 на самом пароле

      if($stmt->execute()){
        $User_id =$stmt->insert_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['logged_in'] = true;

        header('location: account.php?register_success=Регистрация прошла успешно'); // Исправлен текст
      } else {
        header('location: register.php?error=could not create an account at the moment'); // Исправлен текст
      }
    }
  }
}
?>


<?php  include('layouts/header.php') ?>






<!--register-->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-3">
    <h2 class="form-weight-bold">Зарегистрироваться</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form action="register.php" id="register-form" method="post">
      <p style="color:red"><?php   if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
      <div class="form-group">
        <label for="">Имя</label>
        <input type="text" class="form-control" id="register-name" name="name" placeholder="Имя" required>
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="">Пароль</label>
        <input type="password" class="form-control" id="register-password" name="password" placeholder="Пароль" required>
      </div>
      <div class="form-group">
        <label for="">Подтвердите Пароль</label>
        <input type="password" class="form-control" id="register-confirm-password" name="confirmpassword" placeholder="Подтвердите Пароль" required>
      </div>
      <div class="form-group">
   
        <input type="submit" class="btn" id="register-btn" value="Зарегистрироваться" name="register"/>
      </div>
      <div class="form-group">
   <a href="login.php" id="login-url" class="btn">Есть аккаунт?</a>
      </div>


    </form>
  </div>

</section>



<?php  include('layouts/footer.php') ?>