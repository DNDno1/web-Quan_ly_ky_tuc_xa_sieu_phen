<?php
    $id =   $_GET['id'];
    include("connect.php");
    $sql = "DELETE FROM users WHERE id = $id";
    mysqli_query($con, $sql);
    header("Location: user.php");
?>