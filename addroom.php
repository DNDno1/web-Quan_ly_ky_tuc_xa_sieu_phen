
<?php
    include("header.php");
    //quản lý phòng
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phòng</title>
</head>
<body style="position:relative">
    <div class="container-fluid row" style="position:absolute; top:100px">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="row">
                    <input type="text" id="name" name="name" placeholder="Tên phòng">
                    <label for="cap">Số người tối đa/phòng</label>
                    <input type="number" id="cap" name="cap">
                    <label for="price">Giá phòng</label>
                    <input type="number" id="price" name="price">
                </div>
                <label for="des">Mô tả</label>
                <input type="text" class="form-control" row="7" id="des" name="des">
                <br>
                <div style="display: flex; align-items: right; justify-content: flex-end;">
                    <button type="submit" class="btn btn-primary mx-2">xác nhận</button>
                    <a href="home.php" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>
</html>


<?php
    if(isset($_POST["cap"]) && isset($_POST["price"]) && isset($_POST["name"])){
        $cap = $_POST["cap"];
        $price = $_POST["price"];
        $description = $_POST["des"];
        $name = $_POST["name"];
        $sql = "INSERT INTO room(cap, name ,price,description,ktxid) VALUES ('$cap','$name','$price','$description',1)";
        $result = mysqli_query($con,$sql);
        header("Location: home.php");
    }
?>