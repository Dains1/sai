<?php
include 'db.php'; // Подключаем файл с настройками базы данных

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Подготовленный запрос для предотвращения SQL-инъекций
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Успешная авторизация
        echo "Вход успешен!";
        
        // Перенаправление на главную страницу после успешной авторизации
        header("Location: index copy.html");
        exit();
    } else {
        echo "Неверное имя пользователя или пароль.";
    }
}
?>