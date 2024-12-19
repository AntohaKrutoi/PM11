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

            <section class="section-padding" id="section_6">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-8 col-12 mx-auto">
                            <h2 class="mb-4 text-center">Вход</h2>
                        
                            <form class="custom-form" role="form" action="login_procces.php" method="post">
                                <div class="row justify-content-center">
                        
                                    <div class="col-12 my-2">
                                        <label class="mb-2" for="name">Логин</label>
                                        <input type="text" name="username" id="username" class="form-control" required="">
                                    </div>
                        
                                    <div class="col-12 my-2">
                                        <label class="mb-2" for="email">Почта</label>
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" required="">
                                    </div>
                        
                                    <div class="col-12 my-2">
                                        <label class="mb-2" for="password">Пароль</label>
                                        <input type="password" name="password" id="password" class="form-control" required="">
                                    </div>
                        
                                    <div class="col-12 my-2">
                                        <button type="submit" class="form-control mt-4" id="submit">Войти</button>
                                    </div>
                        
                                </div>
                            </form>
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
