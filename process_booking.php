<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); // Включаем отображение ошибок для отладки

$servername = "localhost";
$login = "j16283401";
$password = "Nejd6P3c2D";
$dbname = "j16283401";

// Создаем подключение
$conn = new mysqli($servername, $login, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверяем, приходят ли данные
if (!isset($_POST['fullName'], $_POST['phone'], $_POST['email'], $_POST['barber'], $_POST['service'], $_POST['service_date'], $_POST['service_time'])) {
    echo 'Данные не получены';
    print_r($_POST); // Добавим вывод данных, чтобы увидеть, что пришло
    exit;
}

$fullName = $_POST['fullName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$barber = $_POST['barber'];  // ID выбранного парикмахера
$service = $_POST['service'];  // ID выбранной услуги
$service_date = $_POST['service_date'];  // Дата услуги
$service_time = $_POST['service_time'];  // Время услуги

// Создаем строку для полного времени (дата и время)
$service_datetime = $service_date . ' ' . $service_time;

// Создаем SQL-запрос для добавления данных о записи
$sql = "INSERT INTO appointments (full_name, phone, email, barber_id, service_id, service_datetime)
        VALUES ('$fullName', '$phone', '$email', '$barber', '$service', '$service_datetime')";

// Выполняем запрос
if ($conn->query($sql) === TRUE) {
    echo "Успешно";
} else {
    echo "Ошибка: " . $conn->error;
}

// Закрываем соединение
$conn->close();
?>
