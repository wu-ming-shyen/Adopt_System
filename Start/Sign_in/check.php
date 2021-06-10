<?php
    session_start();
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
        setcookie("user",$_SESSION["acount"],time()+3600);
        header("refresh:0;url=User/U01_user_UI.html");
    } else {
        $_SESSION["admin"] = false;
        header("refresh:0;url=I21_sign_in.html");
    }
?>