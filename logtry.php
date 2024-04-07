<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
    <style>
        .user-info {
            position: relative;
        }

        .login-status {
            float: right;
            margin-right: 2vw;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #f9f9f9;
            color: black;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 50vh;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            width: 5.8vw;
        }

        .dropdown-content a {
            color: black;
            /*padding: 12px 16px;*/
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        a {
            float: right;
            background-color: #f9f9f9;
            color: black;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        // User is logged in
        $loggedIn = true;
    } else {
        // User is not logged in
        $loggedIn = false;
    }
    ?>

    <div class="user-info">
    <?php if ($loggedIn): ?>
            <div class="login-status">
                <div class="dropdown">
                    <button class="dropbtn">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <div class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <a href="user login.html">Login</a>
    <?php endif; ?>
    </div>
</body>

</html>