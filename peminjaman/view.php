<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM peminjaman WHERE id = $id");
$query->execute();
$data = $query->fetch();

function getbuku($id) {
    include('koneksi.php');
$query = $db->prepare("SELECT * FROM buku WHERE id =$id");
$query->execute();
$data = $query->fetch();

return $data['nama'];
}

function getuser($id) {
    include('koneksi.php');
$query = $db->prepare("SELECT * FROM user WHERE id =$id");
$query->execute();
$data = $query->fetch();

return $data['nama'];
}

?>
<html>
<head>
	<title>Daftar Peminjam</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <script type="text/javascript" src="..//js/jquery.js"></script>
  <script type="text/javascript" src=../"js/bootstrap.js"></script>
</head>
<body>
<div class="container">
	<section class="col-lg-12">
		<div class="table-responsive">
			<div class="page-header">
			<div class="panel panel-primary">
			 <div class="panel-heading"><h2>RINCIAN BUKU PEMINJAM</h2></div>
			 <form enctype="multipart/form-data" action="aksi_create.php" method="POST">
			</div><table class="table table-border">
	<tr>
		<td>Nama Buku</td>
		<td>:</td>
		<td><?php print getbuku ($data['id_buku']); ?></td>
	</tr>
	<tr>
		<td>Nama Peminjam</td>
		<td>:</td>
		<td><?php print getuser ($data['id_user']); ?></td>
	</tr>
	<tr>
	<td>Waktu Peminjaman</td>
		<td>:</td>
		<td><?php print $data['waktu_dipinjam']; ?></td>
	</tr>
	<tr>
		<td>Waktu Pengembalian</td>
		<td>:</td>
		<td><?php print $data['waktu_pengembalian']; ?></td>
	</tr>
</table>