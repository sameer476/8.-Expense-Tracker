<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title    = $_POST['title'];
    $amount   = $_POST['amount'];
    $category = $_POST['category'];
    $date     = $_POST['date'];

    $sql = "INSERT INTO expenses (title, amount, category, expense_date) 
            VALUES ('$title', '$amount', '$category', '$date')";
    $conn->query($sql);

    header("Location: index.php");
}
?>

<h2>Add Expense</h2>
<form method="post">
    Title: <input type="text" name="title" required><br>
    Amount (₹): <input type="number" name="amount" step="0.01" required><br>
    Category:
    <select name="category" required>
        <option>Food</option>
        <option>Transport</option>
        <option>Shopping</option>
        <option>Other</option>
    </select><br>
    Date: <input type="date" name="date" required><br>
    <button type="submit">Add</button>
</form>
