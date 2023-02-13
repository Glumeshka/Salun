<?php
    session_start();
    require_once 'assets/function.php';

    $vis_log = 'off';
    $vis_out = 'on';
    $vis_dr = 'off';
    $dis_dr = 1;
    

    if ($_SESSION['auth']) {
        $vis_log = 'on';
        $vis_out = 'off';
    } else {
        $vis_log = 'off';
        $vis_out = 'on';
    }

    if(checkBithday(getUserBithdayDate(getCurrentUser()))) {
        $vis_dr = 'on';
        $dis_dr = 0.95;
    } else {
        $vis_dr = 'off';
        $dis_dr = 1;
    }
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/norm.css">
        <link rel="stylesheet" href="/css/style.css">
        <title>SPA-salon</title>
    </head>
<body>
    <header class="header">
        <nav class='header_img'>
            <ul class="header_login">
                <li class='login_item <?php echo $vis_out; ?>'><a href="/assets/login.php">Bойти</a></li>
                <li class='login_item <?php echo $vis_out; ?>'><a href="/assets/register.php">Регистрация</a></li>
                <li class='login_item <?php echo $vis_log; ?>'><a href="assets/account.php"> <?php echo getCurrentUser(); ?></a></li>
                <li class='login_item <?php echo $vis_log; ?>'><a href="assets/logout.php">Bыйти</a></li>    
            </ul>
            <ul class="header_menu">
                <li class='menu_item item-1'><a href="#stone">Stone-терапия</a></li>
                <li class='menu_item item-2'><a href="#massage">Массаж</a></li>
                <li class='menu_item item-3'><a href="#wrapping">Обертывание</a></li>
                <li class='menu_item item-4'><a href="#peeling">Пилинг</a></li>
            </ul>            
        </nav>
        <div class="header_name">
            <h1>Spa-cалон "Демо-Версия"</h1>            
        </div>    
    </header>
    <main class="main">
        <section class="section <?php echo $vis_dr; ?>">
            <h2 class='section-item ' id="happy">
                <Strong>Поздравляем Вас!</Strong> - В день вашего рождения Мы дарим вам скидку на все предоставляемые услуги в размере 5%.
            </h2>
            <img src="/img/happy.jpg" alt="happy" height="500">
        </section>
        <section class="section <?php echo $vis_log; ?>">
            <h2 class='section-item' id="promo">
                <Strong>Вам</Strong> - как зарегестрированному пользователю при покупки любой услуги в подарок Сертификат <br> на 3000 &#8381 или скидку 20%.
                <?php                    
                    $date_today = (getTimeregUser(getCurrentUser()) * 1000) + 60 * 60 * 24 * 1000;
                    // $date = date('2023-02-18');
                    $date = date(daysBeforeBithday(getUserBithdayDate(getCurrentUser())));
                    $time = date('00:00:00');
                    $date_today_dr = $date . ' ' . $time;
                    // echo date("Y-m-d", mktime(0, 0, 0, 2, 18, 2023)) . "<br>";
                    // echo date('Y', strtotime('+1 year')) . "-" . "02-18";
                ?>
                <script>
                    var count_iddr = "<?php echo $date_today_dr; ?>";
                    let countDownDateDr = new Date(count_iddr).getTime();

                    var count_id = "<?php echo $date_today; ?>";
                    let countDownDate = count_id;
                </script>
                <p> До истечения акции: <?php echo '<p id="timer"><p>';?></p>
                <p> До дня Вашего рождения: <?php echo '<p id="timerdr"><p>'; ?></p>
            </h2>
            <img src="/img/promo.jpg" alt="promo" height="500">
        </section>
        <section class="section">
            <h2 class='section-item' id="stone">
                <Strong>Stone-терапия</Strong> - это массаж теплыми и холодными камнями в лечебных целях. Процедура обладает спазмолитическим, седативным, адаптогенным, болеутоляющим, ангиотрофическим эффектами. Метод улучшает работу нервной системы, устраняет признаки стресса и переутомления.
                <p> Цена: <?php echo 2500 * $dis_dr; ?> &#8381</p>
            </h2>
            <img src="/img/stone.jpg" alt="stone">
        </section>
        <section class="section">
            <h2 class='section-item' id="massage">
                <Strong>Массаж</Strong> - это лечебное воздействие на организм через кожу. В массаж входят такие приемы как поглаживание, растирание, разминание, вибрация и похлопывание. Такое воздействие на мышцы раздражает нервные окончания, которые, в свою очередь, посылают импульсы в мозг.
                <p> Цена: <?php echo 4000 * $dis_dr; ?> &#8381</p>
            </h2>
            <img src="/img/massage.jpg" alt="stone">
        </section>
        <section class="section">
            <h2 class='section-item' id="wrapping">
                <Strong>Обертывание</Strong> - это косметическая процедура, которая проводится с целью ухода за кожей тела, коррекции фигуры и лечения целлюлита, подразумевающая нанесение на поверхность кожи специализированных составов, оказывающих влияние на микроциркуляцию, лимфоток и обмен веществ.
                <p> Цена: <?php echo 5000 * $dis_dr; ?> &#8381</p>
            </h2>
            <img src="/img/wraper.jpg" alt="wrapping">
        </section>
        <section class="section">
            <h2 class='section-item' id="peeling">
                <Strong>Пилинг</Strong> - процедура, воздействующая на эпидермис по всей толщине рогового слоя. Для этой процедуры могут быть использованы традиционные препараты поверхностного пилинга, то есть фруктовые кислоты, однако время их воздействия на кожу лица увеличивают до 30-40 минут.
                <p> Цена: <?php echo 1500 * $dis_dr; ?> &#8381</p>
            </h2>
            <img src="/img/piling.jpg" alt="peeling" height="500">
        </section>
    </main>
    <footer class="footer">
        <nav class='footer_img'>
            <ul class="footer_menu">
                <li class='footer_menu_item'><a href="#">Новости</a></li>
                <li class='footer_menu_item'><a href="#">Вакансии</a></li>
                <li class='footer_menu_item'><a href="#">Рекламодателям</a></li>
                <li class='footer_menu_item'><a href="#">Контакты</a></li>
            </ul>            
        </nav>
    </footer>
    <script src="/js/script.js"></script>
</body>