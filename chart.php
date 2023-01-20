<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BAR</title>
    <link rel="icon" type="image" sizes="32x32" href="images/favicon-32x32.png"/>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/tambahan.css" />
</head>
<body>
<header>
    <a class="title">JAMALGAMING</a>
    <nav>
        <ul>
            <p><a href = "dashboard.php">HOME</a></p>
        </ul>
    </nav>
</header>

<div class="row">
    <div class="col-12">
        <div>
            <canvas id="myChart" style="height:40vh; width:70vw; margin:0 auto"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($nama_produk); ?>,
                    datasets: [{
                        label: 'Grafik Penjualan',
                        data: <?php echo json_encode($jumlah_produk); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
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
    </div>
</div>

<footer>
    <div class="contact">
        <h1>SOCIAL MEDIA</h1>
        <a href = "https://www.instagram.com/jamal_gaming22/" ><img src="images/ig.png" alt=""/></a>
        <a href = "https://wa.me/6287884541593" ><img src="images/WA2.png" alt=""/></a>
    </div>
</footer>
<!--<div id="copyright">-->
<!--    &copy;2022 JAMALGAMING-->
<!--</div>-->

</body>
</html>