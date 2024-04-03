<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS code to style real estate listing items */

        .row{
            margin-left: 6vw;
            background-color: aqua;
            border-radius: 10%;
        }
        .col-md-4 {
            width: 33.33%;
            
            float: left;
            padding: 15px;
            box-sizing: border-box;
            margin-left:;
        }

        .col-md-4 img {
            object-fit: cover;
            width: 10%;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .col-md-4 p {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    // Fetch image name and size from MySQL database
// Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "real_estate";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch items from the property table
    $sql = "SELECT property_id, size, image FROM property";
    $result = $conn->query($sql);

    // Display items in 3 per row
    echo '<div class="row">';
    //$count = 0;
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4">';
        echo '<a href="property.php?property_id=' . $row["property_id"] . '">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '"/>';
        echo '<p>Size: ' . $row["size"] . '</p>';
        echo '</a>';
        echo '</div>';
        // $count++;
        // if ($count % 3 == 0) {
        //    echo '</div><div class="row">';
    }
    // }
    echo '</div>';
    
    $conn->close();
    ?>
</body>

</html>