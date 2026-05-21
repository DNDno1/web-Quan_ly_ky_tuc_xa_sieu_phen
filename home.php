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
<body">
    <div class="container-fluid">
        <div style="position: relative;">
            <form action="addroom.php" method="$_GET">
                <div style="position:absolute; right: 75px; margin-top: 20px;">
                    <button class="btn btn-primary" type="submit"> Thêm phòng +</button> 
                </div>
            </form>
        </div>
        <br><br>
        <div class="container-fluid">
            <div class="row">
                <?php 
                    $sql = "SELECT * FROM room";
                    $result = mysqli_query($con,$sql);
                    $count = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <div class='col-sm-4'>
                            <div class='card'>
                                <img src='...' class='card-img-top' alt='...'>
                                <hr>
                                <div class='card-body'>
                                    <h1 class='card-title text-center'>{$row['name']}</h1>
                                    <p class='card-text text-center'>Số người hiện tại: {$row['cur']}/{$row['cap']}</p>
                                    <p class='card-text text-center'>Giá phòng: {$row['price']}</p>
                                    <hr>
                                    <p class='card-text'>Mô tả:{$row['description']}</p>
                                    <a href='room.php?id={$row['id']}' class='btn btn-primary'>Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                        ";
                        $count++;
                        if($count == 3){
                            echo "</div> <br> <div class='row'>";
                            $count = 0;
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
