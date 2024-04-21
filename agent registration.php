<?php
session_start();
$_SESSION['full_name'] = $_POST['full_name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['about'] = $_POST['about'];
$_SESSION['phone_number'] = $_POST['phone_number'];
$_SESSION['state'] = $_POST['state'];
$_SESSION['area'] = $_POST['area'];
$_SESSION['pincode'] = $_POST['pincode'];
$_SESSION['address_url'] = $_POST['address_url'];
$_SESSION['website'] = $username = isset($_POST['website']) ? $_POST['website'] : 'Not Available';
$_SESSION['experience'] = $_POST['experience'];
$_SESSION['price'] = $_POST['price'];
$_SESSION['negotiable'] = $_POST['negotiable'];
$_SESSION['image'] = file_get_contents($_FILES['image']['tmp_name']);

header("Location: agent password.html");
?>