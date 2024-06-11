<?php 
session_start();
include('connection.php');

//if user not logged
if(!isset($_SESSION['logged_in'])){
  header('location: ../checkout.php?message=Пожалуйста войдите/зарегестрируйтесь чтобы оформить заказ ');
exit;
//is user loggen
}else {


if(isset($_POST['place_order'])){

  //1 get user info store in db
$name = $_POST['name'];
$email =$_POST['email'];
$phone =$_POST['phone'];
$city =$_POST['city'];
$address =$_POST['address'];
$order_cost =$_SESSION['total'];
$order_status ="Not paid";
$user_id =$_SESSION['user_id'];
$order_date =date('Y-m-d H:i:s');


$stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);
 $stmt_status =$stmt->execute();
if(!$stmt_status){
  header('location: index.php');
  exit;
  };
 //2 get products from cart

 $order_id = $stmt->insert_id;

  //2 get products from cart
    //3 store order info in db
foreach($_SESSION['cart'] as $key => $value){
  $product =$_SESSION['cart'][$key];
  $product_id =$product['product_id'];
  $product_name =$product['product_name'];
  $product_image =$product['product_image'];
  $product_price =$product['product_price'];
  $product_quantity =$product['product_quantity'];
  //4 store each single item in roder items db
$stmt1 =$conn -> prepare("INSERT INTO order_items (order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date)
VALUES (?,?,?,?,?,?,?,?)");
$stmt1 -> bind_param('iissiiis',$order_id,$product_id,$product_name,$product_image,$product_price,$product_quantity,$user_id,$order_date);
$stmt1->execute();

}
  




  //5 remove cart
  unset($_SESSION['cart']);
  unset($_SESSION['total']);
  unset($_SESSION['quantity']);

  //6 inform user whether

header('location:../payment.php?order_status="Заказ успешно размещен"');

}}

?>