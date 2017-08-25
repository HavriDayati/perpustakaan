<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php

include('koneksi.php');
$query = $db->prepare("SELECT * FROM jenis");
$query->execute();

?>

<html>
<head>
	<title>Tambah User</title>
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
			 <div class="panel-heading"><h2>TAMBAH USER</h2></div>
			 <form enctype="multipart/form-data" action="aksi_create.php" method="POST">
</div>
<form action="aksi_create.php" method="POST">
	<table class="table table-border">
	<thead>
	<tbody>
		<tr>
			<td>Nama Pengguna</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="nama"></td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="password"></td>
		</tr>
		<tr>
			<td>Role</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="role"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Simpan" name="submit"></td>
		</tr>
		</tbody>
		</thead>
	</table>
</form>