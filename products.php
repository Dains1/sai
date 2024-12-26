<?php
require_once 'db.php';  // Подключаем базу данных

// Получаем список товаров из базы данных
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div><strong>Наш чай</strong></div>
        <nav>
            <a href="index.html">Главная</a>
            <a href="cart.html">Корзина</a>
            <a href="products.php">Товары</a>
            <a href="registration.html" class="button">Зарегистрируйтесь</a>
            <a href="authorization.html" class="button">Авторизация</a>
        </nav>
    </header>
    <main>
        <h1>Товары</h1>
        <section class="products">
            <?php while($product = $result->fetch_assoc()): ?>
            <div class="product">
                <img src="https://via.placeholder.com/300x400" alt="<?= $product['name'] ?>">
                <h3><?= $product['name'] ?></h3>
                <p>Цена: <?= $product['price'] ?> рублей</p>
                <button onclick="addToCart(<?= $product['id'] ?>)">Добавить в корзину</button>
            </div>
            <?php endwhile; ?>
        </section>
    </main>
    <footer>
        <p>Наш чай &copy; 2024</p>
    </footer>
</body>
</html>