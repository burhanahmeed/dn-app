<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=kofid_peserta.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1" width="100%">
<thead>
<tr>
 <th>No</th>
 <th>ID User</th>
 <th>Kode Tim</th>
 <th>Nama Tim</th>
 <th>Asal Instansi</th>
 <th>Nama Ketua</th>
 <th>NIM Ketua</th>
 <th>alamat</th>
 <th>kontak</th>
 <th>LINK</th>
 <th>Deskripsi</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($kofid as $row) { ?>
<tr>
 <td><?php echo $i ?>
  <td><?php echo $row['uid'] ?></td>
 <td><?php echo $row['id'] ?></td>
 <td><?php echo $row['nama_tim'] ?></td>
 <td><?php echo $row['asal_univ'] ?></td>
 <td><?php echo $row['ketua'] ?></td>
 <td><?php echo $row['nim_ketua'] ?></td>
 <td><?php echo $row['alamat'] ?></td>
 <td><?php echo $row['kontak'] ?></td>
 <td><?php echo $row['submission'] ?></td>
 <td><?php echo $row['deskripsi'] ?></td>
</tr>
<?php $i++; } ?>
</tbody>
</table>
