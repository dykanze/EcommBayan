<?php
session_start();

?>
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
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Bootstrap Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Jobs Dashboard</a>
     
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
              <?php if(isset($_SESSION['admin_logged_in'])){ ?>
                <a class="nav-link" href="logout.php?logout=1">Logout</a>
           <?php } ?>
              </li>
        </ul>
    </nav>