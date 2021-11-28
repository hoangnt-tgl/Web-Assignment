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
                <a href="./admin-new.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-newspaper me-2"></i>New</a>
                <a href="./admin-product.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
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
                                        $sql2 = "SELECT * from productbuy ";
                                        $result2 = mysqli_query($conn,$sql2); 
                                        $amount = mysqli_num_rows($result2);
                                        $sql1 = "SELECT * from product ";
                                        $result1 = mysqli_query($conn,$sql1); 
                                        $amount1 = mysqli_num_rows($result1);
                                        echo '<h3 class="fs-2">'.$amount1.'</h3>';
                                    ?>
                                    <p class="fs-5">Products</p>
                                </div>
                                <i class="fas fa-gamepad fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>
    
                        <div class="col-md-3">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <?php
                                    echo '<h3 class="fs-2">'.$amount.'</h3>';
                                    ?>
                                    <p class="fs-5">Sales</p>
                                </div>
                                <i
                                    class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>
    
                       
                    </div>
    
                    <div class="row my-5">
                        <div class= "search-row">
                            <h3 class="fs-4 mb-3" style="float: left;">Recent Orders</h3>
                            <input id = "product-search" type="text" placeholder="Search product name" class="search-control">
                            <button class='add-btn'>Add Product</button>
                            <button class='view-btn'>View Main Web</button>
                            
                        
                        <div class="col">
                       
                        <br><br>
                            <table class="table bg-white rounded shadow-sm  table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" >ID</th>
                                        <th scope="col" class="productname">Name</th>
                                        <th scope="col" class="price">Price</th>
                                        <th scope="col" class="sale">Sale</th>
                                        <th scope="col" class="rate">Favourite</th>
                                        <th scope="col" class="quan">Quantity</th>
                                        <th scope="col" class="recom">Required Configuration</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="product-table">
                                    <?php
                                        
                                        $sql = "SELECT * from product";
                                        $result = mysqli_query($conn,$sql);
                                        if ($result->num_rows > 0)
                                        {
                                            
                                            while($row = $result ->fetch_assoc())
                                            {
                                                
                                                    $product_id = $row['product_id'];
                                                    $sql2 = "SELECT * from productbuy WHERE product_id = '$product_id'";
                                                    $result2 = mysqli_query($conn,$sql2); 
                                                    $amount = mysqli_num_rows($result2);
    
                                                
                                                    echo "<tr>";
                                                    echo "<td scope='col' >". $row['product_id']."</td>";
                                                    echo "<td scope='col' class='productname'>". $row['name']."</td>";
                                                    echo "<td scope='col' class='price'>". $row['price']."</td>";
                                                    echo "<td scope='col' class='sale'>".  $amount."</td>";
                                                    echo "<td scope='col' class='rate'>". $row['rating']."</td>";
                                                    echo "<td scope='col' class='quan'>". $row['quantity']."</td>";
                                                    echo "<td scope='col' class='recom'><button class='product-btn'>View and Edit</button></td>";
                                                    echo "</tr>";   
                                                }
                                                                                                
                                            
                                        }
                                        
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    
                    </div>
    
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>