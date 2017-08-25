<header><title>Penerbit Buku</title></header>
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php

include('koneksi.php'); 

/*CONTOH SELECT * FROM*/
$query = $db->prepare("SELECT * FROM penerbit");
/*$query = $db->prepare("DELETE FROM buku WHERE id=90");
$query = $db->prepare("INSERT INTO buku ('nama, id_jenis') VALUES ('tes1','jenis1')");
$query = $db->prepare("SELECT * FROM buku WHERE id = 90");
$query = $db->prepare("UPDATE buku SET nama = 'apa' WHERE id=90");*/
/*======================*/

/*UNTUK EKSEKUSI NYA*/

$query->execute();

/*======================*/

/*APABILA SELECT NYA BANYAK, MAKA TAMBAHKAN BERIKUT */
//$query->fetchAll();

/*APABILA SELECT NYA SATU, MAKA TAMBAHKAN BERIKUT */
//$query->fetch();
?>
<div class="row">
    <!-- <div class="col-sm-3"> --> 
        <?php include('../home.php'); ?>
    </div>
    <!-- <div class="col-sm-9"> -->
        <div class="container">
        <div class="panel panel-primary">
<div class="panel-heading">
<h2>Daftar Penerbit</h2>
</div>
    <div class="panel-body">
    <?php session_start();
                if($_SESSION['role'] == 1){ ?>
            <a href="create.php"class="btn btn-primary"><i class="glyphicon glyphicon-plus "></i>Tambah Penerbit</a>
            <?php } ?>
            <a class="btn btn-primary" href="maps.php"><i class="glyphicon glyphicon-map-marker"></i> Lihat Maps </a>
<div>&nbsp;</div>
<!-- /.box-header -->
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Penerbit</th>
                <th>Alamat Penerbit</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php $i=1; foreach ($query->fetchAll() as $value): ?>
            <tr>
                <td style="text-align: center"><?= $i ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= $value['alamat_penerbit'] ?></td>
                <td><?= $value['latitude'] ?></td>
                <td><?= $value['longitude'] ?></td>
                <td><?= $value['tahun_terbit'] ?></td>
                <td>
                <?php session_start();
                if($_SESSION['role'] == 1){ ?>
                    <a href="update.php?id=<?= $value['id']; ?>">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="delete.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a href="view.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-list "></span>
                    </a>

                    <?php } elseif($_SESSION['role'] == 2){ ?>
                    <a href="view.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-list"></span>
                    </a>
                    <?php } ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </table>
    </div>
<!-- /.box-body -->
</div>
