<?php
    session_start();
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
        $_SESSION["admin"] = false;
        setcookie("user","",time()-3600);
        setcookie("url","",time()-3600);
        setcookie("href","",time()-3600);
        header("refresh:0;url=../index.html");
    } else {
        $_SESSION["admin"] = false;
        header("refresh:0;url=check_in.html");
    }
?>