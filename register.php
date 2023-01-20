<!doctype html>
<html lang="`en`">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/tambahan.css" />
    <link rel="icon" type="image" sizes="32x32" href="images/favicon-32x32.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/sign-in.css" rel="stylesheet">
</head>
<body class="text-center" style="background-color: #62B6B7">
<?php
require ('config.php');
session_start();

$error = '';
$validate = '';
if(isset($_SESSION['user'])) header('Location: home.php');
if(isset($_POST['submit'])){
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $repass = stripslashes($_POST['repassword']);
    $repass = mysqli_real_escape_string($con, $repass);
    $level = 'user';

    if (!empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))){
        if ($password == $repass){
            if (cek_email($email,$con) == 0){
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (email,username,password,level) VALUES ('$email','$username','$pass','$level')";
                $result = mysqli_query($con, $query);
                if ($result){
                    $_SESSION['username'] = $username;
                    header('Location: home.php');
                } else{
                    $error = 'Register User Gagal !';
                }
            } else{
                $error = 'Username Sudah Terdaftar !';
            }
        } else{
            $validate = 'Password tidak sama !';
        }
    } else{
        $error = 'Data tidak boleh kosong !';
    }
}
function cek_email($email,$con){
    $email = mysqli_real_escape_string($con,$email);
    $query = "SELECT * FROM users WHERE email = '$email'";
    if ($result = mysqli_query($con,$query)) return mysqli_num_rows($result);
}
?>

<main class="form-signin w-100 m-auto">
    <form action="register.php" method="POST">
        <img class="mb-4" src="images/android-chrome-192x192.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="www@gmail.com">
            <label for="floatingInput">Email</label>
        </div>
        <br>
        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="floatingInput" placeholder="username">
            <label for="floatingInput">Username</label>
        </div>
        <br>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="password">
            <label for="floatingPassword">Password</label>
        </div>
        <br>
        <div class="form-floating">
            <input type="password" class="form-control" name="repassword" id="floatingPassword" placeholder="repassword">
            <label for="floatingPassword">Re-Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
        <p>Sudah Punya Akun? <a href="login.php">Login</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2022 JAMALGAMING</p>
    </form>
</main>



</body>
</html>


