<?php
include "includes/header.php";

if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
    $_SESSION['message']="<div class='chip close green white-text'>You have been Logged Out Successfully.</div>";
    
    header("Location:login.php");
}else{
    $_SESSION['message'] ="<div class='chip close red black-text'>You are not Logged in. Please Login To Continue.</div>";
    header("Location:login.php");  
}