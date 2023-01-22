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

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $ign = $_POST['nama'];
        $uid = $_POST['uid'];
        $item = $_POST['Product'];
        $payment = $_POST['pay'];
        $jumlah = '1';
        $uname = $_SESSION['username'];

        $sql = "INSERT INTO transaksi SET username = '$uname', ign = '$ign', uid = '$uid',
                id_item = '$item', payment = '$payment', jumlah = '$jumlah', tdate = NOW()";
        $query = mysqli_query($con, $sql);

        if ($query) header("location:success.php");

        echo "Something Went Wrong On The Create";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Valorant</title>
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
        <img src="images/HD1.jpeg" alt="">
    </div>

</div>
<div class="row ">
    <div class="col-12 ">
        <h1>Valorant</h1>
        <p>Top up VALORANT Points hanya dalam hitungan detik!</p>
        <p>Cukup masukan Username & ID Riot Anda, pilih jumlah Points yang Anda inginkan, selesaikan pembayaran, dan Poin akan secara langsung ditambahkan ke akun VALORANT Anda.</p>
        <p>Unduh dan mainkan VALORANT sekarang!</p>
    </div>
</div>
<form method="POST" action="valorant.php">
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
                            <img src="images/VP3.png">
                            <p>100VP 10k</p>
                        </label>
                        <input type="radio" name="Product" value="1" id="x" onclick="clkvp()" required>
                    </div>
                    <div class="col-3 border-pilihan" id="vps" >
                        <label for="x">
                            <img src="images/VP3.png">
                            <p>250VP 25k</p>
                        </label>
                        <input type="radio" name="Product" value="2" id="x" onclick="clkvp1()" required>
                    </div>
                    <div class="col-3 border-pilihan" id="vpy" >
                        <label for="x">
                            <img src="images/VP3.png">
                            <p>500VP 50k</p>
                        </label>
                        <input type="radio" name="Product" value="3" id="x" onclick="clkvp2()">
                    </div>
                    <div class="col-3 border-pilihan" id="vpz" >
                        <label for="x">
                            <img src="images/VP3.png">
                            <p>780VP 78k</p>
                        </label>
                        <input type="radio" name="Product" value="4" id="x" onclick="clkvp3()">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3 border-pilihan" id="vpx1" >
                        <label for="x">
                            <img src="images/VP3.png">
                            <p>1500VP 150K</p>
                            <input type="radio" name="Product" value="5" id="x" onclick="clkvp4()">
                        </label>
                    </div>
                    <div class="col-3 border-pilihan" id="vps1" >
                        <label for="x">
                            <img src="images/VP3.png">
                            <p>2100VP 210K</p>
                        </label>
                        <input type="radio" name="Product" value="6" id="x" onclick="clkvp5()">
                    </div>
                    <div class="col-3 border-pilihan" id="vpy1" >
                        <label for="x">
                            <img src="images/VP3.png">
                            <p>2700VP 270K</p>
                        </label>
                        <input type="radio" name="Product" value="7" id="x" onclick="clkvp6()">
                    </div>
                    <div class="col-3 border-pilihan" id="vpz1" >
                        <label for="x">
                            <img src="images/VP3.png">
                            <p>3500VP 350K</p>
                        </label>
                        <input type="radio" name="Product" value="8" id="x" onclick="clkvp7()">
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
                <button type="submit" class="input-submit" onclick="return  confirm('Yakin Ingin Melakukan Submit ?')">submit</button>
            </div>
        </div>
    </div>
</form>


<script src="myscript.js"></script>
<footer>
    <div class="contact">
        <h1>SOCIAL MEDIA</h1>
        <a href = "https://www.instagram.com/jamal_gaming22/" ><img src="images/ig.png" alt=""/></a>
        <a href = "https://wa.me/6287884541593" ><img src="images/WA2.png" alt=""/></a>
    </div>
</footer>

</body>
</html>
