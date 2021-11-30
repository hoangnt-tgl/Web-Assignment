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

    <?php require_once 'product.php '?>
    <?php
    
    if (isset($_SESSION['add']))
    {
        if ( $_SESSION['add'] == '1')
        {
            echo '<script>alert("Add Success")</script>';
        }
        else
        {
            echo '<script>alert("Add Fail")</script>';
        }
        unset($_SESSION['add']);
    }
    ?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-task-bar" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class=""></i>THTH</div>
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
                            <h3 class="fs-4 mb-3" style="float: left;">All Products</h3>
                          
                            <button class="view-modal" >Add Product</button>
                            <button class="view-modal2" >Edit Product</button>
                            <button class='view-btn' id='tomainweb'>View Main Web</button>
                            
                        
                        <div class="col">
                       
                        <br><br>
                            <table id ="ptable"class="table bg-white rounded shadow-sm  table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" >ID</th>
                                        <th scope="col" class="productname">Name</th>
                                        <th scope="col" class="price">Price</th>
                                        <th scope="col" class="sale">Sale</th>
                                        <th scope="col" class="rate">Favourite</th>
                                        <th scope="col" class="quan">Quantity</th>
                                        <th scope="col" class="recom"></th>
                                        
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
                                                    ?>
                                                    <td scope='col' class='recom'>
                                                        <a href="product.php?delete=<?php echo $row['product_id'];?>" class ="btn btn-danger">Delete</a></td>
                                                    <?php
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
        
  <div class="popup">
    <header>
      <span>Add New Product</span>
      <div class="close"><i class="fas fa-times-circle"></i></div>
    </header>
    <div class="content">
      
      <div class="field">
    <form action="product.php" method = "POST">
      
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Name</h5>  
                <input  type="text" name="name-product" class="input-admin-product px-3" >           
            </div>
        </div>
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Price</h5>  
                <input  type="text" name="price-product" class="input-admin-product px-3" >           
            </div>
        </div>
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Image</h5>  
                <input type="file" class="img2" name="image-product" accept="image/*">        
            </div>
        </div>
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Quantity</h5>  
                <input  type="text" name="quantity-product" class="input-admin-product px-3" >           
            </div>
        </div>
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Description</h5>  
                <textarea name="des-product"  class="input-register-about px-3" placeholder="E.g. I like action game"></textarea>
                                         
            </div>
        </div>
        
        <div class="form-row py-1 pt-1">
        <label >OS:</label>
            <select name="os" >
                <option value="Windows 7">Windows 7</option>
                <option value="Windows 10">Windows 10</option>
             
            </select>
            <label >Processor:</label>
            <select name="pro" >
                <option value="Intel Core i3-530">Intel Core i3-530</option>
                <option value="Intel Core i7">Intel Core i7</option>
             </select>
            
        </div>
        <div class="form-row py-1 pt-1">
        <label >Memmory:</label>
            <select name="mem" >
                <option value="4">4</option>
               <option value="8">8</option> 
            </select>
            <label >Storage  :</label>
            <select name="sto" >
                <option value="3">3</option>
                <option value="4">4</option>
               
             </select>
        </div>
        <div class="form-row py-1 pt-1">
            <label >Graphic:</label>
            <select name="gra" >
                <option value="NVIDIA GeForce GTX 260 / ATI Radeon HD 4870">NVIDIA GeForce GTX 260 / ATI Radeon HD 4870</option>
                <option value="NVIDIA GeForce GTX 260 / ATI Radeon HD 4870">NVIDIA GeForce GTX 260 / ATI Radeon HD 4870</option>
             </select>
        </div>
        <div class="form-row py-1 pt-1">
        <div class="offset-3 col-lg-10">                
        <input type="submit" name ="save" class="add-btn text-center" value="AddProduct" />                                                            
        </div>                                  
        </div>
    </form>
        
      </div>
    </div>
  </div>
  <div class="popup2">
    <header>
      <span>Edit Product</span>
      <div class="close2"><i class="fas fa-times-circle"></i></div>
    </header>
    <div class="content2">
      
      <div class="field2">
    <form action="product.php" method = "POST">
      
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Name</h5>  
                <input  type="text" name="name-product2" class="input-admin-product px-3" >           
            </div>
        </div>
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Price</h5>  
                <input  type="text" name="price-product2" class="input-admin-product px-3" >           
            </div>
        </div>
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Image</h5>  
                <input type="file" class="img2" name="image-product2" accept="image/*">        
            </div>
        </div>
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Quantity</h5>  
                <input  type="text" name="quantity-product2" class="input-admin-product px-3" >           
            </div>
        </div>
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Description</h5>  
                <textarea name="des-product2"  class="input-register-about px-3" placeholder="E.g. I like action game"></textarea>
                                         
            </div>
        </div>
        
        <div class="form-row py-1 pt-1">
        <label >OS:</label>
            <select name="os2" >
                <option value="Windows 7">Windows 7</option>
                <option value="Windows 10">Windows 10</option>
             
            </select>
            <label >Processor:</label>
            <select name="pro2" >
                <option value="Intel Core i3-530">Intel Core i3-530</option>
                <option value="Intel Core i7">Intel Core i7</option>
             </select>
            
        </div>
        <div class="form-row py-1 pt-1">
        <label >Memmory:</label>
            <select name="mem2" >
                <option value="4">4</option>
               <option value="8">8</option> 
            </select>
            <label >Storage  :</label>
            <select name="sto2" >
                <option value="3">3</option>
                <option value="4">4</option>
               
             </select>
        </div>
        <div class="form-row py-1 pt-1">
            <label >Graphic:</label>
            <select name="gra2" >
                <option value="NVIDIA GeForce GTX 260 / ATI Radeon HD 4870">NVIDIA GeForce GTX 260 / ATI Radeon HD 4870</option>
                <option value="NVIDIA GeForce GTX 260 / ATI Radeon HD 4870">NVIDIA GeForce GTX 260 / ATI Radeon HD 4870</option>
             </select>
        </div>
        <div class="form-row py-1 pt-1">
        <div class="offset-3 col-lg-10">                
        <input type="submit" name ="save3" class="add-btn text-center" value="SaveProduct" />                                                            
        </div>                                  
        </div>
    </form>
        
      </div>
    </div>
  </div>
  <script>
    const viewBtn = document.querySelector(".view-modal"),
    popup = document.querySelector(".popup"),
    close = popup.querySelector(".close"),
    field = popup.querySelector(".field");
    viewBtn.onclick = ()=>{
      popup.classList.toggle("show");
    }
    close.onclick = ()=>{
      viewBtn.click();

    
    }
    document.getElementById("tomainweb").onclick = function () {
        location.href = "./store.php";}
  
  </script>
   <script>
    const viewBtn2 = document.querySelector(".view-modal2"),
    popup2 = document.querySelector(".popup2"),
    close2 = popup.querySelector(".close2"),
    field2 = popup.querySelector(".field2");
    viewBtn2.onclick = ()=>{
      popup2.classList.toggle("show");
    }
    close2.onclick = ()=>{
      viewBtn2.click();

    
    }
 
  
  </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>