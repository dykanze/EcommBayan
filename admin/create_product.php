<?php 
include('../server/connection.php');

if (isset($_POST['create_product'])) {
    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_special_offer = $_POST['offer'];
    $product_category = $_POST['category'];
    $product_color = $_POST['color'];
    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];

    $file_name1 = $_FILES['image1']['name'];
    $image_name1 = $product_name . "1.jpg";
    $image_name2 = $product_name . "2.jpg";
    $image_name3 = $product_name . "3.jpg";



    move_uploaded_file($image1,"../assets/css/js/images" . $image_name1);
    move_uploaded_file($image2,"../assets/css/js/images" . $image_name2);
    move_uploaded_file($image3, "../assets/css/js/images" . $image_name3);
  

    $stmt = $conn->prepare("INSERT INTO products (product_name, product_description, 
    product_price, product_special_offer, product_category, product_color, product_image, product_image2, product_image3)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param('sssssssss', $product_name, $product_description, $product_price, $product_special_offer, $product_category, $product_color, $image_name1, $image_name2, $image_name3);


if ($stmt->execute()) {
  header('Location: products.php?product_created=Product has been created successfully');
} else {
  header('Location: products.php?product_failed=Error occurred, try again');
}




} ?>