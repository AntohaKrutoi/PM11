<?php
// Подключение к базе данных
$conn = new mysqli("localhost", "j16283401", "Nejd6P3c2D", "j16283401");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$appointmentId = isset($_GET['id']) ? $_GET['id'] : null;

if ($appointmentId) {
    // Обновляем статус записи на "completed"
    $query = "UPDATE appointments SET status = 'completed' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $appointmentId);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID не передан']);
}

$conn->close();
?>
