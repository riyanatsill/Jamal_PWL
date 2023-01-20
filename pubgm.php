<?php
    session_start();
    if (!isset($_SESSION['username'])){
        $_SESSION['msg'] = 'anda harus login';
        header('Location: login.php');
    }
    require "config.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $uname = $_POST['nama'];
        $uid = $_POST['uid'];
        $item = $_POST['Product'];
        $payment = $_POST['pay'];
        $jumlah = '1';

        $sql = "INSERT INTO transaksi SET 
                username = '$uname',
                uid = '$uid',
                item = '$item',
                payment = '$payment',
                jumlah = '$jumlah'";
        $query = mysqli_query($con, $sql);

        if ($query) header("location:success.php");

        echo "Something Went Wrong On The Create";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pubg Mobile</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/tambahan.css" />
    <link rel="icon" type="image" sizes="32x32" href="images/favicon-32x32.png"/>
</head>

<body>
<header>
    <a href="home.php" class="title">JAMALGAMING</a>
    <nav>
        <ul>
            <p><a href="#data1">Data Akun</a></p>
            <p><a href="#data2">Pilihan</a></p>
            <p><a href="#data3">Pembayaran</a></p>
        </ul>
    </nav>
</header>

<div class="card-image">
    <div class="row">
        <img src="images/pubg1.jpeg" alt="">
    </div>

</div>
<div class="row">
    <div class="col-12">
        <h1>Pubg Mobile</h1>
        <p>Top up UC Pubg Mobile hanya dalam hitungan detik!</p>
        <p>Cukup masukan Username & ID PUBGM Anda, pilih jumlah UC yang Anda inginkan, selesaikan pembayaran, dan UC akan secara langsung ditambahkan ke akun PUBGM Anda.</p>
        <p>Unduh dan mainkan PUBG MOBILE sekarang!</p>
    </div>
</div>
<form method="POST" action="pubgm.php">
    <div id="data1" class="row">
        <div class="col-12 background-data">
            <h1>Masukan Data Anda</h1>
            <input type="text" value="" name="nama" class="input-submit" id="nama" placeholder="Input your Username" onkeydown="return /[a-z]/i.test(event.key)" required>
            <input type="number" value="" name="uid" class="input-submit" id="uid" placeholder="Input your ID" required>
        </div>
    </div>

    <div class="col-12" id="data2">
        <div class="row background-data">
            <h2>Pilihan Anda</h2>
            <div class="col-12 ">
                <div class="row">
                    <div class="col-3 border-pilihan" id="vpx">
                        <label for="x">
                            <img src="images/uc1.png">
                            <p>500UC 100k</p>
                        </label>
                        <input type="radio" name="Product" value="500 UC" id="x" onclick="clkvp()" required>
                    </div>
                    <div class="col-3 border-pilihan" id="vps" >
                        <label for="x">
                            <img src="images/uc1.png">
                            <p>750UC 200k</p>
                        </label>
                        <input type="radio" name="Product" value="750 UC" id="x" onclick="clkvp1()" required>
                    </div>
                    <div class="col-3 border-pilihan" id="vpy" >
                        <label for="x">
                            <img src="images/uc1.png">
                            <p>1000UC 270k</p>
                        </label>
                        <input type="radio" name="Product" value="1000 UC" id="x" onclick="clkvp2()">
                    </div>
                    <div class="col-3 border-pilihan" id="vpz" >
                        <label for="x">
                            <img src="images/uc1.png">
                            <p>1200UC 300k</p>
                        </label>
                        <input type="radio" name="Product" value="1200 UC" id="x" onclick="clkvp3()">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3 border-pilihan" id="vpx1" >
                        <label for="x">
                            <img src="images/uc1.png">
                            <p>1500UC 370K</p>
                        </label>
                        <input type="radio" name="Product" value="1500 UC" id="x" onclick="clkvp4()">
                    </div>
                    <div class="col-3 border-pilihan" id="vps1" >
                        <label for="x">
                            <img src="images/uc1.png">
                            <p>2100UC 400K</p>
                        </label>
                        <input type="radio" name="Product" value="2100 UC" id="x" onclick="clkvp5()">
                    </div>
                    <div class="col-3 border-pilihan" id="vpy1" >
                        <label for="x">
                            <img src="images/uc1.png">
                            <p>2700UC 450K</p>
                        </label>
                        <input type="radio" name="Product" value="2700 UC" id="x" onclick="clkvp6()">
                    </div>
                    <div class="col-3 border-pilihan" id="vpz1" >
                        <label for="x">
                            <img src="images/uc1.png">
                            <p>3500UC 500K</p>
                        </label>
                        <input type="radio" name="Product" value="3500 UC" id="x" onclick="clkvp7()">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12" id="data3">
        <div class="row background-data">
            <h2>Pembayaran</h2>
            <div class="col-12">
                <div class="col-6">
                    <div class="row wkwk" id="bcaa" >
                        <label for="b">
                            <img src="images/BCA3.png">
                        </label>
                        <input type="radio" name="pay" value="bca" id="b" onclick="bca()" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row wkwk" id="gopayy" >
                        <label for="b">
                            <img src="images/Gopay1.png">
                        </label>
                        <input type="radio" name="pay" value="gopay" id="b" onclick="gopay()">
                    </div>
                </div>
                <button type="submit" class="input-submit" >submit</button>
            </div>
        </div>
    </div>
</form>

<footer>
    <div class="contact">
        <h1>SOCIAL MEDIA</h1>
        <a href = "https://www.instagram.com/jamal_gaming22/" ><img src="images/ig.png" alt=""/></a>
        <a href = "https://wa.me/6287884541593" ><img src="images/WA2.png" alt=""/></a>
    </div>
</footer>

<!--<script src="public/assets/backend/myscripts.js"></script>-->


</body>
</html>
