<?php
session_start();
$_SESSION['userID'] = "";
$_SESSION['username'] = "";
$_SESSION['password'] = "";
if(empty($_SESSION['userId'])) 
header("location: index.php");
?>