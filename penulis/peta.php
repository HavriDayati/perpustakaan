<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD6850hcJvbBxOw6Cq7o3EDRIT5mbc3qCQ"></script>

<script type="text/javascript">

 (function() {

 window.onload = function() {

 var map;

 var locations = [

    <?php        

  $host="localhost";

  $username="root";

  $password="";

  $database="perpustakaan_ppi";


   $connection=mysql_connect ($host, $username, $password);

   $db_selected = mysql_select_db($database, $connection);
 
    $sql = "SELECT * FROM penulis";

     $result = mysql_query($sql);

    while($data = mysql_fetch_object($result)) {

      ?>

    [<?=$data->lat;?>, <?=$data->lon;?>, '<?=$data->nama;?>'],

    <?php }    ?>        

    ];

   

    //Parameter Google maps

     var options = {

      zoom: 10, //level zoom maps

       center: new google.maps.LatLng(-6.537124, 107.446965), //kordinat tengah maps

       mapTypeId: google.maps.MapTypeId.ROADMAP

      };

     

      // Buat maps pada id peta 

     var map = new google.maps.Map(document.getElementById('peta'), options);

    

    // Tambahkan Marker 

    var infowindow = new google.maps.InfoWindow();

 

    var marker, i;

    /* kode untuk menampilkan banyak marker */

     for (i = 0; i < locations.length; i++) {  

      marker = new google.maps.Marker({

       position: new google.maps.LatLng(locations[i][0], locations[i][1]),

        map: map,
        animation:google.maps.Animation.BOUNCE,
        icon: 'markerr.png'

       });
      

    /* menambahkan event clik untuk menampikan infowindows dengan isi sesuai dgn marker yang di klik */        

      google.maps.event.addListener(marker, 'click', (function(marker, i) {

        return function() {

             infowindow.setContent('<img src="' + locations[i][3] + '" width="50" /><br/><b>' + locations[i][2] + '</b>');

            infowindow.open(map, marker);

           }

         })(marker, i));

      }

     };

  })();

   </script>

    

   <!-- Style untuk Peta -->

   <style>

   #peta {

      border:1px solid #000;

       width:1100px;

        height:595px;

 }

 </style>

 

 <div align="center">  

   <div id="peta"></div>

 </div>