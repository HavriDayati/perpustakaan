
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php

include('koneksi.php');
$query = $db->prepare("SELECT * FROM jenis");
$query->execute();
$data = $query->fetchAll();

include('koneksi.php');
$query = $db->prepare("SELECT * FROM penulis");
$query->execute();
$penulis = $query->fetchAll();
?>

<html>
<head>
	<title>Tambah Buku</title>
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
			 <div class="panel-heading"><h2>TAMBAH BUKU</h2></div>
			 <form enctype="multipart/form-data" action="aksi_create.php" method="POST">
</div>
	
		<table class="table table-border">
		<thead>
		<tbody>
		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="nama" required></td>
		</tr>
		<tr>
			<td>Jenis Buku</td>
			<td>:</td>
			<td><select name="id_jenis" class="form-control" required>
			<?php $i=1; foreach ($data as $value): ?>
			<option value="<?= $value['id']; ?>"><?=$value['nama']; ?></option>
			 <?php $i++; endforeach; ?>
			 </select>
		</td>
			</tr>
		<tr>
			<td>Cover</td>
			<td>:</td>
			<td><input class="form-control" type="file" name="cover"></td>		
		</tr>
		<tr>
			<tr>
			<td>Penulis</td>
			<td>:</td>
			<td><select name="id_penulis" class="form-control" required>
			<?php $i=1; foreach ($penulis as $value): ?>
			<option value="<?= $value['id']; ?>"><?=$value['nama']; ?></option>
			 <?php $i++; endforeach; ?>
			 </select>
		</td>
			</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>
		</tr>
		</tbody>
		</thead>
	</table>
	</div>
</form>