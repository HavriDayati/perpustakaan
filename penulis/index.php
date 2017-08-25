<header><title>Penulis Buku</title></header>
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php

include('koneksi.php'); 

/*CONTOH SELECT * FROM*/
$query = $db->prepare("SELECT * FROM penulis");
$query->execute();


function getJumlah($id){
    include('koneksi.php');
    $query = $db->prepare("SELECT COUNT(id) FROM buku WHERE id_penulis = $id");
    $query->execute();
    return  $query->fetchColumn();
}

?>
<div class="row">
    <!-- <div class="col-sm-3"> --> 
        <?php include('../home.php'); ?>
    </div>
    <!-- <div class="col-sm-9"> -->
        <div class="container">
        <div class="panel panel-primary">
<div class="panel-heading">
<h2>Daftar Penulis</h2>
</div>
    <div class="panel-body">
            <a href="create.php"class="btn btn-primary"><i class="glyphicon glyphicon-plus "></i>Tambah Penulis</a>
            <a href="grafik.php"class="btn btn-primary"><i class="glyphicon glyphicon "></i>Grafik</a>
            <a href="peta.php"class="btn btn-primary"><i class="glyphicon glyphicon "></i>Peta</a>
<div>&nbsp;</div>
<!-- /.box-header -->
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Penulis</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php $i=1; foreach ($query->fetchAll() as $value): ?>
            <tr>
                <td style="text-align: center"><?= $i ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= $value['id_jenis_kelamin'] ?></td>
                <td><?= $value['alamat'] ?></td>
                <td><?= getJumlah($value['id']) ?></td>
                <td>
                    <a href="update.php?id=<?= $value['id']; ?>">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="delete.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a href="view.php?id=<?= $value['id']; ?>">
                    <span class="glyphicon glyphicon-list"></span>
                    </a>
                </td>
            </tr>
            <?php $i++; endforeach; ?>
        </table>
    </div>
<!-- /.box-body -->
</div>
