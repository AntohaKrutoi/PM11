<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']) && isset($_POST['description'])) {
    // Подключаемся к базе данных
    $conn = new mysqli("localhost", "j16283401", "Nejd6P3c2D", "j16283401");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Получаем описание
    $description = $conn->real_escape_string($_POST['description']);

    // Обрабатываем загрузку файла
    $target_dir = "images/gallery/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Проверка, является ли файл изображением
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Загружаем файл
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Вставляем запись в базу данных
            $sql = "INSERT INTO images (image_url, description) VALUES ('$target_file', '$description')";
            if ($conn->query($sql) === TRUE) {
                // Успех, отправляем JSON-ответ
                echo json_encode(['success' => true, 'message' => 'Изображение успешно загружено!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Ошибка при добавлении изображения в базу данных.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Ошибка загрузки файла.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Это не изображение.']);
    }

    $conn->close();
}
?>
