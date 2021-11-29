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
    <nav class="navbar navbar-expand-lg navbar-dark menu shadow">
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
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./store.php">Store</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">About</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./news.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Contact</a>
                    </li>
                </ul>
                <?php
                require_once('check_login.php');
                ?>
            </div>
        </div>
    </nav>

    <!-- MAIN SECTION  -->

    <section class="main-section mt-3 mb-3">
        <div class="container">
            <div class="row">
                <?php
                require_once('config.php');
                $news_id = $_GET['id'];
                $sql = 'select * from `news` where `news_id` = ' . $news_id . '';
                $newsList = executeResult($sql);
                foreach ($newsList as $std) {
                    echo '
                <div class="newspaper col-lg-9 col-md-12 col-sm-12 p-4">
                    <h1 class="title">' . $std['title'] . '</h1>
                    <div class="date">
                        <i class="fas fa-calendar"></i>
                        <span>' . $std['postday'] . '</span>
                    </div>
                    <div class="summary mt-3 text-center">
                    <img class="w-75" src="./images/' . $std['image'] . '" >
                    </div>
                    <div class="body mt-5">
                        ' . $std['description'] . '
                    </div>
                </div>
                    ';
                }
                ?>


                <div class="news col-lg-3 col-md-12 col-sm-12 p-4">
                    <h1>Tin nổi bật</h1>
                    <ul class=news-list>
                        <?php
                        $sql = 'select news_id, `title` from `news` ORDER BY postday DESC LIMIT 0, 5';
                        $newsList = executeResult($sql);
                        $count = 0;
                        foreach ($newsList as $std) {
                            echo '
                            <li>
                                <a href="./new_info.php?id=' . $std['news_id'] . '">' . substr($std['title'], 0, 20) . '...</a>
                            </li>
                            ';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- COMMENT SECTION -->
    <section class="content-item m-5" id="comments">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <form action="./comment.php" method="post">
                        <h3 class="pull-left">New Comment</h3>
                        <?php
                        echo '
                        <input type="submit" class="btn btn-rounded rounded-pill pull-right" value="Submit" name="comment">
                        <fieldset>
                            <div class="row">
                                <div class="ava col-sm-3 col-lg-2 hidden-xs">
                                    <img class="img-responsive" src="./images/' . $avatar . '" alt="">
                                </div>
                                <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                    <input type="hidden" value="' . $_GET['id'] . '" name="news_id">
                                    <textarea class="form-control" placeholder="Your message" required name="message"></textarea>
                                </div>
                            </div>
                        </fieldset>';
                        ?>
                    </form>
                    <?php
                    $sql = 'select C.account_id, C.content, C.commentday, C.news_id, A.image FROM `comment` C INNER JOIN account A ON C.account_id = A.account_id WHERE C.news_id = ' . $_GET['id'] . ' ORDER BY C.commentday DESC';
                    $commentList = executeResult($sql);
                    echo '<h3>' . sizeof($commentList) . ' Comments</h3>';
                    foreach ($commentList as $std) {
                        echo '
                        <div class="media">
                            <a class="pull-left" href="#"><img class="media-object" src="./images/' . $std['image'] . '" alt=""></a>
                            <div class="media-body">
                                <h4 class="media-heading">' . $std['account_id'] . '</h4>
                                <p>' . $std['content'] . '</p>
                                <ul class="list-unstyled list-inline media-detail pull-left">
                                    <li><i class="fa fa-calendar"></i>' . $std['commentday'] . '</li>
                                </ul>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- CONTACT SECTION  -->

    <footer class="footer">
        <div class="container">
            <div class="row m-3">
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
            <div class="row text-white justify-content-center m-3 pb-3">
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
                        <li><a href="#">Store</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-4 mx-auto">
                    <h5 class="text-capitalize fw-bold">contact</h5>
                    <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
                    <ul class="list-inline company-list">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Twitter/a></li>
                        <li><a href="#">Github</a></li>
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