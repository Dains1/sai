<?php
session_start();

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]); // Удаляем товар из корзины
    }
}

// Перенаправляем пользователя обратно в корзину
header("Location: cart.html");
exit();
?>