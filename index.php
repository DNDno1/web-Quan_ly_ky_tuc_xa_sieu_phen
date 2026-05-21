<?php
    session_start();
    if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
        $_SESSION["username"] = $_COOKIE["username"];
        $_SESSION["password"] = $_COOKIE["password"];
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-4.0.0.min.js"></script>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-item-center row">
        <div class="col-sm-4"></div>
        <div class = "login col-sm-4">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method = "post">
                <div class="form-floating p-2">
                    <input type="text" class="form-control" name="username" id="username" placeholder="username" value=<?php if(isset($_COOKIE["username"])) echo"{$_COOKIE["username"]}";?>>
                    <label for="username">username</label>
                </div>
                <div class="form-floating p-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="password" value=<?php if(isset($_COOKIE["password"])) echo"{$_COOKIE["password"]}";?>>
                    <label for="password">mật khẩu</label>
                </div>
                <div class="d-flex justify-content-between pe-2 ps-2">
                    <button type="submit" class="btn btn-secondary px-3 py-2" name ="login">login</button>
                    
                    <button class="btn px-3 py-2" name ="regis"><a href="register.php">đăng ký</a></button>
                </div>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</body>
</html>
<?php
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        include("connect.php");
        try{
            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($con,$sql);    
            if(mysqli_num_rows($result) > 0){
                $time_expire = (86400 * 14); // chinh sua thoi gian cho moi cookie
                setcookie("username", $username, time() + $time_expire, "/");
                setcookie("password", $password, time() + $time_expire, "/");
                $_SESSION["username"] = $_COOKIE["username"];
                $_SESSION["password"] = $_COOKIE["password"];
                header("Location: home.php");
            }
        }
        catch(mysqli_sql_exception){
            echo "sai tên đăng nhập hoặc mật khẩu";
        }
    }
?>