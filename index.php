<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!--=============== CSS ===============-->
    <?php echo '<link rel="stylesheet" href="assets/css/styles.css">'; ?>
    <title>Electric Bikes</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <i class="ri-motorbike-fill"></i>
                EV-2
            </a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">About us</a>
                    </li>
                    <li class="nav__item">
                        <a href="#popular" class="nav__link">Popular</a>
                    </li>
                    <li class="nav__item">
                        <a href="#services" class="nav__link">Services</a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">ContactUs</a>
                    </li>
                    <li class="nav__item">
                        <a href="admin/index.php" target="_blank" class="nav__link">Admin</a>
                    </li>
                </ul>
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>
            <!-- Toggle button-->
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line"></i>
            </div>
        </nav>
    </header>
    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home section" id="home">
            <div class="shape shape__big"></div>
            <div class="shape shape__small"></div>
            <div class="home__container container grid">
                <div class="home__data">
                    <h1 class="home__title">
                        Choose the Best Bike
                    </h1>
                    <h2 class="home__subtitle">
                        Oben Rorr
                    </h2>
                    <h3 class="home__elec">
                        <i class="ri-flashlight-fill"></i>Electric bike at our store <i class="ri-flashlight-fill"></i>
                    </h3>
                </div>
                <img src="assets/img/home.png" alt="" class="home__img">
                <div class="home__bike">
                    <div class="home__bike-data">
                        <div class="home__bike-icon">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <h2 class="home__bike-number">200km</h2>
                        <h3 class="home__bike-name">RANGE</h3>
                    </div>
                    <div class="home__bike-data">
                        <div class="home__bike-icon">
                            <i class="ri-dashboard-3-line"></i>
                        </div>
                        <h2 class="home__bike-number">100km/hr</h2>
                        <h3 class="home__bike-name">TOP SPEED</h3>
                    </div>
                    <div class="home__bike-data">
                        <div class="home__bike-icon">
                            <i class="ri-charging-pile-2-line"></i>
                        </div>
                        <h2 class="home__bike-number">2hrs</h2>
                        <h3 class="home__bike-name">CHARGE TIME</h3>
                    </div>
                </div>
                <a href="#features" class="home__button">START</a>
            </div>
        </section>
        <section class="features section" id="features">
            <h2 class="section__title">
                Why Electric?
            </h2>
            <div class="features__container container grid">
                <div class="features__group">
                    <img src="assets/img/features.png" alt="" class="features__img">

                    <div class="features__cards features__card-1">
                        <h3 class="features__card-title">Low</h3>
                        <p class="features__card-description">Running cost</p>
                    </div>
                    <div class="features__cards features__card-2">
                        <h3 class="features__card-title">Smooth</h3>
                        <p class="features__card-description">Driving experience</p>
                    </div>
                    <div class="features__cards features__card-3">
                        <h3 class="features__card-title">Higher</h3>
                        <p class="features__card-description">Mileage range</p>
                    </div>
                    <div class="features__cards features__card-4">
                        <h3 class="features__card-title">Zero</h3>
                        <p class="features__card-description">Emissions</p>
                    </div>
                </div>
            </div>
            <img src="assets/img/map.svg" alt="" class="features__map">
        </section>
        <!--==================== ABOUT ====================-->
        <section class="about section" id="about">
            <div class="about__container container grid">
                <div class="about__group">
                    <img src="assets/img/about.jpg" alt="" class="about__img">
                    <div class="about__card">
                        <h3 class="about__card-title">50+</h3>
                        <p class="about__card-description">
                            Happy Customers
                        </p>
                    </div>
                </div>
                <div class="about__data">
                    <h2 class="section__title about__title">
                        EV-2 <br> <i class="ri-flashlight-fill"></i> The Electric Bike shop <i
                            class="ri-flashlight-fill"></i>
                    </h2>

                    <p class="about__description">
                        We offer the best and newest electric bikes of the most recognized brands in India.
                        A leading store for your next new Bike !
                    </p>
                    <a href="#" class="button">Contact us?</a>
                </div>
            </div>
        </section>
        <!--==================== POPULAR ====================-->
        <section class="popular section" id="popular">
            <h2 class="section__title">
                Popular Electric bikes <br> At our Store
            </h2>
            <div class="popular__container container swiper">
                <div class="swiper-wrapper">
                    <?php
                        require 'admin/database/dbconfig.php';
                        $query = "SELECT * FROM popular_bikes";
                        $query_run = mysqli_query($connection,$query);
                        $check_bikes = mysqli_num_rows($query_run) > 0;
                        if($check_bikes)
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                                ?>
                    <article class="popular__card swiper-slide">
                        <div class="shape shape__smaller"> </div>
                        <h1 class="popular__title"><?php echo $row['brand']; ?></h1>
                        <h3 class="popular__subtitle"><?php echo $row['model']; ?></h3>

                        <img src="admin/upload/<?php echo $row['img']; ?>" alt="" class="popular__img">

                        <div class="popular__data">
                            <div class="popular__data-group">
                                <i class="ri-dashboard-2-line"></i> <?php echo $row['topspeed']; ?>
                            </div>
                            <div class="popular__data-group">
                                <i class="ri-timer-line"></i> <?php echo $row['charge']; ?>
                            </div>
                            <div class="popular__data-group">
                                <i class="ri-charging-pile-line"></i><?php echo $row['bikerange']; ?>
                            </div>
                        </div>
                        <h3 class="popular__price"><?php echo $row['price']; ?></h3>
                        <button class="button popular__button">
                            <a href="<?php echo $row['link']; ?>" target="_blank"><i
                                    class="ri-information-line"></i></a>
                        </button>
                    </article>
                    <?php
                            }
                        }
                        else
                        {

                        }
                        ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <!--==================== services ====================-->
        <section class="services section" id="services">
            <h1 class="section__title">Our Services</h1>
            <div class="box-container">
                <div class="box">
                    <i class="ri-motorbike-fill"></i>
                    <h3>Bike Selling</h3>
                    <p class="services__description">Selling of bikes at the best and affordable price for the customers
                    </p>
                </div>
                <div class="box">
                    <i class="ri-tools-line"></i>
                    <h3>Bike Repair</h3>
                    <p class="services__description">Full maintainance and repairing of bikes with lots of offers</p>
                </div>
                <div class="box">
                    <i class="ri-shield-flash-line"></i>
                    <h3>Bike Insurance</h3>
                    <p class="services__description">Great deals on Insurance of your new bike a the lowest cost
                        possible </p>
                </div>
                <div class="box">
                    <i class="ri-battery-charge-line"></i>
                    <h3>Battery replacement</h3>
                    <p class="services__description">LNew batteries are available for replacement with your old one's
                    </p>
                </div>
                <div class="box">
                    <i class="ri-home-8-line"></i>
                    <h3>Quick Delivery</h3>
                    <p class="services__description">Fast delivery of your new electric bike at our showroom</p>
                </div>
                <div class="box">
                    <i class="ri-customer-service-2-line"></i>
                    <h3>24/7 Support</h3>
                    <p class="services__description">24/7 call and chat support all the time for your convinience</p>
                </div>
            </div>
        </section>
        <!--==================== Charger ====================-->
        <section class="charger section" id="charger">
            <div class="charger__container container grid">
                <img src="assets/img/charger.jpg" alt="" class="charger__bg">

                <div class="charger__data">
                    <h2 class="section__title charger__title">
                        Do you want to <br> Learn more about the charger?
                    </h2>
                    <p class="charger__description">
                        Know more about the Electric vehicles charges its uses etc by clicking on the link below
                    </p>
                    <a href="extras/charger.html" target="_blank" class="button button__charger">Know More..</a>
                </div>
            </div>
        </section>
        <!--==================== FEATURED ====================-->
        <section class="featured section" id="featured">
            <h2 class="section__title">
                Bike available at our store
            </h2>
            <div class="featured__container container">
                <ul class="featured__filters">
                    <li>
                        <button class="featured__item active-featured" data-filter="all">
                            <span>All</span>
                        </button>
                    </li>
                    <li>
                        <button class="featured__item" data-filter=".Revolt">
                            <img src="assets/img/revoltlogo.png" alt="">
                        </button>
                    </li>
                    <li>
                        <button class="featured__item" data-filter=".HeroElectric">
                            <img src="assets/img/Hero-electriclogo.png" alt="">
                        </button>
                    </li>
                    <li>
                        <button class="featured__item" data-filter=".OLA">
                            <img src="assets/img/olaelectriclogo.png" alt="">
                        </button>
                    </li>
                    <li>
                        <button class="featured__item" data-filter=".Ather">
                            <img src="assets/img/ather-energy-squarelogo.png" alt="">
                        </button>
                    </li>
                    <li>
                        <button class="featured__item" data-filter=".Joye-bike">
                            <img src="assets/img/joyelogo.png" alt="">
                        </button>
                    </li>
                    <li>
                        <button class="featured__item" data-filter=".PURE-EV">
                            <img src="assets/img/pureevlogo.jpg" alt="">
                        </button>
                    </li>
                </ul>
                <div class="featured__content grid">
                    <?php
                        require 'admin/database/dbconfig.php';
                        $query = "SELECT * FROM allbikes";
                        $query_run = mysqli_query($connection,$query);
                        $check_bikes = mysqli_num_rows($query_run) > 0;
                        if($check_bikes)
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                                ?>
                    <article class="featured__card mix <?php echo $row['allbikebrand']; ?>">
                        <div class="shape shape__smaller"></div>
                        <h1 class="featured__title"><?php echo $row['allbikebrand']; ?></h1>

                        <h3 class="featured__subtitle"><?php echo $row['allbikemodel']; ?> </h3>

                        <img src="admin/upload/<?php echo $row['allbikeimg']; ?>" alt="" class="featured__img">

                        <h3 class="featured__price"><?php echo $row['allbikeprice']; ?></h3>

                        <button class="button featured__button">
                            <i class="ri-shopping-bag-2-line"></i>
                        </button>
                    </article>
                    <?php
                            }
                        }
                        else
                        {

                        }
                        ?>

                </div>
            </div>
        </section>
        <!--==================== Appointment ====================-->
        <section class="appointment section">
            <div class="appointment__bg">
                <div class="appointment__container container grid">
                    <div class="appointment__data">
                        <h2 class="appointment__title">Intrested? Send us an E-mail to book an appointment</h2>
                        <p class="appointment__description">Note:- Please follow Covid Guidelines and wear your mask
                            while visiting</p>
                        <a href="#contact" class="button button--flex button--white">
                            Contact us
                            <i class="ri-arrow-down-line appointment__icon"></i>
                        </a>
                    </div>
                    <img src="assets/img/appalt.png" alt="" class="appointment__img">

                </div>
            </div>
        </section>
        <!--==================== testimonals ====================-->
        <section class="testimonal section" id="testimonals">
            <div class="testimonal__heading"><b>Our</b> Testimonals</div>
            <div class="testimonal__wrapper">
                <div class="testimonal__container">
                    <div class="testimonal__profile">
                        <div class="testimonal__imgBox">
                            <img src="assets/img/pic-1.png" alt="">
                        </div>
                        <h2>Shawn Miller</h2>
                    </div>
                    <p> <span> <i class="ri-double-quotes-l quote__left"></i></span> The best strore for my new electric
                        bike
                        they offer very quick and quality service
                        with lot's of services I really recommend
                        purchasing your next bike from this store! Great price and overall experience and their website
                        helped a lot for the information. <span><i class="ri-double-quotes-r quote__right"></i></span>
                    </p>
                </div>
                <div class="testimonal__container">
                    <div class="testimonal__profile">
                        <div class="testimonal__imgBox">
                            <img src="assets/img/pic-2.png" alt="">
                        </div>
                        <h2>Angela Hersey</h2>
                    </div>
                    <p> <span> <i class="ri-double-quotes-l quote__left"></i></span>The best strore for my new electric
                        bike
                        they offer very quick and quality service
                        with lot's of services I really recommend
                        purchasing your next bike from this store! Great price and overall experience and their website
                        helped a lot for the information.<span><i class="ri-double-quotes-r quote__right"></i></span>
                    </p>
                </div>
                <div class="testimonal__container">
                    <div class="testimonal__profile">
                        <div class="testimonal__imgBox">
                            <img src="assets/img/pic-3.png" alt="">
                        </div>
                        <h2>Aiken Paul</h2>
                    </div>
                    <p> <span> <i class="ri-double-quotes-l quote__left"></i></span>The best strore for my new electric
                        bike
                        they offer very quick and quality service
                        with lot's of services I really recommend
                        purchasing your next bike from this store! Great price and overall experience and their website
                        helped a lot for the information.<span><i class="ri-double-quotes-r quote__right"></i></span>
                    </p>
                </div>
            </div>
        </section>
        <!--==================== Contact us ====================-->
        <section class="contact section" id="contact">
            <h2 class="section__title">Have a question?</h2>
            <div class="contact__container">
                <div class="row">
                    <iframe class="map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.452271096561!2d72.95613891536772!3d19.175438653821196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b8e5321ecbfb%3A0xf7d295a999c47b89!2sMulund%20College%20of%20Commerce!5e0!3m2!1sen!2sin!4v1656475520062!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <form action="https://formsubmit.co/e5a41513a947aec5d5bf444f228f241e " method="POST">
                        <h3>Fill The Form</h3>
                        <input name='name' type="text" placeholder="your name" class="box" pattern="[A-Za-z]{3}" required>
                        <input name='email' type="email" placeholder="your email" class="box" required>
                        <textarea name='message' placeholder="your message" class="box" cols="30" rows="10" required></textarea>
                        <input type="submit" value="send message" class="button ">
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="shape shape__big"></div>
        <div class="shape shape__small"></div>

        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">
                    <i class="ri-steering-line"></i>EV-2
                </a>
                <p class="footer__description">
                    We offer the best electric bikes of <br>
                    the most recognized brands in <br>
                    India.
                </p>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">
                    Company
                </h3>
                <ul class="footer__links">
                    <li>
                        <a href="#about" class="footer__link">About Us</a>
                    </li>
                    <li>
                        <a href="#featured" class="footer__link">Bikes</a>
                    </li>
                    <li>
                        <a href="#testimonals" class="footer__link">Testimonals</a>
                    </li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">
                    Information
                </h3>
                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Locate Store</a>
                    </li>
                    <li>
                        <a href="#contact" class="footer__link">Ask Question</a>
                    </li>
                    <li>
                        <a href="#services" class="footer__link">Services</a>
                    </li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">
                    Admin?
                </h3>
                <ul class="footer__links">
                    <li>
                        <a href="admin/index.php" target="_blank" class="footer__link">Click here</a>
                    </li>

                </ul>
            </div>
        </div>
    </footer>
    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>
    <!--=============== SCROLL REVEAL ===============-->
    <script src="/assets/js/scrollreveal.min.js"></script>
    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!--=============== MIXITUP JS ===============-->
    <script src="assets/js/mixitup.min.js"></script>
    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>