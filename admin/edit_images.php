
<?php 

if(isset($_GET['product_id'])){
  $product_id =$_GET['product_id'];
  $product_name =$_GET['product_name'];
}else{
  header('location:products.php');
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
            <h3>Добавить товар</h3>
          <div class="teble-responsive">

          <div class="mx-auto container">
            <form action="update_images.php" id="createform" method="POST" >
                            <p style="color:red" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                            
                            <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                            <input type="hidden" name="product_name" value="<?php echo $product_name;?>">
                            <div class="form-group mt-2">
                                <label for="">Фото 1</label>
                                <input type="file" class="form-control" id="image" name="image" placeholder="Фото 1" required>
                                </div>
                                <div class="form-group mt-2">
                                <label for="">Фото 2</label>
                                <input type="file" class="form-control" id="image2" name="imag2" placeholder="Фото 2" required>
                                </div>
                                <div class="form-group mt-2">
                                <label for="">Фото 3</label>
                                <input type="file" class="form-control" id="image3" name="image3" placeholder="Фото 3" required>
                                </div>
                                <div class="form-group mt-3">
                               
                               <input type="submit" class="btn btn-primary"  name="update_images" value="Обновить">
                           </div>
            </form></div></div></main></div></div></body></html>