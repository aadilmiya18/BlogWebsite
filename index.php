<?php
session_start();
include("navbar.php");

if (isset($_GET['login']) &&!isset($_SESSION['user']['username'])) {
    include("commonLogin.php");
}elseif(isset($_GET['createPost']) && isset($_SESSION['user'])){
    include('createPost.php');

}elseif(isset($_GET['home']) && isset($_SESSION['user'])){
    include('showPost.php');

}elseif(!isset($_SESSION['user'])){
    include("commonLogin.php");
}else{
    include("showPost.php");
}
?>