<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Product Listing</title>
        <style>
            .product {
                display: grid; 
                place-items: center;
                float: left;
                width: 25vw; /* Adjust as needed */
                margin: 2vw;
                border: solid 0.4vh black;
                border-radius: 10vh;
                padding: 3vh;
            }
            img{
                height: 20vw;
                width: auto;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <p>images</p>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die ("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, image FROM lol WHERE id = 1 AND name = 'barapani'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo '<div class="product">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>';
                    echo "<h2>Name: " . $row["name"] . "</h2>";
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }

            $conn->close();

            ?>

        </div>
    </body>
</html>
