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
            background-size: 260vh;
            background-position: center;

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

            width: 30%;
            margin: auto;
            padding: 5vh;
            border-radius: 5vh;
            color: white;
            background-color: #000000ce;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            margin: 0.5vh auto;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .state {
            padding: 1vh;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php session_start(); ?>

    <h1 class="welcome">Property Form</h1>
    <form action="property form.php" method="post" enctype="multipart/form-data">
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>

        <label for="bedrooms">Number of Bedrooms:</label>
        <input type="number" id="bedrooms" name="bedrooms" required><br><br>

        <label for="bathrooms">Number of Bathrooms:</label>
        <input type="number" id="bathrooms" name="bathrooms" required><br><br>

        <label for="size">Size of the Property:</label>
        <input type="text" id="size" name="size" required><br><br>

        <label for="year_built">Year Built:</label>
        <input type="text" id="year_built" name="year_built" required>
        <?php if (isset($_SESSION['property_error_year'])) {
            echo $_SESSION['property_error_year'];
        } ?>


        <label for="property_type">Property Type:</label>
        <select id="property_type" name="property_type" required>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Multiple">Multiple</option>
            <option value="Single family">Single Family</option>
            <option value="Double family">Double Family</option>
            <option value="Multiple family">Multiple Family</option>
        </select><br><br>

        <label for="no_of_garages">Number of Garages:</label>
        <input type="number" id="no_of_garages" name="garages"><br><br>

        <label for="street">Address:</label>
        <input type="text" id="street" name="street" required>
        <?php if (isset($_SESSION['property_error_area'])) {
            echo $_SESSION['property_error_area'];
        } ?>


        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pincode" required><br>
        <?php if (isset($_SESSION['property_error_pincode'])) {
            echo $_SESSION['property_error_pincode'];
        } ?>


        <br><label for="state">State:</label><br>
        <select id="indian_states" name="state" class="state" required>
            <option value="" disabled selected>Select state</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
            <option value="" disabled>-----------Union Territories--------------</option>
            <option value="DNHDD">Dadra and Nagar Haveli and Daman & Diu</option>
            <option value="JK">Jammu & Kashmir</option>
            <option value="Ladakh">Ladakh</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Delhi">Delhi</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="AN">Andaman and Nicobar Islands</option>
        </select><br><br>

        <?php if (isset($_SESSION['property_error_state'])) {
            echo $_SESSION['property_error_state'];
        } ?>


        <label for="location">Location URL:</label>
        <input type="text" id="location" name="location" required><br><br>

        <label for="image">Main Property Image:</label>
        <input type="file" id="image" name="image" required><br><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>