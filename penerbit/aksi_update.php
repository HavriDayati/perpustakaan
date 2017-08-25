 <?php

include('koneksi.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$alamat_penerbit = $_POST['alamat_penerbit'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$tahun_terbit = $_POST['tahun_terbit'];

print $nama.'<br>';

$query = $db->prepare("UPDATE penerbit SET nama = '$nama', alamat_penerbit = '$alamat_penerbit', latitude = '$latitude', longitude = '$longitude', tahun_terbit = '$tahun_terbit' WHERE id=$id");


if($query->execute()){
	header("Location: index.php");
}

?>