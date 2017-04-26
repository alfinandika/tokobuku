<?php
require_once('model/buku.php');

$id_buku = $_GET['id'];

$list_buku = $buku->show($id_buku);
?>
<table class="table table-bordered table-striped">
	<tr>
		<td><strong>Judul Buku</strong></td>
		<td><?=$list_buku['judul']?></td>
		<td rowspan="10" style="width: 50%;">
			<div align="center">
				<img style="width: 450px; height: 500px;" src="foto/<?=$list_buku['foto']?>">
			</div>
		</td>
	</tr>
	<tr>
		<td><strong>Nomor ISBN</strong></td>
		<td><?=$list_buku['noisbn']?></td>
	</tr>
	<tr>
		<td><strong>Penulis</strong></td>
		<td><?=$list_buku['penulis']?></td>
	</tr>
	<tr>
		<td><strong>Penerbit</strong></td>
		<td><?=$list_buku['penerbit']?></td>
	</tr>
	<tr>
		<td><strong>Tahun</strong></td>
		<td><?=$list_buku['tahun']?></td>
	</tr>
	<tr>
		<td><strong>Stok</strong></td>
		<td><?=$list_buku['stok']?></td>
	</tr>
	<tr>
		<td><strong>Harga Pokok</strong></td>
		<td>Rp.<?=$list_buku['harga_pokok']?>,-</td>
	</tr>
	<tr>
		<td><strong>Harga Jual</strong></td>
		<td>Rp.<?=$list_buku['harga_jual']?>,-</td>
	</tr>
	<tr>
		<td><strong>PPN</strong></td>
		<td><?=$list_buku['ppn']?>%</td>
	</tr>
	<tr>
		<td><strong>Diskon</strong></td>
		<td><?=$list_buku['diskon']?>%</td>
	</tr>
</table>