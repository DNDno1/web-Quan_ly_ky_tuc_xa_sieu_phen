<?php
    include("header.php");
    echo htmlspecialchars($_GET['id']);
    $sql = "SELECT * FROM users WHERE id=$_GET[id]";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi thông tin người dùng <?php echo $row['username']; ?></title>
</head>
<body>
    <div class="container row" style="position: relative">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 mt-5">
            <form action="temp.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="username">Tên người dùng:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'];?>">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password'];?>">
                <label for="fname">Sửa họ:</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['fname'];?>">
                <label for="lname">Sửa tên:</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['lname'];?>">
                <label for="email">Sửa email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>">
                <label for="phonenum">Sửa số điện thoại:</label>
                <input type="number" class="form-control" id="phonenum" name="phonenum" value="<?php echo $row['phonenum'];?>">
                <label for="homeaddress">Sửa địa chỉ:</label>
                <textarea class="form-control" id="homeaddress" name="homeaddress"><?php echo $row['homeaddress']; ?></textarea>
                <div class="m-2" style="position: absolute; right: 50px;">
                    <button type="submit" class='btn btn-primary'>Lưu thay đổi</button>
                    <a href="user.php" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</body>
</html>


