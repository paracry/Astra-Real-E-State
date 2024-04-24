<?php
$seller_id = $_GET['seller_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM property WHERE seller_id=$seller_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: seller listing.php?seller_id=$seller_id");
} else {
    $sql = "DELETE FROM seller WHERE seller_id=$seller_id";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully form2";
        header('Location: seller list.php');

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>