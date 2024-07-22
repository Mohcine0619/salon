<?php
session_start(); // Start the session to access user data

// Assuming user data and selected services are stored in session
$name = $_SESSION['name'] ?? 'Guest';
$email = $_SESSION['email'] ?? 'Not provided';
$selected_services = $_SESSION['selected_services'] ?? [];
$total = $_SESSION['total'] ?? 0;

// Fetch service details for selected services
require_once '../src/Database.php';
$db = new Database();
$conn = $db->getConnection();

$services_details = [];
foreach ($selected_services as $service_id) {
    $service = $conn->query("SELECT name, price FROM services WHERE id = $service_id")->fetch(PDO::FETCH_ASSOC);
    $services_details[] = $service;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill - Khissal Pretty Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="text-gray-300 p-4 flex justify-between items-center backdrop-filter backdrop-blur-lg">
        <img src="../pics/k.png" alt="Khissal Logo" class="h-12 mb-0 ml-0">
    </header>
    <main class="p-10">
        <h2 class="text-4xl font-serif font-bold text-center mb-8">Your Bill</h2>
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h3 class="text-xl font-bold">Customer Information</h3>
            <p>Name: <?php echo htmlspecialchars($name); ?></p>
            <p>Email: <?php echo htmlspecialchars($email); ?></p>
            <h3 class="text-xl font-bold mt-4">Selected Services</h3>
            <ul>
                <?php foreach ($services_details as $service): ?>
                    <li><?php echo htmlspecialchars($service['name']) . " - " . number_format($service['price'], 2) . " DH"; ?></li>
                <?php endforeach; ?>
            </ul>
            <h3 class="text-xl font-bold mt-4">Total Amount: <?php echo number_format($total, 2); ?> DH</h3>
            <p class="mt-4">Thank you for choosing us!</p>
            <div class="mt-4 flex justify-between">
                <a href="payment.php" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-400">Proceed to Payment</a>
                <a href="index.php" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-400">Cancel</a>
            </div>
        </div>
    </main>
</body>
</html>