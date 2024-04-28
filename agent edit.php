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

$agent_id = $_POST['agent_id'];

if (isset($_POST['price']) && !empty($_POST['price'])) {
    $price=$conn->real_escape_string($_POST['price']);
    $fieldsToUpdate[] = "price = $price";
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email=$conn->real_escape_string($_POST['email']);
    $fieldsToUpdate[] = "email = '$email'";
}

if (isset($_POST['phone']) && !empty($_POST['phone'])) {
    $phone=$conn->real_escape_string($_POST['phone']);
    $fieldsToUpdate[] = "phone = $phone";
}
if (isset($_POST['experience']) && !empty($_POST['experience'])) {
    $experience=$conn->real_escape_string($_POST['experience']);
    $fieldsToUpdate[] = "experience = '$experience'";
}
if (isset($_POST['website']) && !empty($_POST['website']));{
    $website=$conn->real_escape_string($_POST['website']);
    $fieldsToUpdate[] = "website = '$website'";
}
if (isset($_POST['name']) && !empty($_POST['name'])){
    $name=$conn->real_escape_string($_POST['name']);
    $fieldsToUpdate[] = "username = '$name'";
}


if (!empty($fieldsToUpdate)) {
    $sql = "UPDATE agent SET " . implode(", ", $fieldsToUpdate) . " WHERE agent_id=$agent_id";
    if ($conn->query($sql) === TRUE) {
        echo "table updated successfully";
        header("Location: agent profile.php?agent_id=$agent_id");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
    echo "empty form submission";
}
?>