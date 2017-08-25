<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php
$id = $_GET['id'];
include('koneksi.php');

$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
$query->bindValue(':id', $_GET['id']);
$query->execute();
$data = $query->fetch();

$query = $db->prepare("SELECT * FROM jenis");
$query->execute();
$jenis = $query->fetchAll();

$query = $db->prepare("SELECT * FROM penulis");
$query->execute();
$penulis = $query->fetchAll();

?>

<html>
<head>
	<title>Update Buku</title>
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
			 <div class="panel-heading"><h2>UPDATE BUKU</h2></div>
</div>

<form enctype="multipart/form-data" action="aksi_update.php?id=<?php print $id; ?>" method="POST">
	<table class="table table-border">
	<thead>
	<tbody>
		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="nama" value="<?= $data['nama']; ?>"></td>
		</tr>
		<tr>
			<td>Jenis Buku</td>
			<td>:</td>
			<td><select name="id_jenis" class="form-control">
			<?php $i=1; foreach ($jenis as $value): ?>
			<option value="<?= $value['id']; ?>"><?=$value['nama']; ?></option>
			 <?php $i++; endforeach; ?>
			 </select>
		</td>
		</tr>
		<tr>
		<td>Cover</td>
			<td>:</td>
			<td><input class="form-control" type="file" name="cover" value="<?= $data['cover']; ?>"></td>
		</tr>
		<tr>
			<td>Penulis</td>
			<td>:</td>
			<td><select name="id_penulis" class="form-control">
			<?php $i=1; foreach ($penulis as $value): ?>
			<option value="<?= $value['id']; ?>"><?=$value['nama']; ?></option>
			 <?php $i++; endforeach; ?>
			 </select>
		</td>
		</tr>
			<td colspan="2"><input type="submit" name="submit" value="Simpan"></td>
		</tr>
		</tbody>
		</thead>
	</table>
</form>