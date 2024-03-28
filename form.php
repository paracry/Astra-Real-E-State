<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

// Get form data using POST method
$price = $_POST['price'];
$bedrooms = $_POST['bedrooms'];
$bathrooms = $_POST['bathrooms'];
$size = $_POST['size'];
$description = $_POST['description'];
$street = $_POST['street'];
$pincode = $_POST['pincode'];
$state = $_POST['state'];
$location = $_POST['location'];
$seller_id = 2; // Assuming user is logged in and user_id is stored in session
$image = $_POST['image'];

// Insert data into the database
$sql = "INSERT INTO property (price, bed, bath, size, description, street_name, pincode, state, location_url, seller_id, image) VALUES ('$price', '$bedrooms', '$bathrooms', '$size', '$description', '$street', '$pincode', '$state', '$location', '$seller_id', '$image')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $last_id = mysqli_insert_id($conn);
    echo "<br>".$last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>