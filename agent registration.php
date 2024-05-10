<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SESSION['full_name'] = preg_match('/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/', $_POST['full_name'])) {
    $_SESSION['full_name'] = $_POST['full_name'];
    unset($_SESSION['agent_error_name']);
} else {
    $_SESSION['agent_error_name'] = "<p style='color:red;'>Invalid name format. Please enter a valid name(for eg: Ronit Rajput).</p>";
}


if ($_SESSION['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM agent WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $_SESSION['agent_error_email'] = "<p style='color:red;'>Email already exists in the database.</p>";
    } else {
        $_SESSION['seller_email'] = $email;
        unset($_SESSION['agent_error_email']);
    }
} else {
    $_SESSION['agent_error_email'] = "<p style='color:red;'>Invalid email format. Please enter a valid email.</p>";
}


$_SESSION['about'] = $_POST['about'];

if ($_SESSION['phone_number'] = preg_match('/^\d{10}$/', $_POST['phone_number'])) {
    $_SESSION['phone_number'] = $_POST['phone_number'];
    unset($_SESSION['agent_error_phone']);
} else {
    $_SESSION['agent_error_phone'] = "<p style='color:red;'>Invalid phone format. Please enter a valid Phone number.</p>";
}


if ($_SESSION['area'] = preg_match('/^[a-zA-Z ]+$/', $_POST['area'])) {
    $_SESSION['area'] = $_POST['area'];
    unset($_SESSION['agent_error_area']);
} else {
    $_SESSION['agent_error_area'] = "<p style='color:red;'>Invalid area format. Please enter a valid Area.</p>";
}


if ($_SESSION['pincode'] = preg_match('/^\d{6}$/', $_POST['pincode'])) {
    $_SESSION['pincode'] = $_POST['pincode'];
    unset($_SESSION['agent_error_pincode']);
} else {
    $_SESSION['agent_error_pincode'] = "<p style='color:red;'>Invalid pincode format. Please enter a valid Pincode.</p>";
}

$_SESSION['state'] = $_POST['state'];

$_SESSION['address_url'] = $_POST['address_url'];

$_SESSION['website'] = $username = isset($_POST['website']) ? $_POST['website'] : 'Not Available';

$_SESSION['experience'] = $_POST['experience'];

$_SESSION['price'] = $_POST['price'];

$_SESSION['negotiable'] = $_POST['negotiable'];

$_SESSION['image'] = file_get_contents($_FILES['image']['tmp_name']);


if (isset($_SESSION['agent_error_name']) || isset($_SESSION['agent_error_email']) || isset($_SESSION['agent_error_phone']) || isset($_SESSION['agent_error_area']) || isset($_SESSION['agent_error_pincode'])) {
    header("Location: agent registration form.php");
    exit();
} else {
    header("Location: agent password form.php");
    exit();
}



?>