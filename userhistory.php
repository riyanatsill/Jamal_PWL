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

$uname = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$uname'";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($query);

// METHOD GET
$pagination = 5;
$page = (isset($_GET['page'])) ? $page = $_GET['page'] : 1;
$position = ($page == 1) ? 0 : ($page - 1) * $pagination;

$dmlNoPagination = "SELECT id_tr, username, ign, uid, id_item, payment FROM transaksi";
$queryNoPagination = mysqli_query($con, $dmlNoPagination);
$rows = mysqli_num_rows($queryNoPagination);
$pages = ceil($rows/$pagination);

//ambil id_item(item)
$sqlItem = "SELECT * FROM transaksi where username = '$uname'";
$resultSqlItem = mysqli_query($con, $sqlItem);
$getItem = mysqli_fetch_assoc($resultSqlItem);

$dmlDefault = "SELECT id_tr, ign, uid, tdate FROM transaksi LIMIT $position, $pagination";
$queryDefault = mysqli_query($con, $dmlDefault);

if (isset($_GET['searchBtn'])) {
    $field = $_GET['attribute'];
    $search = $_GET['search'];

    $dmlSearch = "SELECT id_tr, ign, uid, tdate FROM transaksi WHERE $field LIKE '%$search%'";
    $querySearch = mysqli_query($con, $dmlSearch);
    $rows = mysqli_num_rows($querySearch);
    $pages = ceil($rows/$pagination);
}
?>

<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css%22%3E">
</head>
<body style="background-color: #62B6B7">
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #439A97">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php" style="color: black">BACK</a>
        </div>
    </nav>
</header>
<div class="container">
    <br><br><br>
    <table class="table">
        <thead style="background-color:LightBlue">
        <tr>
            <th>IGN</th>
            <th>UID</th>
            <th>Tanggal Pembelian</th>
            <th>Detail</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($data = (isset($_GET['searchBtn'])) ? mysqli_fetch_array($querySearch) : mysqli_fetch_array($queryDefault)) { ?>
            <form>
                <tr style="background-color:white">
                    <td><?= $data['ign'] ?></td>
                    <td><?= $data['uid'] ?></td>
                    <td><?= $data['tdate'] ?></td>
                    <td><a href="userHistoryDetail.php?id_tr=<?= $data['id_tr'] ?>" style="background-color:grey" class="btn">Print Detail</a></td>
                </tr>
            </form>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <ul style="display:flex; justify-content:center;" class="pagination">
        <?php for ($i = 1; $i <= $pages; $i++) { ?>
            <li class="page-item"><a class="btn btn-dark" href="<?php echo ($i != $page) ? "history.php?page=" . $i : "#" ?>"><?= $i ?></a></li>
        <?php } ?>
    </ul>
</div>
</body>
</html>
