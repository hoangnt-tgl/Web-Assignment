<?php
require_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="./scss/style.css">
  <link rel="stylesheet" href="./scss/fontawesome.css">
  <link rel="stylesheet" href="./scss/alert.css">
  <link rel="stylesheet" href="./scss/edit-profile.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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
            <a class="nav-link" aria-current="page" href="./contact.php">Contact</a>
          </li>
        </ul>
        <?php
        $username = $_SESSION['username'];
        $sql = 'select * from `account`';
        $accountList = executeResult($sql);
        foreach ($accountList as $std) {
          if ($username === $std['account_id']) {
            break;
          }
        }
        echo '
                    <div type="button" class="rounded-pill btn-rounded">
                      <b  class="d-flex align-items-center dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        ' . $std['account_id'] . '
                      </b>
                      <span>
                      <img src="./images/' . $std['image'] . '" alt="" width="32" height="32" class="rounded-circle me-2">
                      </span>
                      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                      <li><a class="dropdown-item" id="cart">Cart</a></li>
                      <li><a class="dropdown-item" href="./edit-profile.php">Profile</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="./logout.php">Sign out</a></li>
                      </ul>
                    </div>
                    ';

        ?>
      </div>
    </div>
  </nav>
  <?php
  if (isset($_GET['error'])) {
    $error = $_GET["error"];
    $message = "";
    if ($error === 'image') {
      $message = "Sorry, you can only upload a .GIF, a .JPG, or a .PNG image file.";
    } else if ($error === 'username') {
      $message = "The username is not available";
    } else if ($error === 'phonenumber') {
      $message = "The phone number is not available";
    } else if ($error === 'email') {
      $message = "The email is not available";
    } else if ($error === 'passwordErrNotMatch') {
      $message = "Passwords do not matched";
    } else if ($error === 'passwordErrIncorrect') {
      $message = "The passwords is incorrect";
    } else if ($error === 'passwordErrleast1number') {
      $message = "Your Password Must Contain At Least 1 Number!";
    } else if ($error === 'passwordErrleast1letter') {
      $message = "Your Password Must Contain At Least 1 Letter!";
    }
    echo '
        <div class="contentalert">
          <div class="alert alert-warning rounded">
            <button type="button" class="close" data-dismis="alert" aria-hidden="true"> x </button>
            <strong>Alert!</strong> ' . $message . '
          </div>
        </div>
        ';
  }
  ?>

  <!-- PRODUCTS  SECTION-->

  <section class="products mt-5 mb-3">
    <div class="container">
      <form action="update-info.php" method="POST">
        <?php
        echo '
              <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
              <div class="card-body">
                <div class="account-settings">
                  <div class="user-profile">
                    <div class="user-avatar">
                      <div class="wrapper" id="avatar">
                        <input type="file" class="avatar" name="image" accept="image/*">
                      </div>
                    </div>
                    <h5 class="user-name">' . $std['fullname'] . '</h5>
                    <h6 class="user-email">' . $std['email'] . '</h6>
                  </div>
                  <div class="about">
                    <h5>About</h5>
                    <p>' . $std['about'] . '</p>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
              <div class="card-body">
                <form action="#" class="">
                  <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mt-1 mb-4 text-primary">Personal Details</h6>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form__div">
                      <input type="text" class="form__input" name="fullname" value="' . $std['fullname'] . '">
                      <label for="" class="form__label">Full Name</label>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form__div">
                      <input type="text" class="form__input" required name="account_id" minlength="8" maxlength="20" value="' . $std['account_id'] . '">
                      <label for="" class="form__label">User Name</label>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form__div">
                      <input type="tel" class="form__input" required name="phonenumber" pattern="[0]{1}[0-9]{9}" value="' . $std['phonenumber'] . '">
                      <label for="" class="form__label">Phone Number</label>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form__div">
                      <input type="date" class="form__input" required name="birthday" value="' . $std['birthday'] . '">
                      <label for="" class="form__label">Date of birth</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form__div">
                        <input type="email" class="form__input" required name="email" value="' . $std['email'] . '">
                        <label for="" class="form__label">Email</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <div class="form__div">
                        <textarea class="form__input" rows="5" name="about">' . $std['about'] . '</textarea>
                        <label for="" class="form__label">About</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mt-4 mb-4">
                  <div class="text-center">
                    <input type="reset" class="bg-light" value="Reset">
                    <input type="submit" name="changeInfo" class="btn btn-primary" value="Update">
                  </div>
                </div>
                </form>
                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mt-4 mb-4 text-primary">Change Password</h6>
                  </div>
                  <div class="row">
                    <div class="col-sm">
                      <div class="form__div">
                        <input type="password" class="form__input" name="currPass" minlength="8">
                        <label for="" class="form__label">Current password</label>
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form__div">
                        <input type="password" class="form__input" name="newPass" minlength="8">
                        <label for="" class="form__label">New password</label>
                    </div>
                    </div>
                    <div class="col-sm">
                      <div class="form__div">
                        <input type="password" class="form__input" name="confPass" minlength="8">
                        <label for="" class="form__label">Confirm Password</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" name="changePass" value="Change password">
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            ';
        ?>
      </form>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./js/main.js"></script>
  <?php
  echo '
    <script>
      document.getElementById("avatar").style.backgroundImage="url(\'./images/' . $std['image'] . '\')";
      $(".alert").click(function(){
        $(this).fadeOut();
      });
    </script>
    ';
  ?>
</body>

</html>