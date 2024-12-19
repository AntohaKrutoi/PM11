<?php

// Подключение к базе данных
$servername = "localhost";
$login = "j16283401";
$password = "Nejd6P3c2D";
$dbname = "j16283401";

$conn = new mysqli($servername, $login, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Очистка логов
$clearLogsQuery = "TRUNCATE TABLE site_visits";
if ($conn->query($clearLogsQuery) === TRUE) {
    echo "Логи успешно очищены.";
} else {
    echo "Ошибка очистки логов: " . $conn->error;
}

$conn->close();

?>