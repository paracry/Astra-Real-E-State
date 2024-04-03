<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Astra Real Estate</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url("https://assets-us-01.kc-usercontent.com/0542d611-b6d8-4320-a4f4-35ac5cbf43a6/57134553-0077-4e93-8cfd-58895d271ef8/homeowners-insurance-facebook.jpg");
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        header {

            padding: 3vh 2vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            font-size: 3vh;
        }

        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #ffffff;
            padding: 2vh;
            border-radius: 50vh;
        }

        nav a:hover {
            background-color: #8000ff;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        footer {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            text-align: center;
        }

        input[type="text"] {
            padding: 2vh;
            width: 30vw;
            border: none;
            border-radius: 50vh;
            margin-right: 10px;
            background-color: #f4e4ffeb;
        }

        input:hover {
            outline: solid 0.4vh #8000ff;
        }

        input:focus {
            outline: solid 0.4vh #8000ff;
            background-color: white;


        }

        button {
            margin-top: 2vh;
            padding: 1.5vh;
            font-size: 2.5vh;
            background-color: #8000ff;
            color: #fff;
            border: none;
            border-radius: 20vh;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff0099;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
        }

        .dropdown:hover+.dropdown-content {
            display: block;
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
    <header>
        <div class="logo">Astra Real Estate</div>
        <nav>
            <a href="#">Home</a>
            <a href="#">Properties</a>
            <a href="#">About Us</a>
            <a href="#">Contact</a>
            <?php if ($loggedIn): ?>
                <button class="dropbtn">
                    <?php echo $_SESSION['username']; ?>
                </button>
                <div class="dropdown-content">
                    <a href="logout.php">Logout</a>
                </div>
            <?php else: ?>
                <a href="user login.html">Login</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <h1>Welcome to Astra Real Estate</h1>
        <input type="text" placeholder="Search for properties..." />
        <button>Search</button>
    </main>
    <footer>
        <p>
            Email: info@astra.com | Address: 123 Main St, City | Phone:
            123-456-7890
        </p>
    </footer>
</body>

</html>