<?php 
session_start();
if(!isset($_SESSION["user"]) ||($_SESSION["user_ip"] != $_SERVER["REMOTE_ADDR"])) {
    header("Location: login.php");
}
?>