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

if($dataUsers['level'] == 'user'){
    header('Location:home.php');
}
$admin = $_SESSION['username'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/carousel.rtl.css" rel="stylesheet">
    <link rel="icon" type="image" sizes="32x32" href="images/favicon-32x32.png"/>
</head>
<body style="background-color: #62B6B7">

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #439A97">
        <div class="container-fluid">
            <a href="logout2.php" onclick="return  confirm('Yakin Ingin Melakukan Logout ?')" ><Button class="col-12 btn btn-danger" >LOGOUT</Button></a>
        </div>
    </nav>
</header>
<div style="text-align: center">
<h1>WELCOME</h1>
<h2><?php echo $admin; ?></h2>
</div>
<hr class="featurette-divider">
<main>
    <div class="container marketing">
        <div class="row">
            <div class="col-lg-6">
                <img src="images/history.png" width="140" height="140">
                <h2 class="fw-normal">HISTORY</h2>
                <p><a class="btn btn-secondary" href="history.php">CHECK</a></p>
            </div>
            <div class="col-lg-6">
                <img src="images/u.png" width="140" height="140">
                <h2 class="fw-normal">CHART</h2>
                <p><a class="btn btn-secondary" href="chart.php">CHECK</a></p>
            </div>
        </div>
        <hr class="featurette-divider">
    <footer class="container">
        <p>&copy; 2022 JAMALGAMING</a></p>
    </footer>
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>
