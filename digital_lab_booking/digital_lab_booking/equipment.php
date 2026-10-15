<?php
include "db.php";
$result = $conn->query("SELECT * FROM equipment");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Equipment</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f8fc; color: #222; }
        h1, h2 { text-align: center; }
        
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        
        
        a { color: #0b3d91; }
    </style>
</head>
<body>
    <h1>Digital Lab Equipment Booking System</h1>
    <hr>
    <main >
        <h2>Available Lab Equipment</h2>
        <table>
            <tr><th>ID</th><th>Equipment Name</th><th>Category</th><th>Quantity</th></tr>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['category']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">No equipment available.</td></tr>
            <?php endif; ?>
        </table>
        
    </main>
</body>
</html>
