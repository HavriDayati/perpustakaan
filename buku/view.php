<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php

include ('koneksi.php');
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
$query->execute();
$data = $query->fetch();

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
$data = $query->fetch();

return $data['nama'];
}

?>
<html>
<head>
	<title>view</title>
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
			 <div class="panel-heading"><h2>RINCIAN BUKU</h2></div>
			 <form enctype="multipart/form-data" action="aksi_create.php" method="POST">
			</div><table class="table table-border">
			<tr>
		<td>Nama Buku</td>
		<td>:</td>
		<td><?php print $data['nama']; ?></td>
	</tr>
	<tr>
		<td>Jenis Buku</td>
		<td>:</td>
		<td><?php print getjenis($data['id_jenis']);?></td>
	</tr>
	<tr>
		<td>Cover</td>
		<td>:</td>
		<td><img width="200px" src="cover/<?php print $data['cover']; ?>"/></td>
	</tr>
	<tr>
		<td>Penulis</td>
		<td>:</td>
		<td><?php print getpenulis($data['id_penulis']);?></td>
	</tr>
</table>