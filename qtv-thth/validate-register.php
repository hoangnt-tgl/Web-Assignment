<?php
                  
                 
                      session_start(); 
                    
                      $error_fullname="";
                      $servername = "localhost";
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
                      $birthday = $_POST["birthday"];  
                      $email = $_POST["email"]; 
                      $phone = $_POST["phone"]; 
                      $about = $_POST["about"]; 
                      $permission = 0;
                      $sql1 = "INSERT INTO account (account_id, password, email,birthday,phonenumber,about,permission) 
                      VALUES ('$id', '$password','$email', '$birthday','$phone','$about','$permission')";
                      if ($conn->query($sql1) === TRUE)
                      {
                        echo "Add sucessful";
                        header('location:login.php');
                          
                      }
                      else
                      {

                        $_SESSION['error'] = "error username";
                        header('location:register.php');
                          
                      }
                      

                  
                  ?>