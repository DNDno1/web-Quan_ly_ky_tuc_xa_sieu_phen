<?php
    include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body style="position: relative;">
    <div class="container-fluid position:absolute; top: 100px; left: 20px;">
        <div class="container-sm">
            <h1>Bảng quản lý sinh viên</h1>
            <table class ='table table-striped'>
                <tr>
                    <th>ID</th>
                    <th>fname</th>
                    <th>lname</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>email</th>
                    <th>phonenum</th>
                    <th>rating total</th>
                    <th>rating count</th>
                    <th>rating</th>
                    <th>room</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['position'] == 'student'){
                            $room = null;
                            if(isset($row['roomid'])){
                                $sql2 = "SELECT name FROM room WHERE id={$row['roomid']}";
                                $result2 = mysqli_query($con,$sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                $room = $row2['name'];
                            }
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['fname']}</td>
                            <td>{$row['lname']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['password']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phonenum']}</td>
                            <td>{$row['ratingtotal']}</td>
                            <td>{$row['ratingcount']}</td>
                            <td>{$row['rating']}</td>
                            <td>{$room}</td>
                            <td>
                                <a href='delete_user.php?id={$row['id']}' class='btn btn-danger'>Xóa</a>
                            </td>
                            <td>
                                <a href='edit_user.php?id={$row['id']}' class='btn btn-warning'>Sửa</a>
                            </td>
                        </tr>
                        ";    
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>