<?php  include('header.php') ?>
<?php 


include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('location: index.php');
  exit;
}




if(isset($_POST['login-btn'])){
  $email =$_POST['email'];
  $password =md5($_POST['password']);
 $stmt = $conn -> prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admins where admin_email=? AND admin_password=? LIMIT 1");

$stmt -> bind_param('ss',$email,$password);
if($stmt->execute()){
  $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
$stmt->store_result();
  if($stmt ->num_rows()==1){
  $stmt->fetch();
  $_SESSION['admin_id'] =$admin_id;
  $_SESSION['admin_name'] =$admin_name;
  $_SESSION['admin_email'] =$admin_email;
  $_SESSION['admin_logged_in'] =true;

  header('location:index.php?login_success=logged in succesfully');

  }
  else{
    header('location:login.php?error=could not verify your acc');
  }
}else{
header('location:login.php?error=something went wrong');
}

}



?>









    <section class="my-5 py-5">
  <div class="container text-center mt-3 pt-3">
    <h2 class="form-weight-bold">Войти</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form action="login.php" id="login-form" method="post" >
     <p style="color:red" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="">Пароль</label>
        <input type="password" class="form-control" id="login-password" name="password" placeholder="Пароль" required>
      </div>
      <div class="form-group">
   
        <input type="submit" class="btn" id="login-btn"  style="text-align: center;" name="login-btn" value="Войти">
      </div>
    

    </form>
  </div>

</section>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script></script>
</body>

</html>