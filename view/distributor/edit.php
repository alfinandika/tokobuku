<?php
require_once('../../model/distributor.php');
$id_distributor = $_GET['id'];
$list = $distributor->edit($id_distributor);
?>
<form method="POST" action="controller/distributorcontroller.php?page=updatedistributor&id=<?=$list->id_distributor?>" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Distributor</label>
		<input type="text" name="nama_distributor" class="form-control" value="<?=$list->nama_distributor?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" value="<?=$list->alamat?>">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control" value="<?=$list->telepon?>">
	</div>
	<div class="form-group">
		<input type="submit" name="" value="Simpan Dsitributor" class="btn btn-success">
	</div>

</form>