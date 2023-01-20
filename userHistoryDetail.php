<?php 
    session_start();
    if (!isset($_SESSION['username'])){
        $_SESSION['msg'] = 'anda harus login';
        header('Location: login.php');
    }
    
    require_once "config.php";
    if (!isset($_GET['id_tr']) || $_GET['id_tr'] == null) header("location:userhistory.php");
    $id_tr = $_GET['id_tr'];

    $sql = "SELECT *  FROM transaksi WHERE id_tr = '$id_tr'";
    $query = mysqli_query($con, $sql);
    $dataTransaksi = mysqli_fetch_assoc($query);
    
    $id_item = $dataTransaksi['id_item'];
    $sqlItem = "SELECT * from item where id_item = '$id_item'";
    $queryItem = mysqli_query($con, $sqlItem);
    $dataItem = mysqli_fetch_assoc($queryItem);
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .input-group-append {
                cursor: pointer;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css"> 
    </head>
    <body style="background-color:LightPink">
        <!-- Navbar -->
        <nav style="background-color:LightPink">
        <div style="width:100%; margin-top:1rem;">
            <div style="display:flex; float:left; width:33%;padding-left:1rem;">
                <a class="btn btn-dark" href="userhistory.php">Back</a>
            </div><br/>
        </div>
    </nav>

        <!-- Begin page content -->
        <main class="flex-shrink-0">
            <div class="container text-center">
                <h1 class="mt-5">Show Transaction Detail - <?= $dataTransaksi['username']?></h1>
                <p class="lead">Transaction Detail</p>
                <div class="col-12" style="margin-left:auto">
                    <div class="col-12">
                        <div class="col-6">
                            <label class="form-label">ID Transaksi</label>
                            <input type="text" class="form-control" name="id" readonly value="<?= $dataTransaksi['id_tr'] ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">In Game Name</label>
                            <textarea class="form-control" name="address" readonly><?= $dataTransaksi['ign'] ?></textarea>
                        </div>
                        <div class="col-6">
                            <label class="form-label">User ID</label>
                            <input type="number" class="form-control" name="uid" readonly value="<?= $dataTransaksi['uid'] ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Nama Item</label>
                            <input type="text" class="form-control" name="nama_item" readonly value="<?= $dataItem['nama_item'] ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Harga Item</label>
                            <input type="text" class="form-control" name="harga" readonly value="Rp.<?= $dataItem['harga'] ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Tanggal Pembelian</label>
                            <input type="text" class="form-control" name="tanggal" readonly value="<?= $dataTransaksi['tdate'] ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Metode Pembayaran</label>
                            <input type="text" class="form-control" name="tanggal" readonly value="<?= $dataTransaksi['payment'] ?>">
                        </div>
                        <div class="mb-3"><br/>
                            <a href="userHistoryDetail.php?id_tr=<?=$id_tr?>" class="btn btn-dark">Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script>
		window.print();
	    </script>
    </body>
</html>