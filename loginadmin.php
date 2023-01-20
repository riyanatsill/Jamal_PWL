<?php
require ('config.php');
session_start();

$error = '';
$validate = '';

if (isset($_SESSION['username'])) header('Location: dashboard.php');
if (isset($_POST['submit'])){
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);
    if (!empty(trim($username)) && !empty(trim($password))){
        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($con,$query);
        $rows = mysqli_num_rows($result);
        if ($rows != 0){
            $hash = mysqli_fetch_assoc($result)['password'];
            if (password_verify($password, $hash)){
                $_SESSION['username'] = $username;
                header('Location: dashboard.php');
            }
        } else{
            $error = 'Username atau Password Salah!';
        }
    } else{
        $error = 'Data tidak boleh kosong';
    }
}
?>
<!doctype html>
<html lang="`en`">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" type="image" sizes="32x32" href="images/favicon-32x32.png"/>
    <link href="css/sign-in.css" rel="stylesheet">
    <link rel="icon" type="image" sizes="32x32" href="images/favicon-32x32.png"/>
</head>

<body class="text-center">
<main class="form-signin w-100 m-auto">
    <form action="loginadmin.php" method="POST">
        <img class="mb-4" src="images/android-chrome-192x192.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Login Admin</h1>

        <div class="form-floating">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="password">
            <label for="floatingPassword">Password</label>
        </div>


        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
        <p>Anda Bukan Admin? <a href="loginuser.php">Login User</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2022 JAMALGAMING</p>
    </form>
</main>



</body>
</html>

