<?php
session_start();

$seller_id = $_SESSION['seller_id'];
// Get form data using POST method
$_SESSION[$seller_id . 'price'] = $_POST['price'];
$_SESSION[$seller_id . 'bedrooms'] = $_POST['bedrooms'];
$_SESSION[$seller_id . 'bathrooms'] = $_POST['bathrooms'];
$_SESSION[$seller_id . 'size'] = $_POST['size'];
$_SESSION[$seller_id . 'year_built'] = $_POST['year_built'];
$_SESSION[$seller_id . 'property_type'] = $_POST['property_type'];
$_SESSION[$seller_id . 'garages'] = empty($_POST['garages']) ? 'Not Available' : $_POST['garages'];
//$_SESSION[$seller_id . 'description'] = $_POST['description'];
$_SESSION[$seller_id . 'street'] = $_POST['street'];
$_SESSION[$seller_id . 'pincode'] = $_POST['pincode'];
$_SESSION[$seller_id . 'state'] = $_POST['state'];
$_SESSION[$seller_id . 'location'] = $_POST['location'];
$_SESSION[$seller_id . 'image'] = file_get_contents($_FILES['image']['tmp_name']);

header("location:property image upload.html");
?>