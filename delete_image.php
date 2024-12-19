<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn = new mysqli("localhost", "j16283401", "Nejd6P3c2D", "j16283401");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Удаляем изображение из базы данных
    $query = "DELETE FROM images WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Возвращаем успех в формате JSON
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false]);
}
?>


