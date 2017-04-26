<?php
require_once("model/kasir.php");
$id_kasir = $_GET['id'];
$list_kasir = $kasir->show($id_kasir);
?>
<table class="table table-striped">
	<tr>
		<td><strong>ID kasir</strong></td>
		<td><?=$list_kasir['id_kasir']?></td>
	</tr>
	<tr>
		<td><strong>Nama</strong></td>
		<td><?=$list_kasir['nama']?></td>
	</tr>
	<tr>
		<td><strong>Alamat</strong></td>
		<td><?=$list_kasir['alamat']?></td>
	</tr>
	<tr>
		<td><strong>Telepon</strong></td>
		<td><?=$list_kasir['telepon']?></td>
	</tr>
	<tr>
		<td><strong>Status</strong></td>
		<td><?=$list_kasir['status']?></td>
	</tr>
	<tr>
		<td><strong>Username</strong></td>
		<td><?=$list_kasir['username']?></td>
	</tr>
	<tr>
		<td><strong>Password</strong></td>
		<td>******</td>
	</tr>
	<tr>
		<td><strong>Akses</strong></td>
		<td><?=$list_kasir['akses']?></td>
	</tr>
</table>