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
            $_SESSION['cart'] = []; // Инициализируем корзину, если она еще не существует
        }

        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++; // Увеличиваем количество, если товар уже в корзине
        } else {
            // Добавляем новый товар в корзину
            $_SESSION['cart'][$product_id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1 // Устанавливаем количество в 1
            ];
        }
    }
}

// Перенаправляем пользователя обратно в корзину
header("Location: cart.html");
exit();
?>