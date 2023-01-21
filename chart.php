<?php
include('config.php');
$produk = mysqli_query($con, "SELECT * from item");
while ($row = mysqli_fetch_array($produk)){
    $nama_produk[] = $row['nama_item'];
    $query = mysqli_query($con, "SELECT sum(jumlah) AS jumlah FROM transaksi where id_item='".$row['id_item']."'");
    $row = $query->fetch_array();
    $jumlah_produk[] = $row['jumlah'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grafik Penjualan</title>
    <link rel="icon" type="image" sizes="32x32" href="images/favicon-32x32.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/carousel.rtl.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #439A97">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php" style="color: black">BACK</a>
        </div>
    </nav>
</header>
<hr class="featurette-divider">
<div>
    <canvas id="myChart" style="height:40vh; width:70vw; margin:0 auto"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart').getContext("2d");

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($nama_produk); ?>,
            datasets: [{
                label: 'Grafik Penjualan',
                data: <?php echo json_encode($jumlah_produk); ?>,
                borderWidth: 1
            }]
        },
        option: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

</body>
</html>