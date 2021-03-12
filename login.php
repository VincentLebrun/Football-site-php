<?php 
$message="";
if(!empty($_POST)){
$email =trim(strip_tags($_POST["email"]));
$password = trim(strip_tags($_POST["password"]));
$db = new PDO("mysql:localhost;dbname=telefoot", "root", "");
}


?>