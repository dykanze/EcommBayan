
<?php session_start()
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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">BB</a>
 
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row" style="min-height: 1000px;">
            <?php include('sidemenu.php'); ?>
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="container">
                            <h2>Admin Accounts</h2>
                            <p>Id: <?php echo isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : 'Not set'; ?></p>
                            <p>Name: <?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Not set'; ?></p>
                            <p>Email: <?php echo isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : 'Not set'; ?></p>
                        </div>
                    </div>
                    <main class="col-md-9">
                        <!-- Main content here -->
                    </main>
        </div>
    </div>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-XYPREtfp5jnH/Q5RevHxA3B6ZXhDTGF0JG8ktE/Cpi0UO0ewpTGeAJYo/cN5HA6c" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq7j2g9AFLVb7a2A6p6Dk9LBU9tk9J30Ur7K+0doZlK4z2f6H" crossorigin="anonymous"></script>
</body>
</html>

