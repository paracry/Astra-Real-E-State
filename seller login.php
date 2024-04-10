<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$email = $_POST['email'];
$password = $_POST['password'];

// Query to check user existence
$sql = "SELECT * FROM seller WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "User exists in the database. Login successful!";
    session_start();
    $user = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $user['username'];
    $_SESSION['seller_id'] = $user['seller_id'];
    //echo $_SESSION['seller_id'] . $_SESSION['username'];
    header("Location:  home seller.php");
} else {
    echo "User not found. Please check your credentials.";
}

$conn->close();
?>