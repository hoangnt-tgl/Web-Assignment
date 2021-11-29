<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./style/admin-style.css" />
    <title>Admin</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-task-bar" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>THTH</div>
            <div class="list-group list-group-flush my-3">
                <a href="./admin-dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="./admin-user.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users me-2"></i>User</a>
                <a href="./admin-new.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-newspaper me-2"></i>New</a>
                <a href="./admin-product.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gamepad me-2"></i>Products</a>
                <a href="./login.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <div id="page-content-wrapper">  
        <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                        <div class="col-md-3">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    
                                    <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "thth_company";
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    if ($conn->connect_error) {
                                        echo "connect fail";
                                        die("Connection failed: " . $conn->connect_error);
                                        }
                                  
                                        $sql1 = "SELECT * from account ";
                                        $result1 = mysqli_query($conn,$sql1); 
                                        $amount1 = mysqli_num_rows($result1) - 1;
                                        echo '<h3 class="fs-2">'.$amount1.'</h3>';
                                    ?>
                                    <p class="fs-5">Total Account</p>
                                </div>
                                <i class="fas fa-newspaper fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>
    
                       
                    </div>
                    <h3 class="fs-4 mb-3" style="float: left;">Current News</h3>
                    <button class="view-modal" >Add News</button>
                    <br><br>
                    <div id="page-content-wrapper-new">  
                        <ul id="item">
                        <di class="myItem">
                        <h3>Item 1</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic, nostrum blanditiis ducimus distinctio dolorem, voluptatum ab, cumque iure minus aperiam incidunt ea modi. Tempora iure ad maxime nulla nemo illum?</p>
                                                </di>
                        <di class="myItem">
                        <h3>Item 2</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic, nostrum blanditiis ducimus distinctio dolorem, voluptatum ab, cumque iure minus aperiam incidunt ea modi. Tempora iure ad maxime nulla nemo illum?</p>
                                                </di>
                        
                </ul>

                                </div>
                                </div>
                                <script>
                                        var Item = document.getElementById("item");
                                        Item.style.display= "grid";
                                </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>