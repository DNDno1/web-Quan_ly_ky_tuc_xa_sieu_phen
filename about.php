<?php
    include("header.php");
    $sql = "select * from ktx where id = 1";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu</title>
    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="jquery-4.0.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">    
        <h1 class="text-center">Chào mừng đến với kí túc xá <?php  echo $row['name']?></h1>
        <h4 class="text-center">Địa chỉ: <?php  echo $row['address']?></h4>
        <p class="text-center"><?php  echo $row['description']?></p>
    </div>
</body>
</html>