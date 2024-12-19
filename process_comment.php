<?php
// Подключение к базе данных
$mysqli = new mysqli("localhost", "j16283401", "Nejd6P3c2D", "j16283401");

// Проверка подключения
if ($mysqli->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
}

// Получение данных из формы
$username = $_POST['username'];
$comment = $_POST['comment'];

// Вставка комментария в базу данных
$sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";
$result = $mysqli->query($sql);

// Перенаправление на главную страницу после добавления комментария
header("Location: index.php");
exit();

$mysqli->close();

?>
