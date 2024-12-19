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
        // Логирование посещения главной страницы
        $servername = "localhost";
        $login = "j16283401";
        $password = "Nejd6P3c2D";
        $dbname = "j16283401";

        $conn = new mysqli($servername, $login, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $sql = "INSERT INTO site_visits (ip_address) VALUES ('$ipAddress')";

        if ($conn->query($sql) === TRUE) {
            // Лог успешно добавлен
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>

    </head>
    
    <body>

        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container">

                <a href="index.php" class="navbar-brand">
                    <i class="bi-scissors" style="width: 60px; height: auto;"></i>Рандеву
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5">
                        <li class="nav-item">
                            <a class="nav-link" href="#section_1">Главная</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#section_2">О нас</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#section_3">Цены</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#section_4">Галерея</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#section_5">Запись</a>
                        </li>
                    </ul>

                    <div class="ms-auto d-none d-lg-block">
                        <a href="#section_5" class="custom-btn btn btn-lg">
                            Записаться
                            <i class="bi-scissors ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <main>

            <section class="hero d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12">
                            <div class="heroText">
                                <h1 class="text-white mb-lg-5 mb-4">Создайте идеальный образ!</h1>

                                <a href="#section_5" class="custom-btn btn btn-lg">
                                    Записаться
                                    <i class="bi-scissors ms-2" style="width: auto; height: 30px;"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="overlay"></div>
            </section>

            <section class="about section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <h2 class="mb-5">О нас</h2>
                        </div>

                        <div class="col-lg-4 col-12 ms-lg-auto mb-5 mb-lg-0">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-intro-tab" data-bs-toggle="tab" data-bs-target="#nav-intro" type="button" role="tab" aria-controls="nav-intro" aria-selected="true">Команда</button>

                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Услуги</button>
                                </div>
                            </nav>
                        </div>

                        <div class="col-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-intro" role="tabpanel" aria-labelledby="nav-intro-tab">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-lg-0 mb-4">
                                            <img src="images/team.jpg" class="img-fluid" alt="">
                                        </div>

                                        <div class="col-lg-5 col-12 m-auto">
                                            <h3 class="mb-3">Наша команда</h3>

                                            <p>В нашем дружном коллективе работают только высококвалифицированные специалисты, которые постоянно совершенствуют свои навыки и следят за последними трендами в мире красоты.</p>

                                            <p>Каждый из наших мастеров – это не только профессионал, но и человек, который искренне любит свою работу и заботится о каждом клиенте.</p>

                                            <p>Мы гордимся тем, что у нас есть команда, способная предложить индивидуальный подход к каждому клиенту, учитывая его пожелания и особенности.</p>

                                            <p>Наша цель – создать атмосферу доверия и комфорта, чтобы вы могли расслабиться и насладиться процессом преображения.</p>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        <div class="col-lg-5 col-12 m-auto">
                                        <h3 class="mb-3">Наши услуги</h3>

                                            <p>Мы предлагаем широкий спектр парикмахерских услуг, включая стрижки, укладки, окрашивание и уход за волосами, чтобы удовлетворить любые ваши потребности.</p>

                                            <p>Наши мастера используют только качественные продукты и современные техники, чтобы гарантировать отличный результат и удовлетворение клиентов.</p>

                                            <p>Каждая услуга разрабатывается с учетом индивидуальных особенностей и пожеланий, чтобы вы всегда выходили от нас с улыбкой и уверенностью в своем образе.</p>

                                            <p>Мы стремимся создать атмосферу, в которой вы сможете расслабиться и довериться нашим специалистам, зная, что ваши волосы в надежных руках.</p>
                                        </div>

                                        <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                                            <img src="images/services.jpg" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="services section-padding" id="section_3">
                <div class="container">
                    <div class="row">
                        <h2 class="mb-5 text-center">Прайс-лист</h2>

                        <!-- Мужская стрижка -->
                        <div class="col-lg-4 col-12 d-flex flex-column align-items-center p-4 service-item">
                            <img src="images/services/man_haircut.svg" class="img-fluid services-image" alt="Мужская стрижка">
                            <div class="services-info text-center mt-3">
                                <h4>Мужская стрижка</h4>
                                <p>Простая стрижка: 700–1000 руб.<br>Модельная стрижка: 1000–1500 руб.</p>
                                <p class="description">Классическая и модельная стрижка для мужчин любой сложности. Подходит для всех типов волос.</p>
                            </div>
                        </div>

                        <!-- Женская стрижка -->
                        <div class="col-lg-4 col-12 d-flex flex-column align-items-center p-4 service-item">
                            <img src="images/services/woman_haircut.svg" class="img-fluid services-image" alt="Женская стрижка">
                            <div class="services-info text-center mt-3">
                                <h4>Женская стрижка</h4>
                                <p>Короткие волосы: 1000–1500 руб.<br>Средние волосы: 1500–2500 руб.<br>Длинные волосы: 2000–3500 руб.</p>
                                <p class="description">Современные и классические стрижки для женщин. Стрижка с учётом структуры и особенностей волос.</p>
                            </div>
                        </div>

                        <!-- Детская стрижка -->
                        <div class="col-lg-4 col-12 d-flex flex-column align-items-center p-4 service-item">
                            <img src="images/services/kids_haircut.svg" class="img-fluid services-image" alt="Детская стрижка">
                            <div class="services-info text-center mt-3">
                                <h4>Детская стрижка</h4>
                                <p>Мальчики: 500–800 руб.<br>Девочки: 700–1000 руб.</p>
                                <p class="description">Аккуратные и безопасные стрижки для детей. Специалисты найдут подход к каждому ребёнку.</p>
                            </div>
                        </div>

                        <!-- Окрашивание волос -->
                        <div class="col-lg-4 col-12 d-flex flex-column align-items-center p-4 service-item">
                            <img src="images/services/coloring.svg" class="img-fluid services-image" alt="Окрашивание волос">
                            <div class="services-info text-center mt-3">
                                <h4>Окрашивание волос</h4>
                                <p>Корни: от 1500 руб.<br>Полное окрашивание: 2500–7000 руб.</p>
                                <p class="description">Профессиональное окрашивание в любые оттенки. Используем только качественные материалы.</p>
                            </div>
                        </div>

                        <!-- Укладка -->
                        <div class="col-lg-4 col-12 d-flex flex-column align-items-center p-4 service-item">
                            <img src="images/services/styling.svg" class="img-fluid services-image" alt="Укладка">
                            <div class="services-info text-center mt-3">
                                <h4>Укладка</h4>
                                <p>Дневная укладка: 700–1200 руб.<br>Свадебная укладка: 2000–5000 руб.</p>
                                <p class="description">Создание идеальной укладки на каждый день или для особого случая. Различные техники и стили.</p>
                            </div>
                        </div>

                        <!-- Оформление бороды -->
                        <div class="col-lg-4 col-12 d-flex flex-column align-items-center p-4 service-item">
                            <img src="images/services/beard.svg" class="img-fluid services-image" alt="Оформление бороды">
                            <div class="services-info text-center mt-3">
                                <h4>Оформление бороды</h4>
                                <p>Коррекция бороды: 500–1000 руб.<br>Комплекс с бритьём: 800–1500 руб.</p>
                                <p class="description">Профессиональное оформление бороды и усов. Чёткие контуры и уход за кожей лица.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="gallery section-padding" id="section_4">
                <div class="container">
                    <h2 class="mb-5 text-center">Галерея</h2>
                    <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Изображения будут подгружаться сюда -->
                        </div>
                        <a class="carousel-control-prev" href="#imageSlider" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#imageSlider" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>

                <style>
                    /* Стили для слайдера */
                    #imageSlider .carousel-inner .carousel-item {
                        position: relative;
                        overflow: hidden; /* Чтобы лишние части изображений не выходили за пределы контейнера */
                    }

                    #imageSlider .carousel-inner .carousel-item img {
                        width: 100% !important; /* Изображение будет занимать всю ширину контейнера */
                        height: 750px !important; /* Фиксированная высота для всех изображений на десктопах */
                        object-fit: cover !important; /* Изображение будет заполнять контейнер, не искажая пропорций */
                        border-radius: 15px !important; /* Закругление углов */
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important; /* Тень */
                        display: block !important; /* Чтобы изображение вело себя как блочный элемент */
                    }

                    /* Стили для описания */
                    #imageSlider .carousel-caption {
                        background-color: rgba(0, 0, 0, 0.6) !important; /* Прозрачный черный фон */
                        padding: 10px;
                        border-radius: 5px;
                        font-size: 1.2em;
                        text-align: center; /* Центрируем текст */
                    }

                    /* Стиль для тега <p> в описании */
                    #imageSlider .carousel-caption p {
                        color: white !important; /* Белый цвет текста */
                        margin: 0; /* Убираем отступы */
                        font-size: 1.2em;
                        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8); /* Тень для текста */
                    }

                    /* Адаптивные стили для мобильных устройств */
                    @media (max-width: 768px) {
                        #imageSlider .carousel-inner .carousel-item img {
                            height: 300px !important; /* Уменьшаем высоту на мобильных устройствах */
                        }
                    }

                </style>

                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        fetch('load_images.php')
                            .then(response => response.json())
                            .then(data => {
                                const container = document.querySelector('.carousel-inner');
                                data.forEach((img, index) => {
                                    const activeClass = index === 0 ? 'active' : '';
                                    container.innerHTML += `
                                        <div class="carousel-item ${activeClass}">
                                            <img src="${img.image_url}" class="d-block w-100" alt="${img.description}">
                                            <div class="carousel-caption d-none d-md-block">
                                                <p>${img.description}</p>
                                            </div>
                                        </div>
                                    `;
                                });
                            })
                            .catch(error => console.error('Error loading images:', error));
                    });
                </script>
            </section>


            <?php
            // Подключаем базу данных
            $servername = "localhost";
            $login = "j16283401";
            $password = "Nejd6P3c2D";
            $dbname = "j16283401"; // Название вашей базы данных

            // Создаем подключение
            $conn = new mysqli($servername, $login, $password, $dbname);

            // Проверяем соединение
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Получаем список парикмахеров из базы данных
            $barbers_query = "SELECT * FROM barbers";
            $barbers_result = $conn->query($barbers_query);

            // Получаем список услуг из базы данных
            $services_query = "SELECT * FROM services";
            $services_result = $conn->query($services_query);
            ?>

            <section class="section-padding" id="section_5">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <!-- Форма записи -->
                        <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                            <h3 class="mb-3 text-center">Записаться на услугу</h3>
                            <form class="custom-form" id="bookingForm" method="POST">
                                <div class="row justify-content-center">
                                    <div class="col-12 my-2">
                                        <label class="mb-2" for="barber">Выберите парикмахера</label>
                                        <select class="form-select" id="barber" name="barber" required>
                                            <option value="" disabled selected>Выберите парикмахера</option>
                                            <?php while ($barber = $barbers_result->fetch_assoc()) : ?>
                                                <option value="<?= $barber['id']; ?>"><?= $barber['name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <div class="col-12 my-2">
                                        <label class="mb-2" for="service">Выберите услугу</label>
                                        <select class="form-select" id="service" name="service" required>
                                            <option value="" disabled selected>Выберите услугу</option>
                                            <?php while ($service = $services_result->fetch_assoc()) : ?>
                                                <option value="<?= $service['id']; ?>"><?= $service['name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <div class="col-12 my-2">
                                        <label class="mb-2" for="service_date">Дата услуги</label>
                                        <input type="date" class="form-control" id="service_date" name="service_date" required>
                                    </div>

                                    <div class="col-12 my-2">
                                        <label class="mb-2" for="service_time">Время услуги</label>
                                        <input type="time" class="form-control" id="service_time" name="service_time" required>
                                    </div>

                                    <div class="col-12 my-2">
                                        <button type="button" class="form-control btn btn-primary mt-4" id="confirmButton" data-bs-toggle="modal" data-bs-target="#confirmationModal" disabled>
                                            Подтвердить запись
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Вставка карты -->
                        <div class="col-lg-6 col-md-12">
                            <iframe class="rounded-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d613.5345929166117!2d113.49575116968633!3d52.040792723160195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5dca3545e24a690b%3A0x5520e13a207b7dde!2z0KDQsNC90LTQtdCy0YM!5e0!3m2!1sru!2sru!4v1733288615927!5m2!1sru!2sru" 
                                width="100%" 
                                height="450" 
                                style="border:0; border-radius: 15px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); overflow: hidden;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Модальное окно для ввода данных -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Подтверждение записи</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="confirmationForm" method="POST">
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Имя</label>
                                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Номер телефона</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <button type="submit" class="form-control btn btn-success mt-4">Подтвердить запись</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Модальное окно для успешной записи -->
            <div class="modal" tabindex="-1" role="dialog" id="successModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="successModalLabel">Успешная запись</h5>
                        </div>
                        <div class="modal-body">
                            <p>Ваша запись на услугу успешно подтверждена! Наш администратор перезвонит вам для уточнения деталей! Спасибо за выбор нашего салона.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="custom-btn btn btn-lg btn-primary" data-bs-dismiss="modal" id="redirectButton">ОК</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Подключение jQuery и Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                // Функция для проверки всех полей формы
                function checkFormFields() {
                    var barber = $('#barber').val();
                    var service = $('#service').val();
                    var service_date = $('#service_date').val();
                    var service_time = $('#service_time').val();
                    
                    // Проверяем, все ли поля заполнены
                    if (barber && service && service_date && service_time) {
                        $('#confirmButton').prop('disabled', false);  // Разблокировать кнопку
                    } else {
                        $('#confirmButton').prop('disabled', true);  // Заблокировать кнопку
                    }
                }

                // Добавляем обработчики для всех полей
                $('#barber, #service, #service_date, #service_time').on('change', function() {
                    checkFormFields();
                });

                // Инициализация состояния кнопки при загрузке страницы
                $(document).ready(function() {
                    checkFormFields();
                });

                $('#confirmationForm').on('submit', function(e) {
                    e.preventDefault();  // Предотвращаем стандартное отправление формы

                    var formData = $(this).serialize();  // Собираем данные из формы
                    var barber = $('#barber').val();  // ID выбранного парикмахера
                    var service = $('#service').val();  // ID выбранной услуги
                    var service_date = $('#service_date').val();  // Дата услуги
                    var service_time = $('#service_time').val();  // Время услуги

                    // Логируем собранные данные
                    console.log('Form data:', formData);
                    console.log('Barber:', barber);
                    console.log('Service:', service);
                    console.log('Service Date:', service_date);
                    console.log('Service Time:', service_time);

                    formData += '&barber=' + barber + '&service=' + service + '&service_date=' + service_date + '&service_time=' + service_time;  // Добавляем данные из формы

                    // Отправляем данные через AJAX
                    $.ajax({
                        url: 'process_booking.php',  // Обработчик формы
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            console.log('Response:', response);
                            if (response === 'Успешно') {
                                $('#confirmationModal').modal('hide');
                                $('#successModal').modal('show');
                                $('#redirectButton').click(function() {
                                    window.location.href = 'index.php'; // Перенаправляем на главную
                                });
                            } else {
                                alert('Ошибка при записи: ' + response);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                            alert('Ошибка при отправке данных.');
                        }
                    });
                });
            </script>

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
