<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    session_destroy();


    //header("Location: home.php"); // Redirect to the homepage after logout
    ?>
    <script>
        // Go back two pages
        window.history.back();
    </script>
</body>

</html>