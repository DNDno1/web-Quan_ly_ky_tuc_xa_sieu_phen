<?php
    include("header.php");
    $roomid = $_GET['roomid'];
    if(!isset($_GET['status']) || $_GET['status'] == "false"){
        header("Location: room.php?id=$roomid");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm học sinh vào phòng</title>
</head>
<body>
    <div class="container mt-5" style="position: relative">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <div class="row">
                <div class="col-sm-10">
                    <label for="student">Chọn học sinh:</label>
                    <select class="form-control" name="student" id="student">
                        <?php
                            $sql = "SELECT * FROM users WHERE position = 'student'";
                            $result = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                if($roomid != $row['roomid']){
                                    echo "<option value='{$row['id']}'>"."Họ:{$row['fname']}  tên:{$row['lname']}  username:{$row['username']}  email:{$row['email']}"."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-sm-2 align-self-end">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                    <a href="room.php?id=<?php echo $roomid;?>" class="btn btn-danger">Hủy</a>
                </div>
            </div>
            
        </form>
    </div>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $studentid = $_POST['student'];
        $sql = "UPDATE users SET roomid=$roomid WHERE id=$studentid";
        mysqli_query($con, $sql);
        header("Location: room.php?id=$roomid");
    }
?>