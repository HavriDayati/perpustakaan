<header><title>Update User</title></header>
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<?php 

$id = $_GET['id']; 

include('koneksi.php');

$query = $db->prepare("SELECT * FROM user WHERE id = $id");
$query->execute();
$data = $query->fetch();

?>
<div class="container">
	<section class="col-lg-12">
		<div class="table-responsive">
			<div class="page-header">
					<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><h1>UPDATE USER</h1></div>
</div>

<form action="aksi_update.php?id=<?php print $id; ?>" method="POST">
	<table class="table table-border">
	<tr>
			<td>Nama Pengguna</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="nama" value="<?= $data['nama']; ?>"></input></td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="username" value="<?= $data['username']; ?>"></input></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="password" value="<?= $data['password']; ?>"></input></td>
		</tr>
		<tr>
			<td>Role</td>
			<td>:</td>
			<td><input class="form-control" type="text" name="role" value="<?= $data['role']; ?>"></input></td>
			</tr>
			<tr>

		<td colspan="2"><input type="submit" name="submit" value="Simpan"></input>
		</tr>
	</table>
</form>