<?php
session_start();
include 'db.php';

$cart = $_SESSION['cart'] ?? [];

echo "<h2>Your Cart</h2>";

$total = 0;
foreach ($cart as $id => $qty) {
    $result = $conn->query("SELECT * FROM products WHERE id = $id");
    $row = $result->fetch_assoc();
    $lineTotal = $row['price'] * $qty;
    $total += $lineTotal;

    echo "<p>{$row['name']} x $qty = $$lineTotal</p>";
}
?>

<h3>Total: $<?php echo $total; ?></h3>

<form method="post" action="checkout.php">
    <input type="text" name="address"
