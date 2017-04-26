<?php
require_once('model/pasok.php');
$list_distributor = $pasok->distributor();
$list_buku = $pasok->buku();
?>

<form method="POST" action="controller/pasokcontroller.php?page=create" enctype="multipart/form-data">
	<div class="form-group">
		<label>Distributor</label>
		<select name="id_distributor" class="form-control" style="width: 50%">
		<?php
		while ($distributor = $list_distributor->fetch(PDO::FETCH_LAZY)) {
		?>
			<option value="<?=$distributor['id_distributor']?>"><?=$distributor['nama_distributor']?></option>
		<?php } ?>
		</select>
		
	</div>
	<div class="form-group">
		<label>Buku</label>
		<select name="id_buku" class="form-control" style="width: 50%">
		<?php
		while ($buku = $list_buku->fetch(PDO::FETCH_LAZY)) {
		?>
			<option value="<?=$buku['id_buku']?>"><?=$buku['judul']?></option>
		<?php } ?>
		</select>
		
	</div>
	<div class="form-group">
		<label>Jumlah</label>
		<input type="number" name="jumlah" class="form-control" style="width: 50%">
	</div>
	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" name="tanggal" class="form-control" style="width: 50%">
	</div>
	<div class="form-group">
		<input type="submit" name="" value="Tambah" class="btn btn-success">
	</div>

</form>