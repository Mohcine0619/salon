<?php
require_once '../src/Database.php'; // Include the Database class

// Create a new database connection
$db = new Database();
$conn = $db->getConnection(); // Use a method to get the connection

// Fetch services for the tarif list
$services = $conn->query("SELECT * FROM services")->fetchAll(PDO::FETCH_ASSOC);

$message = "";
$total = 0;

// Check if an appointment ID is provided via GET
$appointment_id = $_GET['appointment_id'] ?? null;

if ($appointment_id) {
    // Fetch user info based on appointment ID
    $stmt = $conn->prepare("SELECT name, email FROM appointments WHERE id = :appointment_id");
    $stmt->execute(['appointment_id' => $appointment_id]);
    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set name and email from the appointment
    $name = $appointment['name'] ?? '';
    $email = $appointment['email'] ?? '';
} else {
    // Default to empty if no appointment ID is provided
    $name = '';
    $email = '';
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_services = $_POST['services'] ?? [];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    // Store user info in session
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['selected_services'] = $selected_services;

    // Calculate total
    foreach ($selected_services as $service_id) {
        $service = $conn->query("SELECT price FROM services WHERE id = $service_id")->fetch(PDO::FETCH_ASSOC);
        $total += $service['price'];
    }

    // Store total in session
    $_SESSION['total'] = $total;

    // Redirect to bill.php
    header("Location: bill.php");
    exit(); // Ensure no further code is executed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Online - Khissal Pretty Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="text-gray-300 p-4 flex justify-between items-center backdrop-filter backdrop-blur-lg">
        <img src="../pics/k.png" alt="Khissal Logo" class="h-12 mb-0 ml-0">
        <nav class="mx-4">
            <ul class="flex space-x-4">
                <li><a href="index.php" class="hover:underline text-gray-400">Home</a></li>
                <li><a href="tarif.php" class="hover:underline text-gray-400">Tarif</a></li>
                <li><a href="reservations.php" class="hover:underline text-gray-400">Reservations</a></li>
            </ul>
        </nav>
    </header>
    <main class="p-10">
        <h2 class="text-4xl font-serif font-bold text-center mb-8">Book Your Appointment Online</h2>
        <form action="" method="POST" class="bg-white p-5 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" readonly class="w-full p-2 border border-gray-300 rounded bg-gray-200">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly class="w-full p-2 border border-gray-300 rounded bg-gray-200">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Select Services:</label>
                <?php foreach ($services as $service): ?>
                    <div class="flex items-center">
                        <input type="checkbox" id="service_<?php echo $service['id']; ?>" name="services[]" value="<?php echo $service['id']; ?>" class="mr-2">
                        <label for="service_<?php echo $service['id']; ?>" class="text-gray-600"><?php echo htmlspecialchars($service['name']) . " - " . number_format($service['price'], 2) . " DH"; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded hover:bg-gray-700">Calculate Total</button>
        </form>
        <?php if ($message): ?>
            <div class="mt-4 text-center"><?php echo $message; ?></div>
        <?php endif; ?>
    </main>
</body>
<?php
include '../templates/footer.php';
?>
</html>
