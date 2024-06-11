<?php 
include('../server/connection.php');

if (isset($_POST['update_images'])) {
    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];
;
    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];


    $image_name1 = $product_name . ".jpg";
    $image_name2 = $product_name . ".jpg";
    $image_name3 = $product_name . ".jpg";
    
    move_uploaded_file($image1,"../assets/css/js/images" . $image_name1);
    move_uploaded_file($image2,"../assets/css/js/images" . $image_name2);
    move_uploaded_file($image3, "../assets/css/js/images" . $image_name3);
  

    $stmt = $conn->prepare("UPDATE  products SET  product_image=?,product_image2=?, product_image3=? where product_id=?");


$stmt->bind_param('sssi',$image_name1, $image_name2, $image_name3,$product_id);


if ($stmt->execute()) {
  header('Location: products.php?Images_updated=Images has been created successfully');
} else {
  header('Location: products.php?Images_updated=Error occurred, try again');
}




} ?>