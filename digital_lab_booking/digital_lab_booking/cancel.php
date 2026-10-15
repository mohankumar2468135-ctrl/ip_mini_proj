<?php
include "db.php";
$message = "Unable to cancel booking.";

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $conn->prepare("UPDATE bookings SET status = 'Cancelled' WHERE id = ? AND status = 'Booked'");
    $stmt->bind_param("i", $id);
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $message = "Booking cancelled successfully.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Booking</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f8fc; color: #222; }
        h1, h2 { color: #0b3d91; text-align: center; }
        .card { background: white; width: min(450px, 80%); margin: 35px auto; padding: 25px; border-radius: 10px; text-align: center; }
        a { color: #0b3d91; }
    </style>
</head>
<body>
    <h1>Digital Lab Equipment Booking System</h1>
    <hr>
    <main class="card">
        <h2><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></h2>
        <p><a href="bookings.php">View Bookings</a></p>
        <p><a href="index.php">Back to Home</a></p>
    </main>
</body>
</html>
