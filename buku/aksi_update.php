<?php

include('koneksi.php');

$id = $_GET['id'];

$query = $db->prepare("SELECT * FROM buku WHERE id = $id");
$query->bindValue(':id', $_GET['id']);
$query->execute();
$data = $query->fetch();

$nama = $_POST['nama'];
$id_jenis = $_POST['id_jenis'];


$lokasi_file = $_FILES['cover']['tmp_name'];
$tipe_file 	 = $_FILES['cover']['type'];
$nama_file   = $_FILES['cover']['name'];
$direktori   = "cover/$nama_file";
$id_penulis = $_POST['id_penulis'];
print $lokasi_file;

if { $nama_file=$data['cover'] (!empty($lokasi_file)) 
} else {

	move_uploaded_file($lokasi_file, $direktori);
}

print $nama.'<br>';
print $id_jenis.'<br>';
print $cover.'<br>';
print $id_penulis.'<br>';

$query = $db->prepare("UPDATE buku SET nama = '$nama', id_jenis = '$id_jenis', cover = '$nama_file',id_penulis = '$id_penulis' WHERE id=$id");


if($query->execute()){
	header("Location: index.php");
}

?>