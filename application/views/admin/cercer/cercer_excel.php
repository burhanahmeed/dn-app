<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=cerdas_cermat.xls");
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
 <th>Anggota 1</th>
 <th>NIM Anggota 1</th>
 <th>Anggota 2</th>
 <th>NIM Anggota 2</th>
 <th>Status</th>
 <th>Kontak</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($cercer as $row) { ?>
<tr>
 <td><?php echo $i ?>
 <td><?php echo $row['id'] ?></td>
  <td><?php echo $row['uid'] ?></td>
 <td><?php echo $row['nama_tim'] ?></td>
 <td><?php echo $row['asal_univ'] ?></td>
 <td><?php echo $row['ketua'] ?></td>
 <td><?php echo $row['nim_ketua'] ?></td>
 <td><?php echo $row['anggota1'] ?></td>
 <td><?php echo $row['nim_a1'] ?></td>
 <td><?php echo $row['anggota2'] ?></td>
 <td><?php echo $row['nim_a2'] ?></td>
 <td><?php echo $row['status'] ?></td>
 <td><?php echo $row['kontak'] ?></td>
</tr>
<?php $i++; } ?>
</tbody>
</table>
