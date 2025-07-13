<?php
include 'access.php';
$account = new savingsAccount('1234');
$account->deposit(500);
$account->setInterestRate(0.05);
$account->addInterest();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
</head>
<style>
    body{
        display: flex;
        justify-content: center;
        height: 90vh;
        align-items: center;
        background-color: #0FA4AF;
        color: white;
    }
    .show{
        border: 3px solid white;
        text-align: center;
        width: 70%;
        height: 200px;
        margin: 20px;
        padding: 10px 0;
    }
</style>
<body>
    <div class="show">
        <h1><?php echo "Your Current Balance is = ".$account->getBalance().' $'."<br>"; ?> </h1>
        <h3><?php $account->calculateAnualFee();?></h3>
    </div>
</body>
</html>