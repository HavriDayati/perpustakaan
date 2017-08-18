
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php

include('koneksi.php');
$query = $db->prepare("SELECT * FROM buku");
$query->execute();

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
			 <div class="panel-heading"><h2>TAMBAH PEMINJAMAN</h2></div>
			 <form enctype="multipart/form-data" action="aksi_create.php" method="POST">
</div>
<form action="aksi_create.php" method="POST">
	<table class="table table-border">
	<thead>
	<tbody>
		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td><select name="id_buku" class="form-control">
			<?php $i=1; foreach ($query->fetchAll() as $value): ?>
			<option value="<?= $value['id']; ?>"><?=$value['nama']; ?></option>
			 <?php $i++; endforeach; ?>
			 </select>
		</tr>
		<tr>
			<td>Nama User</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="id_user"></td>
		</tr>
		<tr>
			<td>Waktu Peminjaman</td>
			<td>:</td>
			<td><input class="form-control" type="date" name="waktu_dipinjam"></td>
		</tr>
		<tr>
			<td>Waktu Pengembalian</td>
			<td>:</td>
			<td><input class="form-control" type="date" name="waktu_pengembalian"></td>
		</tr>
		<tr>

			<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>
		</tr>
		</tbody>
		</thead>
	</table>
</form>