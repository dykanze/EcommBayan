<?php 

include('connection.php');
$stmt = $conn->prepare("SELECT * from products WHERE product_category='jacket' limit 4");
$stmt->execute();
$jacket_products = $stmt->get_result();
?>