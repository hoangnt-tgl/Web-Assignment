<?php
                  
                 
                      session_start(); 
            
                      $error_fullname="";
                      $servername = "localhost:3307";
                      $username = "root";
                      $password = "";
                      $dbname = "thth_company";
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      if ($conn->connect_error) {
                          echo "connect fail";
                          die("Connection failed: " . $conn->connect_error);
                          }
                      $id = $_POST["id"];
                      $password = $_POST["password"]; 
                      $sql = "SELECT * from account where account_id = '$id' && password = '$password'";
                      $result = mysqli_query($conn,$sql);
                      $num = mysqli_num_rows($result);
                      if ($num == 1)
                      {
                          $permission = $result->fetch_array()['permission'];
                        if($permission == 1)
                        {
                            header('location:admin-dashboard.php');
                        }
                        else
                        {
                          header("location:index.php");
                          $_SESSION['username'] = $id;
                        }
                        
                          
                      }
                      else
                      {

                        $_SESSION['error'] = "error username";
                        header('location:login.php');
                          
                      }
                      

                  
                  ?>