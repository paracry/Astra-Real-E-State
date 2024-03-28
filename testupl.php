<?php
if(isset($_POST['submit'])){
    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    $destination = 'C:/wamp64/www/Project/uploads/' . $fileName;

    if($fileError === 0){
        if(move_uploaded_file($fileTmpName, $destination)){
            echo "Image uploaded successfully.";
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Error uploading image.";
    }
}
?>
