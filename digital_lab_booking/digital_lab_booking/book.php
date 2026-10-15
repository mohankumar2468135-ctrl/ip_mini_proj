<?php
include "db.php";
$message = "";

if (isset($_POST['book'])) {
    $student_name = trim($_POST['student_name'] ?? "");
    $register_no = trim($_POST['register_no'] ?? "");
    $equipment_id = (int)($_POST['equipment_id'] ?? 0);
    $booking_date = $_POST['booking_date'] ?? "";

    $check = $conn->prepare("SELECT id FROM bookings WHERE equipment_id = ? AND booking_date = ? AND status = 'Booked'");
    $check->bind_param("is", $equipment_id, $booking_date);
    $check->execute();
    $check_result = $check->get_result();

    if ($check_result->num_rows > 0) {
        $message = "This equipment is already booked on this date.";
    } else {
        $stmt = $conn->prepare("INSERT INTO bookings (student_name, register_no, equipment_id, booking_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $student_name, $register_no, $equipment_id, $booking_date);
        $message = $stmt->execute() ? "Equipment booked successfully." : "Booking failed.";
        $stmt->close();
    }
    $check->close();
}
$equipment = $conn->query("SELECT id, name FROM equipment");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Equipment</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f8fc; color: #222; }
        h1, h2 {  text-align: center; }
        .card { background: white; width: min(450px, 80%); margin: 35px auto; padding: 25px; border-radius: 10px; }
        label { display: block; margin: 15px 0 6px; }
        input, select { box-sizing: border-box; width: 100%; padding: 9px; }
        
        
    </style>
</head>
<body>
    <h1>Digital Lab Equipment Booking System</h1>
    <hr>
    <main class="card">
        <h2>Book Lab Equipment</h2>
        <?php if ($message !== ""): ?><p class="message"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
        <form method="post">
            <label for="student_name">Student Name</label>
            <input id="student_name" type="text" name="student_name" required>
            <label for="register_no">Register Number</label>
            <input id="register_no" type="text" name="register_no" required>
            <label for="equipment_id">Equipment</label>
            <select id="equipment_id" name="equipment_id" required>
                <option value="">Select Equipment</option>
                <?php while ($row = $equipment->fetch_assoc()): ?>
                    <option value="<?php echo (int)$row['id']; ?>"><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></option>
                <?php endwhile; ?>
            </select>
            <label for="booking_date">Booking Date</label>
            <input id="booking_date" type="date" name="booking_date" required><br><br>
            <input type="submit" name="book" value="Book Equipment">
        </form>
        
    </main>
</body>
</html>
