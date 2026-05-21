<?php
    $roomid = $_GET['roomid'];
    $studentid = $_GET['id'];
    include("connect.php");
    $sql = "UPDATE users SET roomid=NULL WHERE id=$studentid and roomid=$roomid";
    $result = mysqli_query($con,$sql);
    header("Location: room.php?id=$roomid");
?>
