<?php
    session_start();
    if (!isset($_SESSION['username'])){
        $_SESSION['msg'] = 'anda harus login';
        header('Location: login.php');
    }
    require "config.php";
    $user = $_SESSION['username'];
    $sql = "SELECT * from users where username = '$user'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);

    if($data['level'] == 'admin'){
        header('Location:dashboard.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/carousel.rtl.css" rel="stylesheet">
    <link rel="icon" type="image" sizes="32x32" href="images/favicon-32x32.png"/>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #439A97">
        <div class="container-fluid">
            <a class="navbar-brand" href="logout.php" onclick="return  confirm('Yakin Ingin Melakukan Logout ?')" ><Button class="col-12 btn btn-danger" >Logout</Button></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#produk" style="color: black">PRODUCT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile.php" style="color: black">PROFILE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="userhistory.php" style="color: black">HISTORY</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body style="background-color: #62B6B7">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/valorant1.jpg" width="100%" height="100%" class="bd-placeholder-img">
                <div class="container">
                    <div class="carousel-caption text-start" >
                        <h1 >Welcome to JamalGaming</h1>
                        <p>Tempat dimana kalian bisa membuat akun game kesayangan kalian menjadi lebih keren.</p>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/gi2.jpeg" width="100%" height="100%" class="bd-placeholder-img">
            </div>
            <div class="carousel-item">
                <img src="images/ml1.jpeg" width="100%" height="100%" class="bd-placeholder-img">
            </div>

            <div class="carousel-item">
                <img src="images/pubg1.jpeg" width="100%" height="100%" class="bd-placeholder-img">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container marketing" style="color: black">
        <div class="row" id="produk">
            <div class="col-lg-6">
                <img src="images/valorant.jpg" width="140" height="140">
                <h2 class="fw-normal">VALORANT</h2>
                <p><a class="btn btn-secondary" href="valorant.php">TOP-UP </a></p>
            </div>
            <div class="col-lg-6">
                <img src="images/GenshinImpact.jpg" width="140" height="140">
                <h2 class="fw-normal">GENSHIN IMPACT</h2>
                <p><a class="btn btn-secondary" href="genshin.php">TOP-UP </a></p>
            </div>
            <div class="col-lg-6">
                <img src="images/mlbb.jpg" width="140" height="140">
                <h2 class="fw-normal">MOBILE LEGEND</h2>
                <p><a class="btn btn-secondary" href="mlbb.php">TOP-UP </a></p>
            </div>
            <div class="col-lg-6">
                <img src="images/pubgm.jpg" width="140" height="140">
                <h2 class="fw-normal">PUBG MOBILE</h2>
                <p><a class="btn btn-secondary" href="pubgm.php">TOP-UP</a></p>
            </div>
        </div>
        <hr class="featurette-divider">
        <footer class="container">
            <p style="text-align: center">&copy; 2022 JAMALGAMING</a></p>
        </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>

