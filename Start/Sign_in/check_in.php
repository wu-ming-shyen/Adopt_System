<?php
    session_start();
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
        setcookie("user",$_SESSION["acount"],time()+3600);
        $url=urldecode($_COOKIE['href']);
        header("refresh:0;url=$url");
    } else {
        $_SESSION["admin"] = false;
        header("refresh:0;url=I21_sign_in.html");
    }
?>