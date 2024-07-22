<?php
session_start(); // Start the session to access user data

// Retrieve user and payment information from the session and POST data
$name = $_SESSION['name'] ?? 'Guest';
$email = $_SESSION['email'] ?? 'Not provided';
$total = $_SESSION['total'] ?? 0;

$card_number = $_POST['card_number'] ?? '';
$expiry_date = $_POST['expiry_date'] ?? '';
$cvv = $_POST['cvv'] ?? '';

// Check if the total is set, otherwise redirect back to the payment page
if ($total <= 0) {
    header("Location: payment.php");
    exit();
}

// Database connection
require_once '../src/Database.php';
$db = new Database();
$conn = $db->getConnection();

try {
    // Here you would typically process the payment with a payment gateway
    // For demonstration, we will assume the payment is successful

    // Insert payment details into the online table
    $stmt = $conn->prepare("INSERT INTO online (name, email, amount, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $total, $card_number, $expiry_date, $cvv]);

    // Clear session data after successful payment
    session_unset();
    session_destroy();

    // Redirect to a success page or display a success message
    header("Location: success.php");
    exit();
} catch (PDOException $e) {
    // Handle error (e.g., log it, show an error message)
    echo "Error: " . $e->getMessage();
}
?>