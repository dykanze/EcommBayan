


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayan Brand</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- navbar -->
  <nav class="navbar navbar-expand-lg  navbar-light bg-white py-3 fixed-top ">
    <div class="container">
  <img class="logo" src="img/logo.png" alt="photo" >
  <h2 class="brand">Bayan   Brand</h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-button" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
          <li class="nav-item">
            <a class="nav-link" href="index.php">Главная</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Товары</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Контакты</a>
          </li>
          <li class="nav-item">
              <a href="cart.php" class="fa-solid fa-cart-shopping" style="color: black;">
        <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] !=0) {?>
        <span class="cart-quantity"><?php echo $_SESSION['quantity'];?></span>
        <?php }?>      
        </i>
            </a>
            <a href="account.php"><i class="fa-solid fa-user" style="color: black;"></i></a>
          </li>
          
      
          
        </ul>
        
      </div>
    </div>
  </nav>
