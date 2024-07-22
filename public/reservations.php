<?php
require_once '../src/Database.php'; // Include the Database class

// Create a new database connection
$db = new Database();
$conn = $db->getConnection(); // Use a method to get the connection

// Fetch all reservations
$reservations = $conn->query("SELECT * FROM appointments ORDER BY appointment_date, appointment_time")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Reservations - Khissal Pretty Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <header class="text-gray-300 p-4 flex justify-between items-center backdrop-filter backdrop-blur-lg">
        <img src="../pics/k.png" alt="Khissal Logo" class="h-12 mb-0 ml-0">
        <nav class="mx-4">
            <ul class="flex space-x-4">
                <li><a href="index.php" class="hover:underline text-gray-400">Home</a></li>
                <li><a href="tarif.php" class="hover:underline text-gray-400">Tarif</a></li>
                <li><a href="book.php" class="hover:underline text-gray-400">Book Appointment</a></li>
            </ul>
        </nav>
    </header>
    <main class="p-6">
        <h2 class="text-4xl font-serif font-bold text-center mb-8">Your Reservations</h2>
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <?php if (count($reservations) > 0): ?>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Name</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Date</th>
                            <th class="py-2 px-4 border-b">Time</th>
                            <th class="py-2 px-4 border-b">Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservations as $reservation): ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($reservation['name']); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($reservation['email']); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($reservation['appointment_date']); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($reservation['appointment_time']); ?></td>
                                <td class="py-2 px-4 border-b">
                                    <a href="bookonline.php?appointment_id=<?php echo $reservation['id']; ?>" class="text-blue-500 hover:underline">Pay Online</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center text-gray-700">You have no reservations yet.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
<?php
include '../templates/footer.php';
?>
</html>
