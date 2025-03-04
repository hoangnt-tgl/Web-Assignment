
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href ="./style/login-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dcf0215583.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <section class="login py-5">
            
            <div class = "container">
                <div class = "row g-0">
                    <div class="col-lg-5">
                        <img src="./image/login-img.jfif" class= "img-fluid" alt ="">
    
                    </div>

                    <div class="col-lg-7 text-center py-5">
                        <h1 class="animate__animated animate__pulse">THTH Entertainment</h1>
                        
                        <form action="validate-login.php" method="post">
                          <div class="form-row py-4 pt-5">
                            <div class="offset-1 col-lg-10">
                                    <?php
                                session_start(); 
                                if (isset($_SESSION['error']))
                                {
                                  echo '<p style="color:red;">'.$_SESSION['error'] .'</p>';
                                  unset($_SESSION['error']);
                                }
                                ?>
                                <input type="text" name="id" class="input-login px-3" placeholder="Username">

                            </div>

                          </div>
                          <div class="form-row py-2 pt-3">
                            <div class="offset-1 col-lg-10">
                                <input type="password" name="password" class="input-login px-3" placeholder="Password">

                          </div>
                        </div>
                          <div class="form-row py-2 pt-1">
                            <div class="offset-1 col-lg-10">
                                <h5>Don't have acount yet ? <a href="./register.php">Register</a></h5> 
                          </div>
                           </div>
                          <div class="form-row py-3 pt-3  ">
                            <div class="offset-1 col-lg-10">
                                <button class="login-btn">Login</button>

                          </div>

                          </div>
                        </form>
                        <!-- <p>Or Login With</p>
                                        
                            <img class="google-icon" alt="login-with-google" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/> -->
                      
                    </div>

                </div>
                

            </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>