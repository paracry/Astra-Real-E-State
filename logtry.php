<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
    <style>
        .user-info {
            float: right;
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
            <span>Welcome,
                <?php echo $_SESSION['username']; ?>
            </span>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
</body>

</html>