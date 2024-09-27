<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
        <div class="container-fluid">
            <div class="my-logo">
                <a class="navbar-brand" href="#">
                    <img src="images/logo2.png" alt="" class="img-fluid">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./login.php">Đăng nhập</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Nội dung cần tìm" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Tìm</button>
            </form>
            </div>
        </div>
    </nav>
</header>

<main class="container mt-5 mb-5">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign Up</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form action="signup.php" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="txtUser"><i class="fas fa-user"></i></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                        <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Password" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="submit" value="Sign Up" class="btn float-end login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    Already have an account?<a href="./login.php" class="text-warning text-decoration-none">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2" style="height:80px">
    <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<?php
    include 'connect.php';
    if(isset($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != '' && $_POST["repassword"] != '' )
    {   
        //Lấy dữ liệu người dùng nhập vào
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        if($password != $repassword){    //Kiểm tra xem nhập lại mật khẩu có trùng với mật khẩu hay không
            ?>
            <script>alert("Mật khẩu không trùng mời kiểm tra lại");
            window.location.href="/signup.php";</script>
            <?php
        }
        else if(strlen($password)<7){
            ?>
            <script>alert("Mật khẩu quá ngắn. Mật khẩu phải trên 8 kí tự");
            window.location.href="/signup.php";</script>
            <?php

        }

        else{
            $sql = "SELECT * FROM users WHERE username= '$username' ";
            $old = mysqli_query($conn,$sql);
            $password = md5($password); //Mã hóa password tăng bảo mật 
            if( mysqli_num_rows($old) > 0){
                ?>
                <script>alert("username này đã tồn tại");
                window.location.href="/signup.php";</script>
                <?php
            }
            else{
                $sql = "INSERT INTO users (username,password) VALUES ('$username','$password')  ";
                mysqli_query($conn,$sql);
                ?>
                <script>alert("Thêm thành công tài khoản cho nhân viên");
                window.location.href="/signup.php";</script>
                <?php
            }

        }   
    
    }
?>

</body>
</html>