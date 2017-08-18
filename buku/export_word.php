<?php
include ('koneksi.php');
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-word");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=buku-export.doc");
 
// Tambahkan table
include 'data.php';
?>