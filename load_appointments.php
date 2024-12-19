<?php
// Подключение к базе данных
$conn = new mysqli("localhost", "j16283401", "Nejd6P3c2D", "j16283401");
;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем параметр 'status' из GET-запроса (по умолчанию 'pending')
$status = isset($_GET['status']) ? $_GET['status'] : 'pending';

// Формируем SQL-запрос в зависимости от статуса
if ($status === 'pending') {
    // Загружаем записи с статусом 'pending'
    $query = "
        SELECT a.id, a.full_name, a.phone, a.email, b.name AS barber_name, s.name AS service_name, a.service_datetime
        FROM appointments a
        LEFT JOIN barbers b ON a.barber_id = b.id
        LEFT JOIN services s ON a.service_id = s.id
        WHERE a.status = 'pending'
        ORDER BY a.service_datetime ASC
    ";
} else if ($status === 'completed') {
    // Загружаем записи с статусом 'completed'
    $query = "
        SELECT a.id, a.full_name, a.phone, a.email, b.name AS barber_name, s.name AS service_name, a.service_datetime
        FROM appointments a
        LEFT JOIN barbers b ON a.barber_id = b.id
        LEFT JOIN services s ON a.service_id = s.id
        WHERE a.status = 'completed'
        ORDER BY a.service_datetime DESC
    ";
} else {
    // Если передан неверный статус, возвращаем ошибку
    echo json_encode(["error" => "Invalid status"]);
    exit;
}

// Выполняем запрос к базе данных
$result = $conn->query($query);

// Проверяем, есть ли результаты
$appointments = [];
if ($result->num_rows > 0) {
    // Собираем все записи в массив
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
}

// Возвращаем результаты как JSON
header('Content-Type: application/json');
echo json_encode($appointments);

// Закрываем соединение
$conn->close();
?>
