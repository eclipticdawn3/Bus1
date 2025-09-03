<?php
include('db_connect.php');

// Get payment details from PayPal response (example)
$payment_status = $_GET['payment_status']; // Example: 'Completed'

if ($payment_status == 'Completed') {
    // Get transaction ID from PayPal response (replace with actual logic)
    $transaction_id = $_GET['txn_id']; 

    // Get schedule ID from the invoice (or other method)
    $schedule_id = $_GET['invoice']; 

    // Update booking status in database
    $sql = "UPDATE booked SET status = 'Paid', transaction_id = '$transaction_id' WHERE schedule_id = '$schedule_id'"; 
    $conn->query($sql); 

    // Generate and display ticket (implement your ticket generation logic here)
    // ...

    echo "<h2>Payment Successful!</h2>";
    echo "<p>Your booking has been confirmed.</p>";
    // Optionally, display the ticket information here
} else {
    // Handle payment failure (e.g., update booking status to 'Failed')
    echo "<h2>Payment Failed.</h2>";
    // ...
}
?>