<?php
    if(isset($_POST["logout"])){
        setcookie("username","",time()-86400*14,"/");
        setcookie("password","",time()-86400*14,"/");
        session_destroy();
        header("Location: index.php");
    }
?> 