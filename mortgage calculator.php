<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mortgage Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .calculator {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        h3 {
            margin-top: 20px;
        }

        p {
            font-size: 4vh;
            font-weight: bold;
            color: #333;
            display: block;
            margin: auto;
            width: auto;
            text-align: center;
            padding: 1vh;
            border-radius: 10vh;
            transition: 500ms;

        }
    </style>
</head>

<body>

    <div class="calculator">
        <h2>Mortgage Calculator</h2>
        <label for="propertyPrice">Property Price:</label>
        <input type="number" id="propertyPrice" placeholder="Enter Property Price" value="<?php echo $_GET['price'];?>" required>
        <label for="downPayment">Down Payment:</label>
        <input type="number" id="downPayment" placeholder="Enter Down Payment" required>
        <label for="loanTerm">Loan Term (years):</label>
        <input type="number" id="loanTerm" placeholder="Enter Loan Term" required>
        <label for="interestRate">Interest Rate (%):</label>
        <input type="number" id="interestRate" step="0.01" placeholder="Enter Interest Rate" value="8.50" required>
        <button onclick="calculateMortgage()">Calculate</button>
        <h3>Your Monthly Payment:</h3>
        <p id="monthlyPayment"></p>
    </div>

    <script>
        function calculateMortgage()
        {
            const propertyPrice = document.getElementById('propertyPrice').value;
            const downPayment = document.getElementById('downPayment').value;
            const loanTerm = document.getElementById('loanTerm').value;
            const interestRate = document.getElementById('interestRate').value / 100;

            const principal = propertyPrice - downPayment;
            const monthlyInterest = interestRate / 12;
            const numberOfPayments = loanTerm * 12;

            const monthlyPayment = principal * monthlyInterest / (1 - Math.pow(1 + monthlyInterest, -numberOfPayments));
            document.getElementById('monthlyPayment').innerText = '₹'+ new Intl.NumberFormat('en-IN').format(monthlyPayment.toFixed(2)) +'/- per month';
        }

        function formatIndianCurrency(price)
        {
            return '₹' + new Intl.NumberFormat('en-IN').format(price) + '/-';
        }
    </script>
</body>

</html>