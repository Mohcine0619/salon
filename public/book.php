<?php
require_once '../src/Database.php'; // Include the Database class

// Create a new database connection
$db = new Database();
$conn = $db->getConnection(); // Use a method to get the connection

$message = ""; // Initialize message variable

// Fetch existing appointments
$appointments = $conn->query("SELECT appointment_date, appointment_time FROM appointments")->fetchAll(PDO::FETCH_ASSOC);

// Prepare an array to hold appointments for the calendar
$calendar = [];
foreach ($appointments as $appointment) {
    $date = $appointment['appointment_date'];
    $time = $appointment['appointment_time'];
    $calendar[$date][] = $time; // Group times by date
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Check if the appointment already exists
    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM appointments WHERE appointment_date = ? AND appointment_time = ?");
    $checkStmt->execute([$date, $time]);
    $exists = $checkStmt->fetchColumn();

    if ($exists) {
        $message = "<div class='text-red-500'>Error: Appointment already exists!</div>"; // Error message
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO appointments (name, email, appointment_date, appointment_time) VALUES (?, ?, ?, ?)");
        
        // Execute the insert statement
        if ($stmt->execute([$name, $email, $date, $time])) {
            $message = "<div class='text-green-500'>Appointment booked successfully!</div>"; // Success message
            // Re-fetch appointments to update the calendar
            $appointments = $conn->query("SELECT appointment_date, appointment_time FROM appointments")->fetchAll(PDO::FETCH_ASSOC);
            // Rebuild the calendar array
            $calendar = [];
            foreach ($appointments as $appointment) {
                $calendar[$appointment['appointment_date']][] = $appointment['appointment_time'];
            }
        } else {
            $message = "<div class='text-red-500'>Error: " . $conn->errorInfo()[2] . "</div>"; // Error message
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Your Appointment - Khissal Pretty Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <style>
        /* Additional styles if needed */
    </style>
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
    <main class="p-6">
        <h2 class="text-4xl font-serif font-bold text-center mb-8">Book Your Appointment</h2>
        <div class="max-w-lg mx-auto">
            <?php echo $message; ?> <!-- Display message here, above the form container -->
            <form action="" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" id="name" name="name" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-gray-700">Appointment Date:</label>
                    <input type="date" id="date" name="date" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="time" class="block text-gray-700">Appointment Time:</label>
                    <input type="time" id="time" name="time" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded hover:bg-gray-700">Book Now</button>
            </form>
        </div>
        
        <h3 class="text-2xl font-serif font-bold text-center mt-8">Appointments Calendar</h3>
        <div id='calendar' class="mt-4"></div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: '300px',
                width: '250px', // Updated width of the calendar to be shorter
                events: [
                    <?php 
                    $eventArray = []; // Initialize an array to hold events
                    foreach ($calendar as $date => $times): 
                        foreach ($times as $index => $time): 
                            $eventArray[] = "{ title: 'Booked', start: '" . htmlspecialchars($date) . "T" . htmlspecialchars($time) . "' }"; // Collect events
                        endforeach; 
                    endforeach; 
                    echo implode(',', $eventArray); // Output events as a comma-separated string
                    ?>
                ]
            });

            calendar.render();
        });
    </script>
</body>
<?php
include '../templates/footer.php';
?>
</html>