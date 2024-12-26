<?php
include 'db.php'; // Подключаем файл с настройками базы данных

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хешируем пароль

     // Проверка на совпадение паролей
     if ($_POST['password'] !== $_POST['confirm-password']) {
        echo "Пароли не совпадают.";
        exit;
    }

    // Подготовленный запрос для предотвращения SQL-инъекций
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);

    
    // Перенаправление на главную страницу после успешной регистрации
    header("Location: index copy.html");
    exit();
}
