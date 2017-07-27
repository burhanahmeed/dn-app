<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1" width="100%">
<thead>
<tr>
 <th>No</th>
 <th>Email</th>
 <th>Password</th>
 <th>Tanggal</th>
 <th>Debat</th>
 <th>Bisplan</th>
 <th>Cercer</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($user as $row) { ?>
<tr>
 <td><?php echo $i ?>
 <td><?php echo $row['email'] ?></td>
 <td><?php echo $row['password'] ?></td>
 <td><?php echo $row['date'] ?></td>
 <td><?php echo $row['debat'] ?></td>
 <td><?php echo $row['bisplan'] ?></td>
 <td><?php echo $row['cercer'] ?></td>
</tr>
<?php $i++; } ?>
</tbody>
</table>
