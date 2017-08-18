<title>Tambah Peminjam Buku</title> 
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php
session_start();

include('koneksi.php');
$query = $db->prepare("SELECT * FROM buku");
$query->execute();

function getbuku($id) {
    include('koneksi.php');
$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
$query->execute();
$data = $query->fetch();

return $data['nama'];
}

?>

<html>
<head>
	<title>Peminjaman</title>
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
			 <div class="panel-heading"><h2>PEMINJAMAN BUKU</h2></div>
			 <form enctype="multipart/form-data" action="aksi_create.php" method="POST">
</div>
<form action="aksi_create.php" method="POST">
<input type="hidden" name="id_buku" value="<?= $_GET['id'] ?>"></input>
<input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>"></input>

	<table class="table table-border">
	<thead>
	<tbody>
		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td><input class="form-control" name="nama_buku" readonly value="<?= getbuku($_GET['id']); ?>">
		<tr>
			<td>Nama User</td>
			<td>:</td>
			<td><input class="form-control" name="username" readonly value="<?php print $_SESSION['username']; ?>"></input></td>
		</tr>
		<tr>
			<td>Waktu Peminjaman</td>
			<td>:</td>
			<td><input class="form-control" name="waktu_dipinjam" readonly value="<?php print date("Y-m-d"); ?>"></input></td>
		</tr>
		<tr>
			<td>Waktu Pengembalian</td>
			<td>:</td>
			<td><input class="form-control" name="waktu_pengembalian" readonly value="<?php print date("Y-m-d", strtotime('+1 week')); ?>"></input></td>
		</tr>
		<tr>

			<td colspan="2"><input type="submit" value="Simpan" name="submit"></input></td>
		</tr>
		</tbody>
		</thead>
	</table>
</form>