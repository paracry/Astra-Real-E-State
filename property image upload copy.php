<?php
session_start();
if (!isset($_POST['submit'])) {
    // Roll back the transaction
    $conn->rollback();
    echo "Transaction rolled back. Data from the first form discarded.";
} else {

    // Store the ID in a session variable
    $property_id = $_SESSION['last_id'];

    $upload_dir = 'uploads/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $count = 1;
    foreach ($_FILES as $image) {
        $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $image_name = $property_id . '_' . $count . "." . $file_extension;
        move_uploaded_file($image['tmp_name'], $upload_dir . $image_name);
        $count++;
    }
    echo 'Images uploaded successfully!';
    // Example property_id
    $image_folder = "uploads/";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "real_estate";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $l1 = $image_folder . $property_id . "_" . 1 . ".jpg";
    $l2 = $image_folder . $property_id . "_" . 2 . ".jpg";
    $l3 = $image_folder . $property_id . "_" . 3 . ".jpg";
    $l4 = $image_folder . $property_id . "_" . 4 . ".jpg";
    $l5 = $image_folder . $property_id . "_" . 5 . ".jpg";
    $l6 = $image_folder . $property_id . "_" . 6 . ".jpg";
    $l7 = $image_folder . $property_id . "_" . 7 . ".jpg";
    $l8 = $image_folder . $property_id . "_" . 8 . ".jpg";
    $l9 = $image_folder . $property_id . "_" . 9 . ".jpg";
    $l10 = $image_folder . $property_id . "_" . 10 . ".jpg";
    $sql = "INSERT INTO property_images (image1, image2, image3, image4, image5, image6, image7, image8, image9, image10, property_id) VALUES ('$l1', '$l2', '$l3', '$l4', '$l5', '$l6', '$l7', '$l8', '$l9', '$l10 ', $property_id)";
    //$conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $conn->commit();
        echo "Transaction committed. Data from both forms saved.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>