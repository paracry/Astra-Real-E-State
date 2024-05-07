<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-image: url(images/home.jpeg);
            object-fit: cover;
            background-size: 320vh;
            background-position: top;

        }

        .welcome {
            display: block;
            font-size: 9vh;
            color: #000000;
            border-radius: 7vh;
            text-align: center;
            margin: auto;
            margin-top: 4vh;
            margin-bottom: 4vh;
            width: 25vw;
        }

        form {

            width: 20%;
            margin: auto;
            padding: 5vh;
            border-radius: 5vh;
            color: white;
            background-color: #000000ce;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 95%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: rgb(173, 230, 186);
            font-size: 3vh;
        }

        a:hover {
            color: rgb(194, 207, 255);
        }
    </style>

</head>

<body>
    <?php session_start(); ?>
    <h1 class="welcome">Seller Registration</h1>
    <form action="seller registration.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <?php if(isset($_SESSION['seller_error_name'])) { echo $_SESSION['seller_error_name']; } ?>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <?php if(isset($_SESSION['seller_error_email'])) { echo $_SESSION['seller_error_email']; } ?>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
        <?php if(isset($_SESSION['seller_error_phone'])) { echo $_SESSION['seller_error_phone']; } ?>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        <?php if(isset($_SESSION['seller_error_address'])) { echo $_SESSION['seller_error_address']; } ?>

        <input type="submit" value="Submit"><br><br>

        <center><a href="home.php">go back to homepage</a></center>
    </form>

</body>

</html>