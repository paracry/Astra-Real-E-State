<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        body{
            background-image: url(images/home.jpeg);
            object-fit: cover;
            background-size: 320vh;
            background-position: top;
            
        }
        
        .welcome {
            display: block;
            font-size: 9vh;
            border-radius: 20vh;
            background-color: #27004f70;
            color: rgb(235, 199, 255);
            padding: 2vh;
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
            background-color: #000000b9;
        }

        label {
            display: block;
            color: white;
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
    <h1 class="welcome">User Registration</h1>
    <form action="user password.php" method="post">
        <form>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <?php if(isset($_SESSION['password_error'])) { echo $_SESSION['password_error']; } ?>

            <input type="submit" value="Submit">
        </form>

    </form>
</body>

</html>