<?php
// Подключение к базе данных
$mysqli = new mysqli("localhost", "j16283401", "Nejd6P3c2D", "j16283401");

// Проверка подключения
if ($mysqli->connect_error) {
    die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
}

// Обработка запроса на удаление комментария
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_id = $_POST['comment_id'];

    // Запрос на удаление комментария из базы данных
    $delete_sql = "DELETE FROM comments WHERE id = $comment_id";
    $result = $mysqli->query($delete_sql);

    if ($result) {
        // Возвращаем JSON с сообщением об успешном удалении
        echo json_encode(['message' => 'Комментарий успешно удален']);
    } else {
        // Возвращаем JSON с сообщением об ошибке
        echo json_encode(['message' => 'Произошла ошибка при удалении комментария']);
    }
}

$mysqli->close();
?>
