<?php
require_once('../../model/pasok.php');
$id_pasok = $_GET['id'];

$listpasok = $pasok->edit($id_pasok);
$list_distributor = $pasok->distributor();
$list_buku = $pasok->buku();
?>

<form method="POST" action="controller/pasokcontroller.php?page=update&id=<?=$id_pasok?>" enctype="multipart/form-data">
	<div class="form-group">
		<label>Distributor</label>
		<select name="id_distributor" class="form-control">
		<?php
		while ($distributor = $list_distributor->fetch(PDO::FETCH_LAZY)) {
		?>
			<option
			<?php
			if($listpasok['id_distributor'] == $distributor['id_distributor']){
				echo 'selected';
			}?>
			 value="<?=$distributor['id_distributor']?>"><?=$distributor['nama_distributor']?></option>
		<?php } ?>
		</select>
		
	</div>
	<div class="form-group">
		<label>Buku</label>
		<select name="id_buku" class="form-control">
		<?php
		while ($buku = $list_buku->fetch(PDO::FETCH_LAZY)) {
		?>
			<option <?php
			if($listpasok['id_buku'] == $buku['id_buku']){
				echo 'selected';
			}
			?> value="<?=$buku['id_buku']?>"><?=$buku['judul']?></option>
		<?php } ?>
		</select>
		
	</div>
	<div class="form-group">
		<label>Jumlah</label>
		<input type="number" name="jumlah" class="form-control" value="<?=$listpasok['jumlah']?>">
	</div>
	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" name="tanggal" class="form-control" value="<?=$listpasok['tanggal']?>">
	</div>
	<div class="form-group">
		<input type="submit" name="" value="Tambah" class="btn btn-success">
	</div>

</form>