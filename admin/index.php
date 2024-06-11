<?php 
include('../server/connection.php')

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
    <title>Панель администратора</title>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">BB</a>
    
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php">Выйти</a>
            </li>
        </ul>
    </nav>

<?php 

   
if(isset($_GET['page_no'])&& $_GET['page_no'] !=""){
    $page_no =$_GET['page_no'];
  }else{
    $page_no =1;
  }
  $stmt1 =$conn->prepare("SELECT COUNT(*) AS total_records FROM orders");
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();
  
  //3 сколько будет продуктов
  
  $total_records_per_page =10;
  
  $offset =($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no +1;
  $adjacents ="2";
  $total_no_of_pages =ceil($total_records/$total_records_per_page);
  
  // all product
  $stmt2 =$conn->prepare("SELECT * FROM orders limit $offset,$total_records_per_page");
  $stmt2->execute();
  $orders=$stmt2->get_result();
  
  
?>


    <div class="container-fluid">
        <div class="row">
          

<?php      include('sidemenu.php')    ?>



            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h3>Заказы</h3>
                <hr>
                <?php if(isset($_GET['order_updated'])){?>
                <p class="text-center" style="color: green;"><?php echo $_GET['order_updated'];?></p>
               <?php }?>

               <?php if(isset($_GET['order_failed'])){?>
                <p class="text-center" style="color: red;"><?php echo $_GET['order_failed'];?></p>
               <?php }?>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                               
                                <th scope="col">ID заказа</th>
                                  <th scope="col">Статус заказа</th>
                                <th scope="col">ID пользователя</th>
                                <th scope="col">Дата заказа</th>
                                <th scope="col">Номер</th>
                                <th scope="col">Адрес</th>
                                <th scope="col">Редактирование</th>
                                <th scope="col">Удаление</th>
                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach($orders as $order) {?>
                            <tr>

                          
                                <td><?php   echo $order['order_id'];?></td>
                                <td><?php   echo $order['order_status'];?></td>
                                <td><?php   echo $order['user_id'];?></td>
                                <td><?php   echo $order['order_date'];?></td>

                                <td><?php   echo $order['user_phone'];?></td>
                                
                                <td><?php   echo $order['user_address'];?></td>
                                <td><a href="edit_order.php?order_id=<?php echo $order['order_id']?>" class="btn btn-primary">Редактировать</a></td>
                                <td><a href="" class="btn btn-danger">Удалить</a></td>
                                
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>


                    <nav aria-label="Page navigation example">
      <ul class="pagination mt-5">
        <li class="page-item <?php if($page_no<=1){echo 'disabled';} ?>">
        <a href="<?php if($page_no<=1){echo '#';}else{echo "?page_no=".($page_no-1);} ?>" class="page-link">Прошлая</a>
      </li>

        <li class="page-item"><a href="?page_no=1" class="page-link">1</a></li>
        <li class="page-item"><a href="?page_no=2"class="page-link">2</a></li>

        <?php  if ($page_no >=3){?>
        <li class="page-item"><a href="#" class="page-link">...</a></li>
        <li class="page-item"><a href="<?php echo "?page_no".$page_no;?>" class="page-link">...</a></li>
        <?php } ?>
        <li class="page-item  <?php if($page_no >= $total_no_of_pages){echo 'disabled';}?>">
        <a href="<?php if($page_no>=$total_no_of_pages){echo '#';}else{echo "?page_no=".($page_no+1);} ?>" class="page-link">Следующая</a></li>
      </ul>
    </nav>


                </div>
            </main>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script></script>
</body>

</html>