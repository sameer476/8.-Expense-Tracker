<?php
include "db.php";
$category = $conn->query("SELECT category, SUM(amount) as total FROM expenses GROUP BY category");
$monthly  = $conn->query("SELECT MONTH(expense_date) as month, SUM(amount) as total FROM expenses GROUP BY month");
?>

<h2>📂 Category-wise Total</h2>
<table border="1">
<tr><th>Category</th><th>Total ₹</th></tr>
<?php while($row = $category->fetch_assoc()): ?>
<tr><td><?= $row['category'] ?></td><td><?= $row['total'] ?></td></tr>
<?php endwhile; ?>
</table>

<br><br>
<h2>📅 Monthly Total</h2>
<table border="1">
<tr><th>Month</th><th>Total ₹</th></tr>
<?php while($row = $monthly->fetch_assoc()): ?>
<tr><td><?= date('F', mktime(0, 0, 0, $row['month'])) ?></td><td><?= $row['total'] ?></td></tr>
<?php endwhile; ?>
</table>
