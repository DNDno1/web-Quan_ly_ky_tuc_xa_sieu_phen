<?php
    session_start();
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-4.0.0.min.js"></script> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="sticky-top">
            <nav class="navbar navbar-expand-lg bg-primary">
                <div class="container-lg h-100">
                    <a class="navbar-brand" href="home.php">
                        <p style="color: #f4511e;"><strong>KTX Hoa Hồng</strong></p>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#myNavbar">
                        <span class="navbar-toggler-icon"></span>         
                    </button>
                    <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="home.php"><strong>QUẢN LÝ PHÒNG</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="user.php"><strong>QUẢN LÝ TÀI KHOẢN</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php"><strong>GIỚI THIỆU</strong></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="person-circle.svg" class="rounded-circle" alt="avatar">
                            </a>
                            <ul class="dropdown-menu bg-primary">
                                <li><a class="dropdown-item" href="#"><strong>Thông báo</strong></a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="logout.php" method = "post">
                                        <button class="btn btn-dark dropdown-item" type="submit" name="logout" value="Logout"><img src="box-arrow-right.svg" alt=">"><strong>Thoát</strong></button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>    
        </div>
    </header>
</body>
</html>