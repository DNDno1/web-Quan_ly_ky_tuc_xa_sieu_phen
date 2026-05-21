<?php
    include("connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phonenum = $_POST['phonenum'];
        $homeaddress = $_POST['homeaddress'];
        $sql = "UPDATE users SET username='$username', password='$password', fname='$fname', lname='$lname', email='$email', phonenum='$phonenum', homeaddress='$homeaddress' WHERE id='" . htmlspecialchars($_POST['id']) . "'";
        mysqli_query($con, $sql);
        header("Location: user.php?");
    }
?>