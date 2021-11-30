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
                                  
                                        $sql1 = "SELECT * from news ";
                                        $result1 = mysqli_query($conn,$sql1); 
                                        $amount1 = mysqli_num_rows($result1) - 1;
                                        echo '<h3 class="fs-2">'.$amount1.'</h3>';
                                    ?>
                                    <p class="fs-5">Total News</p>
                                </div>
                                <i class="fas fa-newspaper fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>
    
                       
                    </div>
                    <h3 class="fs-4 mb-3" style="float: left;">Current News</h3>
                    <button class="view-modal" >Add News</button>
                    <button class='view-btn' id='tomainweb'>View Main Web</button>
                    <br><br>
                    <div id="page-content-wrapper-new">  
                        <ul id="item">
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
                                        $sql = "SELECT * from news";
                                        $result = mysqli_query($conn,$sql);
                                        if ($result->num_rows > 0)
                                        {
                                            
                                            while($row = $result ->fetch_assoc())
                                            {
                                                
                                                   
                                                    echo "<di class='myItem'>";
                                                    echo "<h3>". $row['title']."</h3>";
                                                    $link = './new_info.php?id=' . $row['news_id'];
                                                   
                                                    echo    "<a href=".$link.">View Detail </a>";
                                                    

                                                    ?>
                                                    <a  style="margin-left:20px;"href="product.php?delete2=<?php echo $row['news_id'];?>" class ="btn btn-danger">Delete</a>
                                                    <?php
                                                    echo "</di>";
                                                
                                                                                                
                                            }
                                        }
                                        
                                    ?>
                        
                       
                        
                </ul>

                                </div>
                                </div>

                                <div class="popup">
    <header>
      <span>Add News</span>
      <div class="close"><i class="fas fa-times-circle"></i></div>
    </header>
    <div class="content">
      
      <div class="field">
    <form action="product.php" method = "POST">
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Title</h5>  
                <input  type="text" name="title-news" class="input-admin-product px-3" >           
            </div>
        </div>
       
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Image</h5>  
                <input type="file" class="img2" name="image-news" accept="image/*">           
            </div>
        
        <div class="form-row py-1 pt-1">
            <div class="text-start offset-0">
                <h5 style="float:left;">Description</h5>  
                <textarea name="descreption-news"  class="input-register-about px-3" placeholder="E.g. I like action game"></textarea>
                                         
            </div>
        </div>
        
        
        <div class="form-row py-1 pt-1">
        <div class="offset-3 col-lg-10">                
        <input type="submit" name ="save2" class="add-btn text-center" value="Add News" />                                                            
        </div>                                  
        </div>
    </form>
        
      </div>
    </div>
  </div>
                                <script>
                                        var Item = document.getElementById("item");
                                        Item.style.display= "grid";
                                </script>
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
        location.href = "./news.php";}
  
  </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>