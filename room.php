<?php
    include("header.php"); 
    $sql = "SELECT * FROM users WHERE roomid={$_GET['id']}";
    $result = mysqli_query($con,$sql);
    $cur =  mysqli_num_rows($result);
?>
<?php
    $sql = "UPDATE room SET cur = $cur WHERE id = {$_GET['id']}";
    $result = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng <?php $sql="SELECT * FROM room WHERE id={$_GET['id']}"; $result = mysqli_query($con, $sql); $row = mysqli_fetch_assoc($result); echo $row['name']; ?></title>
</head>
<body class="position-relative" >
    <div class="position-absolute left-1 top-10 m-3">
        <a href="home.php" class="btn btn-primary">< Quay lại</a>
    </div>
    <div class="container-fluid row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1 class="text-center">Phòng <?php $sql="SELECT * FROM room WHERE id={$_GET['id']}"; $result = mysqli_query($con, $sql); $row = mysqli_fetch_assoc($result); echo $row['name']; ?></h1>
            <hr>
            <p class="text-center">Số người hiện tại: <?php $sql="SELECT * FROM room WHERE id={$_GET['id']}"; $result = mysqli_query($con, $sql); $row = mysqli_fetch_assoc($result); echo "{$row['cur']}/{$row['cap']}"; $status = "true"; if($row['cur'] == $row['cap']) $status = "false"; ?></p>
            <p class="text-center">Giá phòng: <?php $sql="SELECT * FROM room WHERE id={$_GET['id']}"; $result = mysqli_query($con, $sql); $row = mysqli_fetch_assoc($result); echo $row['price']; ?></p>
            <hr>
            <h2 class="text-center">Mô tả</h2>
            <?php 
                $sql = "SELECT * FROM room WHERE id={$_GET['id']}";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($result);
                echo "<p class='text-center'>{$row['description']}</p>";
            ?>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <br>
    <div style="position: absolute; right: 20px;">
        <a href="add_student.php?roomid=<?php echo $_GET['id']; ?>&&status=<?php echo $status; ?>" class="btn btn-primary">Thêm sinh viên +</a>
        <a href="edit_room.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary">Chỉnh sửa phòng</a>
        <a href="delete_room.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary">Xóa phòng</a>
    </div>
    <br>
    <br>
    <h2 class="text-center">Danh sách sinh viên trong phòng</h2>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>fname</th>
                <th>lname</th>
                <th>username</th>
                <th>email</th>
                <th>phonenum</th>
                <th>Xóa</th>
            </tr>
            <?php
                $sql = "SELECT * FROM users WHERE roomid={$_GET['id']}";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['fname']}</td>
                        <td>{$row['lname']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phonenum']}</td>
                        <td>
                            <a href='delete_student.php?roomid={$_GET['id']}&id={$row['id']}' class='btn btn-danger'>Xóa</a>
                        </td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div>
    
</body>
</html>
