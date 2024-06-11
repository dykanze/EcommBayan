<?php 
session_start();
include('server/connection.php');

if(!isset($_POST['pay_now'])){
  header('location: index.php');
  exit;
}

$order_status = $_POST['order_status'];
$order_total_price = $_POST['order_total_price'];
$user_id = $_SESSION['user_id'];

// Здесь добавьте логику для обработки оплаты, например, интеграцию с платежной системой

// Если оплата успешна, обновите статус заказа в базе данных
$stmt = $conn->prepare("UPDATE orders SET order_status='Paid' WHERE user_id=? AND order_status='Not paid'");
$stmt->bind_param('i', $user_id);
$stmt->execute();

// Очистите корзину
unset($_SESSION['cart']);
unset($_SESSION['total']);
unset($_SESSION['quantity']);

header('location: confirmation.php');
exit;
?>
