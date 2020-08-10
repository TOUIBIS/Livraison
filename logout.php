<?php
session_start();


if(isset($_SESSION["login"])){
    
    unset($_SESSION["login"]);
    unset($_SESSION["pass"]);
    session_destroy();
    header("Location:login.html");
}
?>