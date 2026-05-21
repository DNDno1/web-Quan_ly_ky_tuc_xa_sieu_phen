<?php 
    include("header.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM room WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa phòng</title>
</head>
<body>
    <div class="container row" style="position: relative">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 mt-5">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <label for="name">Tên phòng:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
                <label for="cap">Sửa sức chứa:</label>
                <input type="number" class="form-control" id="cap" name="cap" value="<?php echo $row['cap']; ?>">
                <label for="price">Sửa giá phòng:</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
                <label for="description">Sửa mô tả:</label>
                <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
                <div class="m-2" style="position: absolute; right: 50px;">
                    <button type="submit" class='btn btn-primary'>Lưu thay đổi</button>
                    <a href="room.php?id=<?php echo $id; ?>" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $cap = $_POST['cap'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $sql = "UPDATE room SET name='$name', cap=$cap, price=$price, description='$description' WHERE id=$id";
        mysqli_query($con, $sql);
        header("Location: room.php?id=$id");
    }
?>