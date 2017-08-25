<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

 if(isset($_SESSION['username'])) { ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Perpustakaan PPI</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/style.css">
 </head>
 <body>
  <div class="container">
  <div class="jumbotron">
  <h2>APLIKASI PERPUSTAKAAN</h2>
  <div class="row">
    <div class="col-md-3">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="http://localhost/PPI/home.php">Home</a></li>

                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <?php if($_SESSION['role'] == 1){ ?>
              <h3>Selamat Datang Admin</h3>
              <ul class="nav navbar-nav">
                <li><a href="http://localhost/PPI/buku/index.php">Buku</a></li>
                <li><a href="http://localhost/PPI/jenis/index.php">Jenis</a></li>
                <li><a href="http://localhost/PPI/jenis_kelamin/index.php">Jenis Kelamin</a></li>
                <li><a href="http://localhost/PPI/peminjaman/index.php">Peminjaman</a></li>
                <li><a href="http://localhost/PPI/penerbit/index.php">Penerbit</a></li>
                <li><a href="http://localhost/PPI/penulis/index.php">Penulis</a></li>
                <li><a href="http://localhost/PPI/user/index.php">User</a></li>
                <li><a href="http://localhost/PPI/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
              </ul>
              
                <?php } elseif($_SESSION['role'] == 2){ ?>
                  <h3>Selamat Datang User</h3> 
                <ul class="nav navbar-nav">
                  <li><a href="http://localhost/PPI/buku/index.php">Buku</a></li>
                  <li><a href="http://localhost/PPI/peminjaman/index.php">Peminjaman</a></li>
                  <li><a href="http://localhost/PPI/penerbit/index.php">Penerbit</a></li>
                  <li><a href="http://localhost/PPI/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
                <?php } ?>
            </div>
          </div>
        </nav>    
    <script src="bootstrap-3.3.7-dist/js/jQuery v3.2.0.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>
</html>

<?php 

print_r($_SESSION);


?>

<?php } else {
  session_destroy();
  
  if(basename(__FILE__) == 'home.php'){
    header('location: index.php');
  } else{
    header('location: ../../../index.php');
  }

}

?>