<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
<?php
include "db.php";
$data = $conn->query("SELECT category, SUM(amount) as total FROM expenses GROUP BY category");
?>

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Category', '₹ Total'],
        <?php while($row = $data->fetch_assoc()): ?>
        ['<?= $row['category'] ?>', <?= $row['total'] ?>],
        <?php endwhile; ?>
    ]);

    var options = { title: 'Expenses by Category' };
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
</script>

<div id="piechart" style="width: 700px; height: 400px;"></div>
