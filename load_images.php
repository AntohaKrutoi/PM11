<?php
$conn = new mysqli("localhost", "j16283401", "Nejd6P3c2D", "j16283401");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Выбираем поле 'id' в запросе
$query = "SELECT id, image_url, description FROM images";
$result = $conn->query($query);

$images = [];
while ($row = $result->fetch_assoc()) {
    $images[] = $row;
}

// Возвращаем данные в формате JSON
header('Content-Type: application/json');
echo json_encode($images);
?>
