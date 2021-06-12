<?php
    session_start();
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
        setcookie("user",$_SESSION["acount"],time()+3600);
        setcookie('href',parseurl($_COOKIE['href']),time()+3600);
        $url=$_COOKIE['href'];
        header("refresh:0;url=$url");
    } else {
        $_SESSION["admin"] = false;
        header("refresh:0;url=I21_sign_in.html");
    }
    function parseurl($url=""){
        $url = rawurlencode(mb_convert_encoding($url, 'gb2312', 'utf-8'));
        $a = array("%3A", "%2F", "%40");
        $b = array(":", "/", "@");
        $url = str_replace($a, $b, $url);
        return $url;
    }
?>