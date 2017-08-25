<!DOCTYPE html>
<header><title>Maps Penerbit Buku</title></header> 

<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/jquery.js"></script>
  <script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6850hcJvbBxOw6Cq7o3EDRIT5mbc3qCQ&sensor=false" type="text/javascript"></script>
    <script>
    function initialize(a,b,c,d) {
  var myLatlng = new google.maps.LatLng(a, b);
  var mapOptions = {
    zoom: 15,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title: d});
}
    </script>
<style>
      html, body, #map-canvas {
        
        height: 90%;
        padding: 5px;
        
      }
    </style>
<body>
<div class="panel panel-primary">
      <div class="panel-heading"><h1>Maps Penerbit Buku</h1>
      </div>
  </div>
  <div class="row">
  <div class="col-sm-4">
 <table border="2">
  <thead>
   <td>ID</td><td>Nama Penerbit</td><td>Latitude</td><td>Longitude</td><td>Tool</td>
  </thead>
  <tbody>

<?php
include 'koneksi.php';
$query = $db->prepare("SELECT * FROM penerbit");
 $query->execute();
foreach ($query->fetchAll() as $data) {
 $id = $data['id'];
 $nama = $data['nama'];
 $alamat_penerbit = $data['alamat_penerbit'];
 $latitude = $data['latitude'];
 $longitude = $data['longitude'];
 echo "<tr><td>$id</td><td>$nama</td><td>$latitude</td><td>$longitude</td><td><button onclick='initialize($latitude,$longitude,\"$nama\",\"$alamat_penerbit\")' class='btn btn-primary'><i class='glyphicon glyphicon-map-marker'></i> Maps</button></td></tr>";
}
?>
  </tbody>
 </table>
 </div>
 <div class="col-sm-8">
 <div id='map-canvas' style="width: 875px; height: 425px;"></div>
 </div>
</body>