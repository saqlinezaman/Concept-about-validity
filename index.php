<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bank Account Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 400px;
        }
        .card h2 {
            color: #0077cc;
            margin-bottom: 10px;
        }
        .card p {
            margin: 8px 0;
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php
include 'access.php';

$account = new savingsAccount();
$account->setPin("1234");
$account->deposit(1000);
$account->setInterestRate(0.05);
$account->addInterest();
$account->calculateAnnualFee();
echo $account->showSummary();

$account1 = new savingsAccount();
$account1->setPin("1244");
$account1->deposit(220);
$account1->setInterestRate(0.05);
$account1->addInterest();
$account1->calculateAnnualFee();
echo $account1->showSummary();
?>

</body>
</html>
