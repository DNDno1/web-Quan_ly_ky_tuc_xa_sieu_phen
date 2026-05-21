<?php
    include("header.php");
    $sql = "DELETE FROM room WHERE id={$_GET['id']}";
    mysqli_query($con,$sql);
    header("Location: home.php");
?>