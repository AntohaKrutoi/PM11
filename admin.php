<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Парикмахерская «Рандеву»</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,600;1,300&display=swap" rel="stylesheet">
                
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/magnific-popup.css" rel="stylesheet">

        <link href="css/styles.css" rel="stylesheet">

        <?php
        session_start();

        // Проверяем, авторизован ли пользователь
        if (!isset($_SESSION["username"])) {
        header("Location: login.php"); // Перенаправление на страницу входа, если не авторизован
        }      
        ?>

        <?php
        $servername = "localhost";
        $login = "j16283401";
        $password = "Nejd6P3c2D";
        $dbname = "j16283401";

        $conn = new mysqli($servername, $login, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>

    </head>
    
    <body>

        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container">

                <a href="index.php" class="navbar-brand-admin">
                    <i class="bi-scissors" style="width: 60px; height: auto;"></i>Рандеву
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5">
                        <li class="nav-item">
                            <a class="nav-link" href="#section_2">Админ-панель</a>
                        </li>
                    </ul>

                    <div class="ms-auto d-none d-lg-block">
                        <a href="index.php" class="custom-btn btn btn-lg">
                            Главная
                            <i class="bi-triangle-fill ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <main>

            <section class="about section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                        </div>

                        <div class="col-lg-6 col-12 ms-lg-auto mb-5 mb-lg-0">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-add-news-tab" data-bs-toggle="tab" data-bs-target="#nav-add-news" type="button" role="tab" aria-controls="nav-add-news" aria-selected="true">Записи</button>

                                    <button class="nav-link" id="nav-edit-news-tab" data-bs-toggle="tab" data-bs-target="#nav-edit-news" type="button" role="tab" aria-controls="nav-edit-news" aria-selected="false">Галерея</button>

                                    <button class="nav-link" id="nav-logs-tab" data-bs-toggle="tab" data-bs-target="#nav-logs" type="button" role="tab" aria-controls="nav-logs" aria-selected="false">Статистика</button>

                                    <button class="nav-link" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews" type="button" role="tab" aria-controls="nav-reviews" aria-selected="false">Отзывы</button>
                                </div>
                            </nav>
                        </div>

                        <div class="col-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-add-news" role="tabpanel" aria-labelledby="nav-add-news-tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-12 my-2">
                                            <h3 class="mb-3">Записи</h3>
                                            
                                            <!-- Таблица для отображения активных записей -->
                                            <h4>Активные записи</h4>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Имя</th>
                                                        <th>Телефон</th>
                                                        <th>Email</th>
                                                        <th>Барбер</th>
                                                        <th>Услуга</th>
                                                        <th>Дата и время</th>
                                                        <th>Действия</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="appointments-list">
                                                    <!-- Здесь будут отображаться активные записи -->
                                                </tbody>
                                            </table>

                                            <!-- Таблица для отображения завершенных записей -->
                                            <h4>Завершенные записи</h4>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Имя</th>
                                                        <th>Телефон</th>
                                                        <th>Email</th>
                                                        <th>Барбер</th>
                                                        <th>Услуга</th>
                                                        <th>Дата и время</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="completed-appointments-list">
                                                    <!-- Здесь будут отображаться завершенные записи -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', () => {
                                        // Загружаем все активные записи с сервера
                                        fetch('load_appointments.php?status=pending')
                                            .then(response => {
                                                if (!response.ok) {
                                                    throw new Error(`Ошибка сервера: ${response.statusText}`);
                                                }
                                                return response.json();
                                            })
                                            .then(data => {
                                                console.log("Активные записи:", data);
                                                const appointmentsList = document.getElementById('appointments-list');
                                                data.forEach(appointment => {
                                                    appointmentsList.innerHTML += `
                                                        <tr id="appointment-${appointment.id}">
                                                            <td>${appointment.id}</td>
                                                            <td>${appointment.full_name}</td>
                                                            <td>${appointment.phone}</td>
                                                            <td>${appointment.email}</td>
                                                            <td>${appointment.barber_name}</td>
                                                            <td>${appointment.service_name}</td>
                                                            <td>${appointment.service_datetime}</td>
                                                            <td>
                                                                <button class="btn btn-danger btn-sm delete-appointment" data-id="${appointment.id}">Удалить</button>
                                                                <button class="btn btn-success btn-sm complete-appointment" data-id="${appointment.id}">Завершено</button>
                                                            </td>
                                                        </tr>
                                                    `;
                                                });

                                                // Обработчик для кнопок удаления
                                                document.querySelectorAll('.delete-appointment').forEach(button => {
                                                    button.addEventListener('click', (e) => {
                                                        const appointmentId = e.target.getAttribute('data-id');
                                                        if (!appointmentId) {
                                                            console.error("ID записи не найдено.");
                                                            return;
                                                        }

                                                        // Отправляем запрос на удаление записи
                                                        fetch(`delete_appointment.php?id=${appointmentId}`, { method: 'GET' })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.success) {
                                                                    // Удаляем запись из DOM
                                                                    e.target.closest('tr').remove();
                                                                    alert('Запись удалена.');
                                                                } else {
                                                                    alert('Ошибка при удалении записи.');
                                                                }
                                                            })
                                                            .catch(error => console.error('Ошибка при удалении записи:', error));
                                                    });
                                                });

                                                // Обработчик для кнопок завершения
                                                document.querySelectorAll('.complete-appointment').forEach(button => {
                                                    button.addEventListener('click', (e) => {
                                                        const appointmentId = e.target.getAttribute('data-id');
                                                        if (!appointmentId) {
                                                            console.error("ID записи не найдено.");
                                                            return;
                                                        }

                                                        // Отправляем запрос на завершение записи
                                                        fetch(`complete_appointment.php?id=${appointmentId}`, { method: 'GET' })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.success) {
                                                                    // Изменяем текст кнопки на "Завершено"
                                                                    e.target.closest('tr').querySelector('.complete-appointment').innerText = 'Завершено';
                                                                    e.target.closest('tr').querySelector('.complete-appointment').disabled = true;
                                                                    alert('Запись завершена.');

                                                                    // Перемещаем запись в таблицу завершенных
                                                                    const completedAppointmentsList = document.getElementById('completed-appointments-list');
                                                                    completedAppointmentsList.innerHTML += `
                                                                        <tr id="completed-appointment-${appointmentId}">
                                                                            <td>${appointmentId}</td>
                                                                            <td>${appointment.full_name}</td>
                                                                            <td>${appointment.phone}</td>
                                                                            <td>${appointment.email}</td>
                                                                            <td>${appointment.barber_name}</td>
                                                                            <td>${appointment.service_name}</td>
                                                                            <td>${appointment.service_datetime}</td>
                                                                        </tr>
                                                                    `;

                                                                    // Удаляем из активной таблицы
                                                                    e.target.closest('tr').remove();
                                                                } else {
                                                                    alert('Ошибка при завершении записи.');
                                                                }
                                                            })
                                                            .catch(error => console.error('Ошибка при завершении записи:', error));
                                                    });
                                                });
                                            })
                                            .catch(error => {
                                                console.error('Ошибка при загрузке активных записей:', error);
                                                alert('Произошла ошибка при загрузке активных записей.');
                                            });

                                        // Загружаем завершенные записи с сервера
                                        fetch('load_appointments.php?status=completed')
                                            .then(response => {
                                                if (!response.ok) {
                                                    throw new Error(`Ошибка сервера: ${response.statusText}`);
                                                }
                                                return response.json();
                                            })
                                            .then(data => {
                                                console.log("Завершенные записи:", data);
                                                const completedAppointmentsList = document.getElementById('completed-appointments-list');
                                                data.forEach(appointment => {
                                                    completedAppointmentsList.innerHTML += `
                                                        <tr id="completed-appointment-${appointment.id}">
                                                            <td>${appointment.id}</td>
                                                            <td>${appointment.full_name}</td>
                                                            <td>${appointment.phone}</td>
                                                            <td>${appointment.email}</td>
                                                            <td>${appointment.barber_name}</td>
                                                            <td>${appointment.service_name}</td>
                                                            <td>${appointment.service_datetime}</td>
                                                        </tr>
                                                    `;
                                                });
                                            })
                                            .catch(error => {
                                                console.error('Ошибка при загрузке завершенных записей:', error);
                                                alert('Произошла ошибка при загрузке завершенных записей.');
                                            });
                                    });
                                </script>



                                <div class="tab-pane fade" id="nav-edit-news" role="tabpanel" aria-labelledby="nav-edit-news-tab">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 my-2">
                                            <h3 class="mb-3">Галерея</h3>

                                            <!-- Модальное окно -->
                                            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="successModalLabel">Успех!</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Изображение успешно добавлено!
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="custom-btn btn btn-lg" data-bs-dismiss="modal" onclick="location.reload();">ОК</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', () => {
                                                    const form = document.querySelector('form');
                                                    
                                                    form.addEventListener('submit', (event) => {
                                                        event.preventDefault(); // Предотвращаем стандартное поведение формы

                                                        const formData = new FormData(form); // Создаем FormData для отправки файла и других данных

                                                        fetch('upload_image.php', {
                                                            method: 'POST',
                                                            body: formData
                                                        })
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            if (data.success) {
                                                                // Если добавление прошло успешно, показываем модальное окно
                                                                $('#successModal').modal('show');
                                                            } else {
                                                                alert('Ошибка при добавлении изображения: ' + data.message);
                                                            }
                                                        })
                                                        .catch(error => {
                                                            console.error('Ошибка при добавлении изображения:', error);
                                                            alert('Произошла ошибка.');
                                                        });
                                                    });
                                                });
                                            </script>

                                            <!-- Форма для добавления фотографий -->
                                            <form action="upload_image.php" method="POST" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Выберите изображение</label>
                                                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Описание изображения</label>
                                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                                </div>
                                                <button type="submit" class="custom-btn btn btn-lg">Добавить изображение</button>
                                            </form>
                                        </div>
                                    </div>

                                <!-- Раздел для просмотра всех изображений -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h4>Все изображения в галерее</h4>
                                            <div id="gallery-container" class="d-flex flex-wrap">
                                                <!-- Загруженные изображения будут отображаться здесь -->
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', () => {
                                            // Загружаем все изображения с сервера
                                            fetch('load_images.php')
                                                .then(response => response.json())
                                                .then(data => {
                                                    const container = document.getElementById('gallery-container');
                                                    data.forEach(img => {
                                                        // Используем img.id, так как id теперь передается из сервера
                                                        container.innerHTML += `
                                                            <div class="col-12 col-md-4 mb-4" id="photo-${img.id}">
                                                                <div class="card">
                                                                    <img src="${img.image_url}" class="card-img-top" alt="${img.description}">
                                                                    <div class="card-body">
                                                                        <p class="card-text">${img.description}</p>
                                                                        <!-- Кнопка для удаления фото -->
                                                                        <button class="btn btn-danger btn-sm delete-photo" data-id="${img.id}">Удалить</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        `;
                                                    });

                                                    // Добавляем обработчик для кнопок удаления
                                                    document.querySelectorAll('.delete-photo').forEach(button => {
                                                        button.addEventListener('click', (e) => {
                                                            const photoId = e.target.getAttribute('data-id');

                                                            if (!photoId) {
                                                                console.error("ID фотографии не найдено.");
                                                                return;
                                                            }

                                                            // Отправляем запрос на удаление фото
                                                            fetch(`delete_image.php?id=${photoId}`, { method: 'GET' })
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    if (data.success) {
                                                                        // Удаляем изображение из DOM
                                                                        e.target.closest('.col-12').remove();
                                                                        alert('Изображение удалено.');
                                                                    } else {
                                                                        alert('Ошибка при удалении изображения.');
                                                                    }
                                                                })
                                                                .catch(error => console.error('Ошибка при удалении:', error));
                                                        });
                                                    });
                                                })
                                                .catch(error => console.error('Ошибка при загрузке изображений:', error));
                                        });
                                    </script>
                                    <style>
                                        #gallery-container .card {
                                            width: 100%; /* Карточки занимают всю ширину контейнера */
                                            height: 250px; /* Фиксированная высота для карточек */
                                        }

                                        #gallery-container img {
                                            width: 100%;
                                            height: 100%;
                                            object-fit: cover; /* Чтобы изображение заполнило карточку, не искажая пропорции */
                                            border-radius: 10px;
                                        }

                                        #gallery-container .card-body {
                                            padding: 10px;
                                        }

                                        /* Стили для текста */
                                        .card-text {
                                            font-size: 1em;
                                            color: #333;
                                        }

                                        .delete-photo {
                                            margin-top: 10px;
                                            width: 100%;
                                        }
                                    </style>
                                </div>


                                <div class="tab-pane fade" id="nav-logs" role="tabpanel" aria-labelledby="nav-logs-tab">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 my-2">
                                            <h3 class="mb-3">Статистика</h3>

                                            <!-- Модальное окно подтверждения очистки логов -->
                                            <div class="modal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Вы уверены, что хотите очистить логи?</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Это действие нельзя отменить.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="custom-btn btn btn-lg" data-bs-dismiss="modal">Отмена</button>
                                                            <button type="button" class="custom-btn btn btn-lg" onclick="clearLogs()">Да</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                            // Отображение статистики
                                            $logQuery = "SELECT * FROM site_visits ORDER BY visit_time DESC LIMIT 10"; // Ограничим количество логов
                                            $logResult = $conn->query($logQuery);

                                            // Статистика
                                            $totalVisitsQuery = "SELECT COUNT(*) as totalVisits FROM site_visits";
                                            $uniqueIPsQuery = "SELECT COUNT(DISTINCT ip_address) as uniqueIPs FROM site_visits";

                                            $totalVisitsResult = $conn->query($totalVisitsQuery);
                                            $uniqueIPsResult = $conn->query($uniqueIPsQuery);

                                            $totalVisits = $totalVisitsResult->fetch_assoc()['totalVisits'];
                                            $uniqueIPs = $uniqueIPsResult->fetch_assoc()['uniqueIPs'];
                                            ?>

                                            <p>Общее количество посещений: <?php echo $totalVisits; ?></p>
                                            <p>Уникальные IP-адреса: <?php echo $uniqueIPs; ?></p>

                                            <!-- Кнопка для отображения/скрытия логов -->
                                            <button class="custom-btn btn btn-lg" onclick="toggleLogs()">Показать/Скрыть логи</button>

                                            <!-- Таблица с логами -->
                                            <div id="logs-table" style="display:none; margin-top: 20px;">
                                                <h4>Последние 10 посещений</h4>
                                                <?php
                                                if ($logResult->num_rows > 0) {
                                                    echo "<table class='table table-striped'>";
                                                    echo "<thead><tr><th>ID</th><th>IP-адрес</th><th>Время посещения</th></tr></thead>";
                                                    echo "<tbody>";
                                                    while ($row = $logResult->fetch_assoc()) {
                                                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['ip_address'] . "</td><td>" . $row['visit_time'] . "</td></tr>";
                                                    }
                                                    echo "</tbody></table>";
                                                } else {
                                                    echo "<p>Логи посещений отсутствуют.</p>";
                                                }
                                                ?>
                                            </div>

                                            <!-- Кнопка очистки логов -->
                                            <form id="clearLogsForm">
                                                <input type="button" value="Очистить логи" onclick="showConfirmClearModal()" class="custom-btn btn btn-lg">
                                            </form>

                                            <div id="resultMessage"></div>

                                            <script>
                                            // Функция для отображения/скрытия таблицы логов
                                            function toggleLogs() {
                                                var logsTable = document.getElementById('logs-table');
                                                if (logsTable.style.display === "none") {
                                                    logsTable.style.display = "block";
                                                } else {
                                                    logsTable.style.display = "none";
                                                }
                                            }

                                            // Добавьте обработчик клика для кнопки "Очистить логи"
                                            function showConfirmClearModal() {
                                                // Отображение модального окна подтверждения
                                                $('.modal').modal('show');
                                            }

                                            // Функция для очистки логов
                                            function clearLogs() {
                                                // Создаем объект XMLHttpRequest
                                                var xhr = new XMLHttpRequest();

                                                // Открываем асинхронный POST-запрос на clear_logs.php
                                                xhr.open("POST", "clear_logs.php", true);

                                                // Устанавливаем заголовки для передачи данных формы
                                                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                                                // Обработчик события изменения состояния запроса
                                                xhr.onreadystatechange = function () {
                                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                                        // Выводим сообщение в див
                                                        document.getElementById("resultMessage").innerHTML = xhr.responseText;

                                                        // Перезагружаем страницу
                                                        location.reload();
                                                    }
                                                };

                                                // Отправляем запрос
                                                xhr.send();
                                            }
                                            </script>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 my-2">
                                            
                                        <h3 class="mb-3 mt-4">Отзывы</h3>       
                                        <?php
                                        // Подключение к базе данных
                                        $mysqli = new mysqli("localhost", "j16283401", "Nejd6P3c2D", "j16283401");

                                        // Проверка подключения
                                        if ($mysqli->connect_error) {
                                            die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
                                        }

                                        // Получение комментариев из базы данных
                                        $sql = "SELECT * FROM comments ORDER BY timestamp DESC";
                                        $result = $mysqli->query($sql);

                                        // Вывод комментариев
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<p><strong>{$row['username']}</strong> ({$row['timestamp']}):<br>{$row['comment']}</p>";
                                            
                                            // Добавление кнопки удаления для каждого комментария
                                            echo "<form class='delete-comment-form' method='post' action='delete_comment.php'>";
                                            echo "<input type='hidden' name='comment_id' value='{$row['id']}'>";
                                            echo "<input type='submit' value='Удалить комментарий' class='form-control custom-btn btn btn-lg mb-3'>";
                                            echo "</form>";
                                        }

                                        $mysqli->close();
                                        ?>

                                        <!-- Добавление скрипта JavaScript для отображения модального окна -->
                                        <script>
                                            // Находим все формы с классом 'delete-comment-form'
                                            const deleteForms = document.querySelectorAll('.delete-comment-form');

                                            // Добавляем обработчик события для каждой формы
                                            deleteForms.forEach(form => {
                                                form.addEventListener('submit', function (event) {
                                                    event.preventDefault(); // Предотвращаем отправку формы по умолчанию

                                                    // Отображаем модальное окно подтверждения
                                                    const confirmation = confirm("Вы уверены, что хотите удалить комментарий?");

                                                    // Если пользователь подтвердил удаление
                                                    if (confirmation) {
                                                        // Отображаем модальное окно
                                                        const modal = document.createElement('div');
                                                        modal.className = 'modal';
                                                        modal.innerHTML = `
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Вы уверены, что хотите удалить комментарий?</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Это действие нельзя отменить.</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="custom-btn btn btn-lg" data-bs-dismiss="modal">Отмена</button>
                                                                        <button type="button" class="custom-btn btn btn-lg" onclick="clearLogs()">Да</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        `;
                                                        document.body.appendChild(modal);

                                                        // Выполняем запрос на удаление комментария
                                                        const commentId = this.querySelector('input[name="comment_id"]').value;
                                                        fetch('delete_comment.php', {
                                                            method: 'POST',
                                                            body: new URLSearchParams({ 'comment_id': commentId }),
                                                            headers: {
                                                                'Content-Type': 'application/x-www-form-urlencoded',
                                                            },
                                                        })
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            // Отображаем модальное окно с сообщением
                                                            alert(data.message);
                                                            // Удаляем модальное окно после закрытия
                                                            document.body.removeChild(modal);
                                                            // Перезагружаем страницу
                                                            location.reload();
                                                        })
                                                        .catch(error => console.error('Error:', error));
                                                    }
                                                });
                                            });


                                        </script>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-2 col-12 mx-auto my-lg-0 my-4">
                        <h5 class="text-white mb-3">Контакты</h5>

                        <a href="https://www.google.ru/maps/place/%D0%A0%D0%B0%D0%BD%D0%B4%D0%B5%D0%B2%D1%83/@52.0407927,113.4951772,19z/data=!3m1!4b1!4m6!3m5!1s0x5dca3545e24a690b:0x5520e13a207b7dde!8m2!3d52.0407919!4d113.4963949!16s%2Fg%2F12qfk4_21?hl=ru&entry=ttu&g_ep=EgoyMDI0MTIwMS4xIKXMDSoASAFQAw%3D%3D" class="text-white mb-1 footer-link bi-pin-map-fill"> г. Чита, ул. Бабушкина, 149</a>

                        <a href="#" class="text-white mb-1 footer-link bi-telephone-fill"> +7‒924‒371‒18‒33</a>

                        <a href="#" class="text-white mb-1 footer-link bi-telephone-fill"> +7‒924‒275‒33‒37</a>

                        <a href="#" class="text-white mb-1 footer-link bi-chat-text-fill"> example@mail.ru</a>

                        <p class="text-white mb-1 footer-link bi-watch"> Ежедневно с 10:00 до 20:00</p>
                    </div>

                    <div class="site-footer-bottom mt-5">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-12">
                                <p class="copyright-text echo-link"><a href="#" class="footer-menu-link"></a>© 2024 ИП «Юхимчук Н. В.»</a>
                                <br>Разработан <a href="#" class="footer-menu-link">@skryn_ant</a></p>
                                <br><p class="copyright-text echo-link bi-patch-question-fill"> <a href="comment_page.php" class="footer-menu-link">Оставить отзыв о нашей работе</a></p>
                            </div>

                            <div class="col-lg-3 col-12 ms-auto">
                                <ul class="social-icon">
                                    <li><a href="#" class="social-icon-link bi-telegram"></a></li>

                                    <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                                    <li><a href="login.php" class="social-icon-link bi-terminal"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>
        
    </body>
</html>
