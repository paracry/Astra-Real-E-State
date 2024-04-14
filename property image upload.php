<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

$conn->begin_transaction();

$seller_id = $_SESSION['seller_id'];

$price = $_SESSION[$seller_id . 'price'];
$bedrooms = $_SESSION[$seller_id . 'bedrooms'];
$bathrooms = $_SESSION[$seller_id . 'bathrooms'];
$size = $_SESSION[$seller_id . 'size'];
$description = $_SESSION[$seller_id . 'description'];
$street = $_SESSION[$seller_id . 'street'];
$pincode = $_SESSION[$seller_id . 'pincode'];
$state = $_SESSION[$seller_id . 'state'];
$location = $_SESSION[$seller_id . 'location'];
$seller_id = $_SESSION['seller_id']; // Assuming user is logged in and user_id is stored in session
$image = $_SESSION[$seller_id . 'image'];
$image = $conn->real_escape_string($image);


$sql = "INSERT INTO property (price, bed, bath, size, description, street_name, pincode, state, location_url, seller_id, image) VALUES ('$price', '$bedrooms', '$bathrooms', '$size', '$description', '$street', '$pincode', '$state', '$location', '$seller_id', '$image')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully form 1";
    unset($_SESSION[$seller_id . 'price']);
    unset($_SESSION[$seller_id . 'bedrooms']);
    unset($_SESSION[$seller_id . 'bathrooms']);
    unset($_SESSION[$seller_id . 'size']);
    unset($_SESSION[$seller_id . 'description']);
    unset($_SESSION[$seller_id . 'street']);
    unset($_SESSION[$seller_id . 'pincode']);
    unset($_SESSION[$seller_id . 'state']);
    unset($_SESSION[$seller_id . 'location']);
    //unset($_SESSION['seller_id']);
    unset($_SESSION[$seller_id.'image']);

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Store the ID in a session variable
$property_id = mysqli_insert_id($conn);
echo "<br><br>" . $property_id . "<br><br>";

$upload_dir = 'uploads/';
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$count = 1;
$image_folder = "uploads/";
$l = array(); // Initialize the array

foreach ($_FILES as $image) {
    $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $image_name = $property_id . '_' . $count . "." . $file_extension;
    move_uploaded_file($image['tmp_name'], $upload_dir . $image_name);
    $l[$count] = $image_folder . $image_name;
    $count++;
}
echo '<br>Images uploaded successfully!<br>';
// Example property_id
$image_folder = "uploads/";


$sql = "INSERT INTO property_images (image1, image2, image3, image4, image5, image6, image7, image8, image9, image10, property_id) VALUES ('$l[1]', '$l[2]', '$l[3]', '$l[4]', '$l[5]', '$l[6]', '$l[7]', '$l[8]', '$l[9]', '$l[10]', $property_id)";
//$conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully form2";
    $conn->commit();
    echo "transaction committed";
    header("Location: property.php?property_id=$property_id");
} else {
    $conn->rollback();
    echo "<br>rolling back<br>";
    echo "Error: " . $sql . "<br>" . $conn->error;


}


$conn->close();
?>