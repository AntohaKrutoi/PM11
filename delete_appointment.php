<?php
if (isset($_GET['id'])) {
    $appointmentId = (int)$_GET['id'];
    
    $conn = new mysqli("localhost", "j16283401", "Nejd6P3c2D", "j16283401");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Удаляем запись
    $sql = "DELETE FROM appointments WHERE id = $appointmentId";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ошибка при удалении записи']);
    }

    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'ID записи не передан']);
}
?>

