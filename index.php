<?php
session_start();

ini_set('display_errors', 1);

include 'koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = $db->prepare("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

  $query->execute();
  $count = $query->fetchColumn();

  if ($count != false) {

    $query->execute();
    $user = $query->fetch();
     $_SESSION['id_user'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['nama'] = $user['nama'];
    header('location: home.php');
  } else {
    echo "<script>alert('Your Account Invalid')</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
  <script src="bootstrap/js/jquery-1.12.0.min.js"></script> 
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/style.css">
</head>
<body>
<!-- <div align="center" class="tengah"><p align="center"><font face="verdana" size="4" color="black"> -->
<div class="row">
<div class="container">
<div class="col-sm-4">
  <form method="POST">
    <div class="form">
      <h2 style="text-align: center;"><b>Please Login</b><hr width="50%"></h2>
        <div class="form-group">
          <label for="usr">Username</label>
          <input type="text" placeholder="Enter Username" class="form-control" name="username" required></input>
            </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" placeholder="Enter Password" class="form-control" name="password" required></input>
            </div>  
            <button class="btn btn btn-info" name="login">Login
            </button> 
            <button class="btn btn btn-info" name="Batal">Batal
            </button>

        </div>
      </div>  
    </div>
  </form> 
  </div>
</div>  
</div>
</body>