<?php 

include('connection.php');
$stmt = $conn->prepare("SELECT * from products WHERE product_category='custom' limit 4");
$stmt->execute();
$custom_products = $stmt->get_result();
?>