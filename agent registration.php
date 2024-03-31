<?php
session_start();

$_SESSION['full_name'] = $_POST['full_name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['phone_number'] = $_POST['phone_number'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['website'] = $_POST['website'];
$_SESSION['experience'] = $_POST['experience'];
$_SESSION['image'] = file_get_contents($_FILES['image']['tmp_name']);

header("Location: agent password.html");
?>
