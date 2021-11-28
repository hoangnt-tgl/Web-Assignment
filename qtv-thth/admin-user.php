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
                    class="fas fa-user-secret me-2"></i>THTH
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="./admin-dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="./admin-user.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-users me-2"></i>User</a>
                <a href="./admin-new.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-newspaper me-2"></i>New</a>
                <a href="./admin-product.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gamepad me-2"></i>Products</a>
                <a href="./login.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <div id="page-content-wrapper">        
                <div class="container-fluid px-4">
                    
    
                    <div class="row my-5">
                        <h3 class="fs-4 mb-3">Recent Orders</h3>
                        
                        <div class="col">
                        <input id = "product-search" type="text" placeholder="Search product name" class="search-control">
                        <br><br>
                            <table class="table bg-white rounded shadow-sm  table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">UserName</th>
                                        <th scope="col" class="email">Email</th>
                                        <th scope="col" class="phone">Phone</th>
                                        <th scope="col" class="productb">Amount of Products Purchased</th>
                                        <th scope="col" class="status">Satus</th>
                                        <th scope="col">Ban/UnBan</th>
                                    </tr>
                                </thead>
                                <tbody class="user-table">
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
                                        $sql = "SELECT * from account";
                                        $result = mysqli_query($conn,$sql);
                                        if ($result->num_rows > 0)
                                        {
                                            
                                            while($row = $result ->fetch_assoc())
                                            {
                                                if ($row['permission'] == "0")
                                                {
                                                    $user_id = $row['account_id'];
                                                    $sql2 = "SELECT * from productbuy WHERE account_id = '$user_id'";
                                                    $result2 = mysqli_query($conn,$sql2); 
                                                    $amount = mysqli_num_rows($result2);
    
                                                    $status = 'Ban';
                                                    $ban_btn = 'Unban';
                                                    if ($row['status'] == "1" )
                                                    {
                                                        
                                                        $status = "Avaliable";
                                                        $ban_btn = "Ban";
                                                    }
                                                    echo "<tr>";
                                                    echo "<th scope='col'>". $row['account_id']."</th>";
                                                    echo "<td scope='col' class='email'>". $row['email']."</th>";
                                                    echo "<td scope='col' class='phone'>". $row['phonenumber']."</th>";
                                                    echo "<td scope='col' class='productb'>". $amount."</th>";
                                                    echo "<td scope='col' class='status'>". $status."</th>";
                                                    echo "<td scope='col'><button class='user-btn'>".$ban_btn."</button></th>";
                                                    echo "</tr>";   
                                                }
                                                                                                
                                            }
                                        }
                                        
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    
    
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>