<header><title>Daftar Buku</title></header>
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php
session_start();
include('koneksi.php');

$query = $db->prepare("SELECT * FROM buku");
$query->execute();


function getjenis($id) {
    include('koneksi.php');
$query = $db->prepare("SELECT * FROM jenis WHERE id =$id");
$query->execute();
$data = $query->fetch();

return $data['nama'];
}

function getpenulis($id) {
    include('koneksi.php');
$query = $db->prepare("SELECT * FROM penulis WHERE id =$id");
$query->execute();
$penulis = $query->fetch();

return $penulis['nama'];
}


?>


<!-- /*CONTOH SELECT * FROM*/

/*$query = $db->prepare("DELETE FROM buku WHERE id=90");
$query = $db->prepare("INSERT INTO buku ('nama, id_jenis') VALUES ('tes1','jenis1')");
$query = $db->prepare("SELECT * FROM buku WHERE id = 90");
$query = $db->prepare("UPDATE buku SET nama = 'apa' WHERE id=90");*/
/*======================*/

/*UNTUK EKSEKUSI NYA*/

     
/*======================*/

/*APABILA SELECT NYA BANYAK, MAKA TAMBAHKAN BERIKUT */
//$query->fetchAll();

/*APABILA SELECT NYA SATU, MAKA TAMBAHKAN BERIKUT */
//$query->fetch(); -->


<div class="row">
    <!-- <div class="col-sm-3"> --> 
        <?php include('../home.php'); ?>
        </div>
    <!-- <div class="col-sm-9"> -->
        <div class="container">
        <div class="panel panel-primary">
<div class="panel-heading">
<h2>Daftar Buku</h2>
</div>
            <div class="panel-body">
            <?php session_start();
            if($_SESSION['role'] == 1){ ?>
            <a href="create.php"class="btn btn-primary"><i class="glyphicon glyphicon-plus "></i>Tambah Buku</a>
            <a href="export.php" class="btn btn-primary"><i class="glyphicon glyphicon-download "></i>
            Export ke Excel</a>
            <a href="export_word.php" class="btn btn-primary"><i class="glyphicon glyphicon-download "></i>
            Export ke Word</a>
            <a href="export_pdf2.php" class="btn btn-primary"><i class="glyphicon glyphicon-download "></i>
            Export ke Pdf</a>
            <?php } ?>



            <div>&nbsp;</div>
<!-- /.box-header -->
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Jenis Buku</th>
                <th>Cover</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php $i=1; foreach ($query->fetchAll() as $value): ?>
            <tr>
                <td style="text-align: center"><?= $i ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= getjenis($value['id_jenis']);?></td>
                <td> <img width="100px" src="cover/<?= $value['cover'] ?>"> </td>
                <td><?= getpenulis($value['id_penulis']);?></td>
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
                    <span class="glyphicon glyphicon-list"></span>

                    <?php } elseif($_SESSION['role'] == 2){ ?>
                    <a href="view.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-list"></span>
                     </a>
                     <a href="../peminjaman/pinjam.php?id=<?= $value['id']; ?>" 
                     class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Pinjam</a>
                     
                     <?php } ?>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </table>
    </div>
</div>