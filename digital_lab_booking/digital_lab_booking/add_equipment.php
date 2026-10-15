<?php
include "db.php";
$message = "";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name'] ?? "");
    $category = trim($_POST['category'] ?? "");
    $quantity = (int)($_POST['quantity'] ?? 0);

    $stmt = $conn->prepare("INSERT INTO equipment (name, category, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $category, $quantity);
    $message = $stmt->execute() ? "Equipment added successfully." : "Error adding equipment.";
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Equipment</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f8fc; color: #222; }
        h1, h2 {  text-align: center; }
        .card { background: white; width: min(450px, 80%); margin: 35px auto; padding: 25px; border-radius: 10px; }
        label { display: block; margin: 15px 0 6px; }
        input { box-sizing: border-box; width: 100%; padding: 9px; }
        
        
        
    </style>
</head>
<body>
    <h1>Digital Lab Equipment Booking System</h1>
    <hr>
    <main class="card">
        <h2>Add Lab Equipment</h2>
        <?php if ($message !== ""): ?><p class="message"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
        <form method="post">
            <label for="name">Equipment Name</label>
            <input id="name" type="text" name="name" required>
            <label for="category">Category</label>
            <input id="category" type="text" name="category" required>
            <label for="quantity">Quantity</label>
            <input id="quantity" type="number" name="quantity" min="1" required><br><br>
            <input type="submit" name="submit" value="Add Equipment">
        </form>
        
    </main>
</body>
</html>
