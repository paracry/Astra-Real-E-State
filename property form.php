<?php
session_start();

$seller_id = $_SESSION['seller_id'];

$_SESSION[$seller_id . 'price'] = $_POST['price'];
$_SESSION[$seller_id . 'bedrooms'] = $_POST['bedrooms'];
$_SESSION[$seller_id . 'bathrooms'] = $_POST['bathrooms'];
$_SESSION[$seller_id . 'size'] = $_POST['size'];

if (preg_match("/^(19\d{2}|20\d{2}|$currentYear)$/", $_POST['year_built'])) {
    $_SESSION[$seller_id . 'year_built'] = $_POST['year_built'];
    unset($_SESSION['property_error_year']);
} else {
    $_SESSION['property_error_year'] = "<p style='color:red;'>Invalid Year format. Please enter a valid Year.</p>";


}

$_SESSION[$seller_id . 'property_type'] = $_POST['property_type'];
if (isset($_POST['garages'])) {
    $_SESSION[$seller_id . 'garages'] = $_POST['garages'];
} else {
    $_SESSION[$seller_id . 'garages'] = 'Not Available';
}


if ($_SESSION['street'] = preg_match('/^(.*),\s(.*)$/', $_POST['street'])) {
    $_SESSION[$seller_id . 'street'] = $_POST['street'];
    unset($_SESSION['property_error_area']);
} else {
    $_SESSION['property_error_area'] = "<p style='color:red;'>Invalid Location format. Please enter a valid Location (for eg : Laban, Shillong).</p>";
}

if ($_SESSION['pincode'] = preg_match('/^\d{6}$/', $_POST['pincode'])) {
    $_SESSION[$seller_id . 'pincode'] = $_POST['pincode'];
    unset($_SESSION['property_error_pincode']);
} else {
    $_SESSION['property_error_pincode'] = "<p style='color:red;'>Invalid pincode format. Please enter a valid Pincode.</p>";
}


$_SESSION[$seller_id . 'state'] = $_POST['state'];

$_SESSION[$seller_id . 'location'] = $_POST['location'];
$_SESSION[$seller_id . 'image'] = file_get_contents($_FILES['image']['tmp_name']);

if (isset($_SESSION['property_error_area']) || isset($_SESSION['property_error_state']) || isset($_SESSION['property_error_pincode']) || isset($_SESSION['property_error_year'])) {
    header('Location: property form form.php');
} else {
    header("location:property image upload.html");
}


?>