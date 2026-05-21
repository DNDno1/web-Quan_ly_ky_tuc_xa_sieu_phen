
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-4.0.0.min.js"></script>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-item-center row">
        <div class="col-sm-4"></div>
        <div class = "regis col-sm-4">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post">
                <div class="form-floating p-2">
                    <input type="text" class="form-control" name="username" id="username" placeholder="username">
                    <label for="username">username*</label>
                </div>
                <div class="form-floating p-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    <label for="password">mật khẩu*</label>
                </div>
                <div class="row p-2">
                    <div class="col-sm-6 form-floating">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="fname">
                        <label for="fname">họ*</label>
                    </div>    
                    <div class="col-sm-6 form-floating">
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="lname">
                        <label for="lname">tên*</label>
                    </div>
                </div>
                <div class="form-floating p-2">
                    <input type="number" class="form-control" name="phonenum" id="phonenum" placeholder="phonenum">
                    <label for="phonenum">số điện thoại*</label>
                </div>
                <div class="form-floating p-2">
                    <input type="email" class="form-control" name="email" id="email" placeholder="abc@gmail.com">
                    <label for="email">email*</label>
                </div>
                <div class="form-floating p-2">
                    <input type="text" class="form-control" name="homeaddress" id="homeaddress" placeholder="ABC, CDE">
                    <label for="homeaddress">địa chỉ nhà</label>
                </div>
                <div class="d-flex justify-content-between pe-2 ps-2">
                    <button type="submit" class="btn btn-secondary p-2" name ="regis">đăng ký</button>

                    <button class="btn p-2" name="login"><a href="index.php">đăng nhập</a></button>
                </div>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</body>
</html>
<?php //login after regis
    $position = "student";
    if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["phonenum"])){
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $phonenum = $_POST["phonenum"];
        $email = $_POST["email"];
        $homeaddress = $_POST["homeaddress"];
        include("connect.php");
        $sql = "INSERT INTO users (fname, lname, phonenum, email, homeaddress, username, password, position) VALUES ('$fname', '$lname', '$phonenum', '$email', '$homeaddress', '$username', '$password', '$position')";
        $result = mysqli_query($con,$sql);
        echo"oke";
        mysqli_close($con);
        $time_expire = (86400 * 14); // chinh sua thoi gian cho moi cookie
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("Location: home.php");
    }
?>