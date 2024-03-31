<?php
session_start();

$_SESSION['user_name'] = $_POST['name'];
$_SESSION['user_email'] = $_POST['email'];
$_SESSION['user_phone'] = $_POST['phone'];
$_SESSION['user_address'] = $_POST['address'];

header("Location: user password.html");
?>
