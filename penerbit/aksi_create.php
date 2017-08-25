<?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$alamat_penerbit = $_POST['alamat_penerbit'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$tahun_terbit = $_POST['tahun_terbit'];


print $nama.'<br>';
print $alamat_penerbit.'<br>';
print $latitude.'<br>';
print $longitude.'<br>';
print $tahun_terbit.'<br>';

$query = $db->prepare("INSERT INTO penerbit (nama, alamat_penerbit, latitude, longitude, tahun_terbit) VALUES ('$nama','$alamat_penerbit', '$latitude', '$longitude', '$tahun_terbit')");


if($query->execute()){
	header("Location: index.php");
}

?>