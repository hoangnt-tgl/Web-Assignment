<?php
    require_once('config.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    function AddToCart($id){
        echo $id;
    }
    $_SESSION['username'] = "tronghoang";
    if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $sql = 'select * from `account`';
        $accountList = executeResult($sql);
        foreach($accountList as $std){
            if ($username === $std['account_id']){
            break;
            }
            
        }
            echo'
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Giỏ Hàng</h5>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                        <div class="cart-row">
                            <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                            <span class="cart-price cart-header cart-column">Giá</span>
                            <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                        </div>
                        <div class="cart-items">
                        <div class="cart-row">
                            <div class="cart-item cart-column">
                                <img class="cart-item-image" src="http://localhost:8080/HoangLC/Web-assignment1/images/news001.jpg" width="100" height="100">
                                <span class="cart-item-title">God of Wars</span>
                            </div>
                            <span class="cart-price cart-column">50.99$</span>
                            <div class="cart-quantity cart-column">
                                <input class="cart-quantity-input" type="number" value="1">
                                <button class="btn btn-danger" type="button">Xóa</button>
                            </div>
                        </div>
                        </div>
                        <div class="cart-total">
                            <strong class="cart-total-title">Tổng Cộng:</strong>
                            <span class="cart-total-price">0$</span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded close-footer">Đóng</button>
                        <button type="button" class="btn btn-rounded order">Thanh Toán</button>
                    </div>
                </div>
            </div>
            <div type="button" class="rounded-pill btn-rounded">
            <b  class="d-flex align-items-center dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                '.$std['account_id'].'
            </b>
            <span>
            <img src="'.$std['image'].'" alt="" width="32" height="32" class="rounded-circle me-2">
            </span>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" id="cart">Cart</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="./edit-profile.php">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="./logout.php">Sign out</a></li>
            </ul>
            </div>
            ';
    }
    else{
        echo'
        <button type="button" class="rounded-pill btn-rounded">Log In / Sign Up
            <span>
                <i class="far fa-user"></i>
            </span>
        </button>
        ';
    }
    ?>

