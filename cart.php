<?php
session_start();
include 'db.php'; // Подключаем файл с настройками базы данных

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);
    
    // Проверяем, существует ли товар
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    if ($product) {
        // Добавляем товар в сессию корзины
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' =>
                'quantity' => 1
            ];
        }
    }
}

// Перенаправляем пользователя обратно в корзину
header("Location: cart.html");
exit();
?>