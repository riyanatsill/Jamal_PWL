<?php
session_start();
if (!isset($_SESSION['username'])){
    $_SESSION['msg'] = 'anda harus login';
    header('Location: login.php');
}
require "config.php";
$user = $_SESSION['username'];
$sql = "SELECT * from users where username = '$user'";
$queryUsers = mysqli_query($con, $sql);
$dataUsers = mysqli_fetch_assoc($queryUsers);

if($dataUsers['level'] == 'admin'){
    header('Location:dashboard.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/tambahan.css" />
    <link rel="icon" type="image" sizes="32x32" href="images/favicon-32x32.png"/>
</head>
<body>
<header>
    <a class="title">JAMALGAMING</a>
    <nav>
        <ul>
            <p><a href = "home.php">HOME</a></p>
        </ul>
    </nav>
</header>

<div class="row">
    <div class="col-12">
        <div style="border-radius: 10px; max-width: 45rem; margin: 10rem auto auto; background-color: #008080; text-align: center; box-shadow: 0 10px 18px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="row">
                <div class="col-12" style="padding: 20px; background-color: #20B2AA; color: white; border-radius: 10px 10px 0 0;">
                    <h1>Pesanan Anda Sedang Di Proses...</h1>
                </div>
                <div class="col-12">
                    <p style="font-size: 1.4rem; padding: 0 80px; font-weight: bold;">Terima Kasih Atas Pembelianmu Di Toko Kami, Ditunggu Pembelian Berikutnya :)</p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="contact">
        <h1>SOCIAL MEDIA</h1>
        <a href = "https://www.instagram.com/jamal_gaming22/" ><img src="images/ig.png" alt=""/></a>
        <a href = "https://wa.me/6287884541593" ><img src="images/WA2.png" alt=""/></a>
    </div>
</footer>
<div id="copyright">
    &copy;2022 JAMALGAMING
</div>
</body>
</html>
