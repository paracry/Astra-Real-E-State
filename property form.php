<?php
session_start();

// Get form data using POST method
$_SESSION['price'] = $_POST['price'];
$_SESSION['bedrooms'] = $_POST['bedrooms'];
$_SESSION['bathrooms'] = $_POST['bathrooms'];
$_SESSION['size'] = $_POST['size'];
$_SESSION['description'] = $_POST['description'];
$_SESSION['street'] = $_POST['street'];
$_SESSION['pincode'] = $_POST['pincode'];
$_SESSION['state'] = $_POST['state'];
$_SESSION['location'] = $_POST['location'];
$_SESSION['seller_id'] = 2; // Assuming user is logged in and user_id is stored in session
$_SESSION['image'] = file_get_contents($_FILES['image']['tmp_name']);
//$_SESSION['image'] = $conn->real_escape_string($_SESSION['image']);

$price = $_SESSION['price'];
$bedrooms = $_SESSION['bedrooms'];
$bathrooms = $_SESSION['bathrooms'];
$size = $_SESSION['size'];
$description = $_SESSION['description'];
$street = $_SESSION['street'];
$pincode = $_SESSION['pincode'];
$state = $_SESSION['state'];
$location = $_SESSION['location'];
$seller_id = 2; // Assuming user is logged in and user_id is stored in session
$image=$_SESSION['image'];
//
//echo $price;
//echo $bedrooms;
//echo $bathrooms;
//echo $size;
//echo $description;
//echo $street;
//echo $pincode;
//echo $state;
//echo $location;
//echo $seller_id;
//echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['image']) . '"/>';
//

header("location:property image upload.html");
?>
