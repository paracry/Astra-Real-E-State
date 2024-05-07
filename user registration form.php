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
            border-radius: 20vh;
            padding: 2vh;
            text-align: center;
            margin: auto;
            margin-top: 4vh;
            margin-bottom: 4vh;
            width: 25vw;
        }

        form {

            width: 20%;
            margin:  auto;
            padding: 5vh;
            border-radius: 5vh;
            background-color: #000000ce;
        }

        label {
            display: block;
            color: white;
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

        p {
            color: red;
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
    <h1 class="welcome">User Registration</h1>
    <?php session_start(); ?>
    <form action="user registration.php" method="post">
        <label for="name">FullName:</label>
        <input type="text" id="name" name="name" required>
        <p>
            <?php if(isset($_SESSION['name_error'])) { echo $_SESSION['name_error']; } ?>
        </p>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <p>
            <?php if(isset($_SESSION['email_error'])) { echo $_SESSION['email_error']; } ?>
        </p>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
        <p>
            <?php if(isset($_SESSION['phone_error'])) { echo $_SESSION['phone_error']; } ?>
        </p>

        <input type="submit" value="Submit"><br><br>

        <center><a href="home.php">go back to homepage</a></center>
    </form>

</body>

</html>