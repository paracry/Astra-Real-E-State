<?php
$unique_id = 23;

$upload_dir = 'uploads/';
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$count = 1;
foreach ($_FILES as $image) {
    $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $image_name = $unique_id . '_' . $count.".".$file_extension;
    move_uploaded_file($image['tmp_name'], $upload_dir . $image_name);
    $count++;
}
echo 'Images uploaded successfully!';
?>