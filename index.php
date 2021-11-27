<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THTH games store</title>
    <link rel="stylesheet" href="./scss/style.css">
    <link rel="stylesheet" href="./scss/fontawesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>

    <!-- NAVBAR SECTION  -->
    <nav class="navbar navbar-expand-lg navbar-dark menu shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h1>thth</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./store.php">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./news.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./contact.php">Contact</a>
                    </li>
                </ul>

                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Giỏ Hàng</h5>
                            <span class="close">&times;</span>
                        </div>
                        <div class="modal-body">
                            <div class="cart-row">
                                <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                                <span class="cart-price cart-header cart-column">Giá</span>
                                <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                            </div>
                            <div class="cart-items">

                            </div>
                            <div class="cart-total">
                                <strong class="cart-total-title">Tổng Cộng:</strong>
                                <span class="cart-total-price">0$</span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-rounded close-footer">Đóng</button>
                            <button type="button" class="btn btn-rounded order">Thanh Toán</button>
                        </div>
                    </div>
                </div>
                <?php
                require_once('check_login.php');
                ?>
            </div>
        </div>
    </nav>

    <!-- ABOUT SECTION  -->
    <section id="home" class="about-section">
        <div class="container">
            <div class="row align-items-center text-white">
                <div class="col-md-6 about">
                    <h1 class="display-2">
                        <span class="display-2--intro">About Us</span>
                        <span class="display-2--description lh-base">Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit.
                            Autem pariatur voluptatibus, fugiat nobis, ullam fugit alias suscipit minima architecto ex
                            aut odit incidunt, consequuntur dolorem ea? Dolorum aspernatur, ipsum labore eaque eius iste
                            impedit qui quibusdam dolores deserunt minus laudantium! Aut provident beatae ea hic
                            consequatur commodi, aliquam illum neque?</span>
                    </h1>
                    <button type="button" class="rounded-pill btn-rounded">About Us
                        <i class="fas fa-arrow-right"></i>
                        </span>
                    </button>
                </div>
                <div class="col-md-6 about">
                    <div class="img-box">
                        <img src="./images/Group Presentation_Monochromatic.png" alt="about us illustrator">
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,96L48,128C96,160,192,224,288,218.7C384,213,480,139,576,101.3C672,64,768,64,864,90.7C960,117,1056,171,1152,176C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>


    <!-- STORE, NEWS  -->
    <section id="services" class="services">
        <div class="container">
            <div class="row text-center">
                <h1 class="display-3 fw-bold">Our Services</h1>
                <div class="heading-line mb-1"></div>
            </div>


            <!-- DESCRIPTION  -->
            <div class="row pt-2 pb-2 mt-0 mb-3">
                <div class="col-md-6 border-right">
                    <div class="bg-white p-3">
                        <h2 class="fw-bold text-capitalize text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, placeat.
                        </h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-white p-4 text-start">
                        <p class="fw-light">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam eligendi aliquid
                            distinctio voluptatibus cum. Nostrum assumenda provident quos ullam eveniet?
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- SERVICES  -->
        <div class="container">
            <!-- SHOP CONTENT  -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4">
                    <div class="services__content">
                        <div class="icon d-block fas fa-store"></div>
                        <h3 class="display-3--title mt-1">Store</h3>
                        <p class="lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magnam natus
                            excepturi commodi nisi rerum molestiae qui at cum deserunt. Quas ab illum, cum laboriosam
                            quia vel tempora qui? Esse!</p>
                        <button type="button" class="rounded-pill btn-rounded border-primary" onclick="location.href='./store.php'">Go to store
                            <i class="fas fa-arrow-right"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4 text-end">
                    <div class="services__pic">
                        <img src="./images/Gaming _Isometric.png" alt="games store illustration" class="img-fuild">
                    </div>
                </div>
            </div>
            <!-- NEWS CONTENT  -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4 text-start">
                    <div class="services__pic">
                        <img src="./images/Online campaign_Isometric.png" alt="news-event illustration" class="img-fuild">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 services mt-4">
                    <div class="services__content">
                        <div class="icon d-block fas fa-newspaper"></div>
                        <h3 class="display-3--title mt-1">News - Events</h3>
                        <p class="lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magnam natus
                            excepturi commodi nisi rerum molestiae qui at cum deserunt. Quas ab illum, cum laboriosam
                            quia vel tempora qui? Esse!</p>
                        <button type="button" class="rounded-pill btn-rounded border-primary" onclick="location.href='./news.php'">Learn More
                            <i class="fas fa-arrow-right"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>


    <!-- CONTACT SECTION  -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- MOBILE NUMBER -->
                <div class="col-md-4 col-lg-4 contact-box pt-1 d-md-block d-lg-flex d-flex">
                    <div class="contact-box__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" viewBox="0 0 24 24" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                        </svg>
                    </div>
                    <div class="contact-box__info">
                        <a href="" class="contact-box__info--title">69696969</a>
                        <p class="contact-box__info--subtitle">Mon-Sat 8am-6pm</p>
                    </div>
                </div>
                <!-- EMAIL  -->
                <div class="col-md-4 col-lg-4 contact-box pt-1 d-md-block d-lg-flex d-flex">
                    <div class="contact-box__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" viewBox="0 0 24 24" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <rect x="3" y="5" width="18" height="14" rx="2" />
                            <polyline points="3 7 12 13 21 7" />
                        </svg>
                    </div>
                    <div class="contact-box__info">
                        <a href="" class="contact-box__info--title">info@ththcomp.com</a>
                        <p class="contact-box__info--subtitle">Online support</p>
                    </div>
                </div>
                <!-- LOCATION  -->
                <div class="col-md-4 col-lg-4 contact-box pt-1 d-md-block d-lg-flex d-flex">
                    <div class="contact-box__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map" viewBox="0 0 24 24" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="3 7 9 4 15 7 21 4 21 17 15 20 9 17 3 20 3 7" />
                            <line x1="9" y1="4" x2="9" y2="17" />
                            <line x1="15" y1="7" x2="15" y2="20" />
                        </svg>
                    </div>
                    <div class="contact-box__info">
                        <a href="" class="contact-box__info--title">Ho Chi Minh city, VietNam</a>
                        <p class="contact-box__info--subtitle">Ly Thuong Kiet str, District 10</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- SOCIAL MEDIA -->
        <div class="footer-sm" style="background-color: #212121;">
            <div class="container">
                <div class="row py-4 text-center text-white">
                    <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                        connect with us on social media
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <a href="#"><i class="fab fa-facebook icon"></i></a>
                        <a href="#"><i class="fab fa-twitter icon"></i></a>
                        <a href="#"><i class="fab fa-github icon"></i></a>
                        <a href="#"><i class="fab fa-instagram icon"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- COMPANY INFO -->
        <div class="container mt-5">
            <div class="row text-white justify-content-center mt-3 pb-3">
                <div class="col-12 col-sm-6 col-lg-6 mx-auto">
                    <h5 class="text-capitalize fw-bold">thth</h5>
                    <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
                    <p class="lh-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid, ipsum earum in incidunt animi
                        error reiciendis eligendi nulla fugit consequuntur.
                    </p>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-4 mx-auto">
                    <h5 class="text-capitalize fw-bold">Get to know us</h5>
                    <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
                    <ul class="list-inline company-list">
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-4 mx-auto">
                    <h5 class="text-capitalize fw-bold">Discover</h5>
                    <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
                    <ul class="list-inline company-list">
                        <li><a href="#">Your Account</a></li>
                        <li><a href="#">Create an account</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-4 mx-auto">
                    <h5 class="text-capitalize fw-bold">contact</h5>
                    <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
                    <ul class="list-inline company-list">
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- COPYRIGHT INFO -->
        <div class="footer-bottom pb-5 pt-5">
            <div class="container">
                <div class="row text-center text-white">
                    <div class="col-12">
                        <div class="footer-bottom__copyright">
                            &COPY;Copyright 2021 <a href="#">thth company</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- BACK TO TOP BUTTON  -->

    <a href="#" class="shadow btn-primary rounded-circle back-to-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="./js/main.js"></script>
</body>

</html>