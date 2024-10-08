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

        input[type="password"] {
            width: 94%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <?php session_start(); ?>
    <h1 class="welcome">Seller Registration</h1>
    <form action="seller password.php" method="post">
        <form>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <?php if(isset($_SESSION['seller_password_error'])) { echo $_SESSION['seller_password_error']; } ?>

            <input type="submit" value="Submit">
        </form>

    </form>
</body>

</html>