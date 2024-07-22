<?php
session_start(); // Start the session to access user data

// Retrieve user and total information from the session
$name = $_SESSION['name'] ?? 'Guest';
$email = $_SESSION['email'] ?? 'Not provided';
$total = $_SESSION['total'] ?? 0;

// Check if the total is set, otherwise redirect back to the bill page
if ($total <= 0) {
    header("Location: bill.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment - Khissal Pretty Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="text-gray-300 p-4 flex justify-between items-center backdrop-filter backdrop-blur-lg">
        <img src="../pics/k.png" alt="Khissal Logo" class="h-12 mb-0 ml-0">
    </header>
    <main class="p-10">
        <h2 class="text-4xl font-serif font-bold text-center mb-8">Payment</h2>
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h3 class="text-xl font-bold">Total Amount: <?php echo number_format($total, 2); ?> DH</h3>
            <form action="process_payment.php" method="POST" class="mt-4">
                <div class="mb-4">
                    <label for="card_number" class="block text-gray-700">Card Number:</label>
                    <input type="text" id="card_number" name="card_number" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="expiry_date" class="block text-gray-700">Expiry Date (MM/YY):</label>
                    <input type="text" id="expiry_date" name="expiry_date" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="cvv" class="block text-gray-700">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-400">Pay Now</button>
            </form>
            <a href="bill.php" class="mt-4 inline-block text-red-500">Cancel</a>
        </div>
    </main>
</body>
<?php
include '../templates/footer.php';
?>
</html>