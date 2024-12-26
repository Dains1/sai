<?php
$host = 'localhost'; // или IP-адрес вашего сервера
$db = 'tea_shop'; // имя вашей базы данных
$user = 'root'; // ваше имя пользователя MySQL
$pass = '1111'; // ваш пароль MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}
?>