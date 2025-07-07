<?php
include "db.php";
$expenses = $conn->query("SELECT * FROM expenses ORDER BY expense_date DESC");
?>

<h2>All Expenses</h2>
<a href="add.php">+ Add New</a>
<hr>

<table border="1" cellpadding="10">
<tr>
    <th>Title</th><th>₹ Amount</th><th>Category</th><th>Date</th>
</tr>
<?php while($row = $expenses->fetch_assoc()): ?>
<tr>
    <td><?= $row['title'] ?></td>
    <td><?= $row['amount'] ?></td>
    <td><?= $row['category'] ?></td>
    <td><?= $row['expense_date'] ?></td>
</tr>
<?php endwhile; ?>
</table>
