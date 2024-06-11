<?php 
include('../server/connection.php');
?>
<?php 
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
  $stmt =$conn->prepare("SELECT * FROM orders where order_id=? ");
  $stmt->bind_param('i',$order_id);
  $stmt->execute();
  $order=$stmt->get_result();
}else if(isset($_POST['edit_order'])){

    $order_status =$_POST['order_status'];
    $order_id =$_POST['order_id'];
    $stmt= $conn -> prepare("UPDATE orders SET order_status=? WHERE order_id =?");
    $stmt->bind_param('si',$order_status,$order_id); 
  
   if ($stmt->execute()){
    header('location:index.php?order_updated_message=Order has been updated successfully');
  }else{
    header('location:index.php?order_failure_message=Попробйте еще раз');
  }

}else{
    header('location:index.php');
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

    <div class="container-fluid">
        <div class="row" style="min-height: 1000px;">
            <?php include('sidemenu.php') ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h3>Редактирование заказов</h3>

        
                        <form action="edit_order.php" id="edit-order-form" method="POST" >
                            <?php  foreach($order as $r) {?>
                            <p style="color:red" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                            <div class="form-group my-3">
                                <label for="">OrderID</label>
                                <p class="my-4"><?php echo $r['order_id']?></p>
                            </div>
                            <div class="form-group my-3">
                                <label for="">OrderPrice</label>
                                <p class="my-4"><?php echo $r['order_cost']?></p>
                            </div>

                            <input type="hidden" name="order_id" value="<?php echo $r['order_id'];  ?>">

                            <div class="form-group my-3">
                                <label for="">Order Status</label>

                                <select name="order_status" required class="form-select">
                                
                                <option value="not paid" <?php if($r['order_status']== 'not paid'){echo "selected";}?>>Не оплачено</option>
                                    <option value="paid" <?php if($r['order_status']== 'paid'){echo "selected";}?>>Оплачено</option>
                                    <option value="shipped" <?php if($r['order_status']== 'shipped'){echo "selected";}?>>Отправлено</option>
                                    <option value="delivered"<?php if($r['order_status']== 'delivered'){echo "selected";}?>>Доставлено</option>
                                </select>
                            </div>
                            <div class="form-group my-3">
                                <label for="">OrderDate</label>
                                <p class="my-4"><?php echo $r['order_date']?></p>
                            </div>
                            <div>
                                <input type="submit" name="edit_order" class="btn btn-primary" value="Изменить">
                            </div>
                          <?php }?>
                        </form>

                        
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>



