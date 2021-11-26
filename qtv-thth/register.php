
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href ="./style/register-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dcf0215583.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>

    <section class="register py-5">
            
            <div class = "container">
                <div class = "row g-0">
                    

                    <div class="col-lg-12 text-center py-5">
                    <?
                                   echo "1l";
                                    if(array_key_exists('register-btn', $_POST)) {
                                        register_newuser();
                                    }
                                    function register_newuser() {
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "thth";
                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                            }
                                        $id = $_POST["id"];
                                        $password = $_POST["password"]; 
                                        $birthday = $_POST["birthday"];  
                                        $email = $_POST["email"]; 
                                        $phone = $_POST["phone"]; 
                                        $about = $_POST["about"]; 
                                        $permission = 1;
                                        $sql1 = "INSERT INTO account (account_id, password, email,birthday,phonenumber,about,permission) 
                                        VALUES ('$id', '$password','$email', '$birthday',$phone,$about,$permission)";
                                        if ($conn->query($sql1) === TRUE)
                                        {
                                            echo "Add sucessful";
                                        }
                                        else
                                        {

                                            echo "Add fail";
                                        }
                                        

                                    }
                                    ?>
                        <h1>Register</h1>
                        <form>
                            <div class="form-row py-1 pt-1">
                                <div class="text-start offset-3">
                                    <h5>Username</h5> 
                                </div>
                            </div>
                            <div class="form-row py-1 pt-1">
                            <div class="offset-1 col-lg-10">
                                <input type="text" id="id" class="input-register px-3" placeholder="E.g. Phan Minh Thong">
                            </div>
                            </div>
                            <div class="form-row py-2 pt-3">
                                <div class="text-start offset-3">
                                    <h5>Password</h5> 
                                </div>
                            </div>

                          
                            <div class="form-row py-1 pt-1">
                                <div class="offset-1 col-lg-10">
                                    <input type="password" id="password" class="input-register px-3" placeholder="at least 8 letter or number">
                                </div>
                            </div>
                            <div class="form-row py-2 pt-3">
                                <div class="text-start offset-3">
                                    <h5>Repeat Password</h5> 
                                </div>
                            </div>
                            <div class="form-row py-1 pt-1">
                            <div class="offset-1 col-lg-10">
                                <input type="password" id="password_rp" class="input-register px-3" placeholder="same as Password">
                              </div>
                            </div>
                            <div class="form-row py-2 pt-3">
                                <div class="text-start offset-3">
                                    <h5>Birthday</h5> 
                                </div>
                            </div>
                            <div class="form-row py-1 pt-1">
                                <div class="offset-1 col-lg-10">                                                                       
                                    <div class='input-group date text-start offset-2' id='datepicker'>
                                        
                                        
                                        <div class="input-group-addon text-center">
                                            <input type='text' id="birthday" class="input-register px-3" placeholder="dd/mm/yyyy">
                                            <div class="glyphicon"></div>
                                        </div>
                                    
                                    </div>                                                        
                                </div>
                            </div>
                            <div class="form-row py-2 pt-3">
                                <div class="text-start offset-3">
                                    <h5>Email</h5> 
                                </div>
                            </div>
                            <div class="form-row py-1 pt-1">
                                <div class="offset-1 col-lg-10">
                                    <input type="text" id="email" class="input-register px-3" placeholder="E.g. thongphan@gmail.com">
                                </div>
                            </div>
                            <div class="form-row py-2 pt-3">
                                <div class="text-start offset-3">
                                    <h5>Phone Number</h5> 
                                </div>
                            </div>
                            <div class="form-row py-1 pt-1">
                                <div class="offset-1 col-lg-10">
                                    <input type="text" id="phone" class="input-register px-3" placeholder="E.g. 0912345678">
                                </div>
                            </div>
                            <div class="form-row py-2 pt-3">
                                <div class="text-start offset-3">
                                    <h5>About</h5> 
                                </div>
                            </div>
                            <div class="form-row py-1 pt-1">
                                <div class="about offset-1 col-lg-10">
                                    <textarea id="about"  class="input-register-about px-3" placeholder="E.g. I like action game"></textarea>
                                </div>
                            </div>
                            <div class="form-row py-3 pt-3  ">
                                <div class="offset-1 col-lg-10">
                                
                                    <input type="submit" name="register-btn" class="register-btn" value="Register" />
                                    
                                    
                                </div>
                            </div>
                        </form>
                       
                    </div>

                </div>
                

            </div>
        </section>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
        <script >
            $(function () {
                $('#datepicker').datepicker({
                    format: "dd/mm/yyyy",
                    autoclose: true,
                    todayHighlight: true,
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    autoclose: true,
                    changeMonth: true,
                    changeYear: true,
                    orientation: "button"
                });
            });
        </script>
    <script src="calendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>