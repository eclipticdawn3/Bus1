<?php
$schedule_id = $_GET['schedule_id'];
$name = $_GET['name'];
$qty = $_GET['qty'];
$amount = $_GET['amount'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="assets/css/payment_gateaway.css"> 
</head>
<body>
<center><h1>Choose Your Payment Method</h1></center>
    <div class="payment-container">
        <a href="#" class="payment-card">
            <img src="assets/img/telebirr.jpg" alt="Telebirr"> 
        </a>
        <a href="#" class="payment-card">
            <img src="assets/img/chappa.svg" alt="Chappa"> 
        </a>
        <a href="#" class="payment-card">
            <img src="assets/img/santim.jpg" alt="Santim Pay"> 
        </a>
        <a href="https://www.paypal.com/checkoutnow?payment_cmd=_xclick&business=your_paypal_email&amount=<?php echo $_GET['amount']; ?>" class="payment-card">
            <img src="assets/img/paypal.png" alt="PayPal"> 
        </a>
    </div>
<br/>
<center><button><a href="./index.php?page=home">Home</a></button></center>
</body>
</html>