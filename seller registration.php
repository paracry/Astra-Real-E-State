<?php
session_start();

$_SESSION['seller_name'] = $_POST['name'];
$_SESSION['seller_email'] = $_POST['email'];
$_SESSION['seller_phone'] = $_POST['phone'];
$_SESSION['seller_address'] = $_POST['address'];

header("Location: seller password.html");
?>
