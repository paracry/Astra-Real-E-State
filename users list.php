<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS Styles for Page Layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000000;
            padding: 8px;
            text-align: left;
            transition: 700ms;
        }

        th {
            background-color: #dfdfdf;
            transition: 700ms;
        }

        tr {
            height: 6vh;
            transition: 700ms;
            width: 80%;
        }

        tr:nth-child(even) {
            background-color: #f9deff;
        }

        tr:hover {
            background-color: #a646ff;
            color: white;
            height: 12vh;
            transition: 700ms;
            width: 80%;
        }
    </style>
</head>

<body>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "real_estate";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT user_id,username, email, phone FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>User_id</th><th>Username</th><th>Email</th><th>Phone Number</th><th>Delete User</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["user_id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . '<a href="user delete.php?user_id=' . $row["user_id"] . '">Delete</a>' . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</body>

</html>