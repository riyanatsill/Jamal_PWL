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
    header('Location:home.php');
}
$uname = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$uname'";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($query);
if(isset($_POST['submit'])){
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        $newpassword = $_POST['newpassword'];
        $id = $data['id'];

        $sql = "UPDATE users SET 
                    email = '$email',
                    username = '$username',
                    password = '$hashedPass'
                    WHERE id = '$id'";
        $query = mysqli_query($con, $sql);

        if ($query) header("location:home.php");

        echo "Something Went Wrong On The Update";
    }
}



// $uname = $_SESSION['username'];
// $sql = "SELECT * FROM users WHERE username = '$uname'";
// $query = mysqli_query($con, $sql);
// $data = mysqli_fetch_assoc($query);
// $id = $data['id'];

// if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
//     extract($_REQUEST);
//     $data	=	array(
//                     'email'=>$email,
//                     'username'=>$username,
//                     'password'=>$password,
//                     );
//     $update	=	$db->update('users',$data,array('id'=>$id));
//     if($update){
//         header('location: browse-users.php?msg=rus');
//         exit;
//     }else{
//         header('location: browse-users.php?msg=rnu');
//         exit;
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <link rel="icon" type="image" sizes="32x32" href="images/favicon-32x32.png"/>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/tambahan.css" />
</head>
<body>
<header>
    <a class="title">JAMALGAMING</a>
    <!--input type="search" name="" id="" class="input-search" placeholder="What Are You Looking For...">
    <button type="submit" class="input-submit">search</button-->
    <nav>
        <ul>
            <p><a href="home.php">HOME</a></p>
        </ul>
    </nav>
</header>
<div class="col-12" id="data2">
    <form action="profile.php" method="POST">
        <div class="row background-data">
            <h1>Data Anda</h1>
            <div class="col-12">
                <h3>E-mail</h3>
                <input type="text" name="email" class="input-submit" id="floatingInput" placeholder="E-mail" value=<?=$data['email']?>>
                <label for="floatingInput"></label>
            </div>
            <div class="col-12">
                <h3>Username</h3>
                <input type="text" name="username" class="input-submit" id="floatingInput" placeholder="username" value=<?=$data['username']?>>
                <label for="floatingInput"></label>
            </div>
            <div class="col-12">
                <h3>New Password</h3>
                <input type="password" name="password" class="input-submit" id="floatingInput" placeholder="New Password">
                <label for="floatingInput"></label>
            </div>
            <div class="col-12">
                <h3>New Password</h3>
                <input type="password" name="repassword" class="input-submit" id="floatingInput" placeholder="Retype New Password">
                <label for="floatingInput"></label>
            </div>
            <button style="padding: 1%; border-radius: 5px 5px 5px 5px; width: 10%;" type="submit" name="submit">UPDATE</button>
        </div>
    </form>
</div>
<footer>
    <div class="contact">
        <h1>SOCIAL MEDIA</h1>
        <a href = "https://www.instagram.com/jamal_gaming22/" ><img src="images/ig.png" alt=""/></a>
        <a href = "https://wa.me/6287884541593" ><img src="images/WA2.png" alt=""/></a>
    </div>
</footer>
</body>
</html>
