<?php
session_start();

// Подключение к базе данных
$mysqli = new mysqli("localhost", "j16283401", "Nejd6P3c2D", "j16283401");

// Проверка подключения
if ($mysqli->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
}

// Получение данных из формы
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Пример SQL-запроса для проверки данных пользователя
$query = "SELECT * FROM admins WHERE username = '$username' AND email = '$email' AND password = '$password'";
$result = $mysqli->query($query);

// Проверка результата запроса
if ($result->num_rows > 0) {
    // Авторизация успешна, сохраняем информацию о пользователе в сессии
    $_SESSION["username"] = $username;
    header("Location: admin.php"); // Перенаправление на админскую страницу
} else {
    echo "Неверные данные.";
}

// Закрытие соединения с базой данных
$mysqli->close();