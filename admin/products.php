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
    <title>Товары</title>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">BB</a>
    
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Выйти</a>
            </li>
        </ul>
    </nav>

<?php 

   
if(isset($_GET['page_no'])&& $_GET['page_no'] !=""){
    $page_no =$_GET['page_no'];
  }else{
    $page_no =1;
  }
  $stmt1 =$conn->prepare("SELECT COUNT(*) AS total_records FROM products");
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();
  
  //3 сколько будет продуктов
  
  $total_records_per_page = 8;
  
  $offset =($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no +1;
  $adjacents ="2";
  $total_no_of_pages =ceil($total_records/$total_records_per_page);
  
  // all product
  $stmt2 =$conn->prepare("SELECT * FROM products limit $offset,$total_records_per_page");
  $stmt2->execute();
  $products=$stmt2->get_result();
  
  
?>


    <div class="container-fluid">
        <div class="row">
          

<?php      include('sidemenu.php')    ?>



            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h3>Товары</h3>
                <?php if(isset($_GET['edit_success_message'])){?>
                <p class="text-center" style="color: green;"><?php echo $_GET['edit_success_message'];?></p>
               <?php }?>

               <?php if(isset($_GET['edit_failure_message'])){?>
                <p class="text-center" style="color: red;"><?php echo $_GET['edit_failure_message'];?></p>
               <?php }?>


               <?php if(isset($_GET['delete_success'])){?>
                <p class="text-center" style="color: green;"><?php echo $_GET['delete_success'];?></p>
               <?php }?>

               <?php if(isset($_GET['delete_failure'])){?>
                <p class="text-center" style="color: red;"><?php echo $_GET['delete_failure'];?></p>
               <?php }?>
               <?php if(isset($_GET['images_updated'])){?>
                <p class="text-center" style="color: green;"><?php echo $_GET['images_updated'];?></p>
               <?php }?>
               <?php if(isset($_GET['images_failed'])){?>
                <p class="text-center" style="color: green;"><?php echo $_GET['images_failed'];?></p>
               <?php }?>
                <hr>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                               
                                <th scope="col">ID товара</th>
                                  <th scope="col">Фото товара</th>
                                <th scope="col">Название товара</th>
                                <th scope="col">Цена товара</th>
                                <th scope="col">Скидка товара</th>
                                <th scope="col">Категория товара</th>
                                <th scope="col">Цвет товара</th>
                                <th scope="col">Фотографии</th>
                                <th scope="col">Редактирование</th>
                                <th scope="col">Удаление</th>
                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach($products as $product) {?>
                            <tr>

                          <td><?php echo $product['product_id'] ?></td>
                         
                                <td><img  src="<?php echo "../assets/css/js/images/". $product['product_image'];?>" style="width: 70px; height:70px; "/> </td>
                                <td><?php    echo $product['product_name'];?></td>
                                <td><?php     echo $product['product_price'];?> ₽</td>

                                <td><?php    echo $product['product_special_offer'];?>%</td>
                                
                                <td><?php     echo $product['product_category'];?></td>
                                <td><?php     echo $product['product_color'];?></td>
                                <td><a href="<?php echo "edit_images.php?product_id=". $product['product_id']."&product_name".$product['product_name'];?>" class="btn btn-light">Изменить </a></td>
                                <td><a href="edit_product.php?product_id=<?php echo $product['product_id']?>" class="btn btn-primary">Редактировать</a></td>
                                <td><a href="delete_product.php?product_id=<?php echo $product['product_id']?>" class="btn btn-danger">Удалить</a></td>
                                
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