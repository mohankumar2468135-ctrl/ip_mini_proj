<?php
include "db.php";
$sql = "SELECT bookings.*, equipment.name AS equipment_name
        FROM bookings
        INNER JOIN equipment ON bookings.equipment_id = equipment.id
        ORDER BY booking_date";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <style>
        body { font-family: Arial, sans-serif;  }
        h1, h2 {  text-align: center; }
        .card { background: white; width: 92%; margin: 35px auto; padding: 25px; border-radius: 10px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        
        .back { text-align: center; }
        
        
    </style>
</head>
<body>
    <h1>Digital Lab Equipment Booking System</h1>
    <hr>
    <main class="card">
        <h2>Equipment Bookings</h2>
        <table>
            <tr><th>ID</th><th>Student Name</th><th>Register Number</th><th>Equipment</th><th>Booking Date</th><th>Status</th><th>Action</th></tr>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row['student_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row['register_no'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row['equipment_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($row['booking_date'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="<?php echo $row['status'] === 'Booked' ? 'booked' : 'cancelled'; ?>"><?php echo htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php if ($row['status'] === 'Booked'): ?>
                                <a href="cancel.php?id=<?php echo (int)$row['id']; ?>">Cancel</a>
                            <?php else: ?>Cancelled<?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7">No bookings found.</td></tr>
            <?php endif; ?>
        </table>
       
    </main>
</body>
</html>
