<?php
include('koneksi.php');
$query = $db->prepare("SELECT * FROM buku");
$query->execute();


function getjenis($id) {
    include('koneksi.php');
$query = $db->prepare("SELECT * FROM jenis WHERE id =$id");
$query->execute();
$data = $query->fetch();

return $data['nama'];
}


?>

<table border='1' class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Jenis Buku</th>
                <th>Cover</th>
            </tr>
            </thead>
            <?php $i=1; foreach ($query->fetchAll() as $value): ?>
            <tr>
                <td style="text-align: center"><?= $i ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= getjenis($value['id_jenis']);?></td>
                <td> <img width="100px" src="cover/<?= $value['cover'] ?>"> </td>

            </tr>
            <?php $i++; endforeach; ?>
        </table>