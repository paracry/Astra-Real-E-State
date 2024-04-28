<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fieldsToUpdate = array();

$property_id = $_POST['property_id'];

if (isset($_POST['price']) && !empty($_POST['price'])) {
    $price=$conn->real_escape_string($_POST['price']);
    $fieldsToUpdate[] = "price = $price";
}

if (isset($_POST['bedrooms']) && !empty($_POST['bedrooms'])) {
    $bed=$conn->real_escape_string($_POST['bedrooms']);
    $fieldsToUpdate[] = "bed = $bed";
}

if (isset($_POST['bathrooms']) && !empty($_POST['bathrooms'])) {
    $bath=$conn->real_escape_string($_POST['bathrooms']);
    $fieldsToUpdate[] = "bath = $bathrooms";
}
if (isset($_POST['size']) && !empty($_POST['size'])) {
    $size=$conn->real_escape_string($_POST['size']);
    $fieldsToUpdate[] = "size = $size";
}
if (isset($_POST['year_built']) && !empty($_POST['year_built'])) {
    $year_built=$conn->real_escape_string($_POST['year_built']);
    $fieldsToUpdate[] = "year_built = $year_built";
}
if (isset($_POST['property_type']) && !empty($_POST['property_type'])) {
    $property_type=$conn->real_escape_string($_POST['property_type']);
    $fieldsToUpdate[] = "property_type = $property_type";
}
if (isset($_POST['garages']) && !empty($_POST['garages'])) {
    $garages=$conn->real_escape_string($_POST['garages']);
    $fieldsToUpdate[] = "garages = $garages";
}


if (!empty($fieldsToUpdate)) {
    $sql = "UPDATE property SET " . implode(", ", $fieldsToUpdate) . " WHERE property_id=$property_id";
    if ($conn->query($sql) === TRUE) {
        echo "table updated successfully";
        header("Location: property.php?property_id=$property_id");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
    echo "empty form submission";
}
?>