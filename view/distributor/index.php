<?php
require_once('model/distributor.php');
$list_distributor = $distributor->index();
$jumlah_distributor = $distributor->jumlah();
$no = 1;
?>

<?php
if(isset($_GET['sukses'])){
	echo "<div class='alert alert-success'>";
	if($_GET['sukses'] == 'create'){
		echo "Distributor Telah Berhasil Ditambahkan";
	}
	if($_GET['sukses'] == 'update'){
		echo "Distributor Telah Berhasil Diupdate";
	}
	if($_GET['sukses'] == 'delete'){
		echo "Distributor Telah Berhasil Dihapus";
	}
	echo "</div>";
}
?>

<div class="pull-left">
	<a href="index.php?page=tambahdistributor" class="btn btn-primary">Tambah Distributor</a>
</div>
<br>
<br>
<div class="pull-left">
	<strong>Jumlah Distributor : <?=$jumlah_distributor['jumlah']; ?></strong>
</div>

<table class="table table-bordered">
	<tr>
		<th>ID Distributor</th>
		<th>Nama Distributor</th>
		<th>Alamat</th>
		<th>Telepon</th>
		<th>Action</th>
	</tr>
	<?php
	while($distributor = $list_distributor->fetch(PDO::FETCH_LAZY)){
	?>
	<tr>
		<td><?=$distributor['id_distributor']?></td>
		<td><?=$distributor['nama_distributor']?></td>
		<td><?=$distributor['alamat']?></td>
		<td><?=$distributor['telepon']?></td>
		<td>
			<a href="#modaledit" data-id="<?=$distributor['id_distributor']?>" id="buttonedit" data-toggle="modal" class="btn btn-success btn-sm">Edit</a>
			<a href="#modalhapus" data-id="<?=$distributor['id_distributor']?>" id="buttonhapus" data-toggle="modal" class="btn btn-danger btn-sm">Hapus</a>
		</td>
	</tr>
	<?php } ?>
</table>

<div id="modaledit" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Edit Buku
			</div>
			<div id="edit" class="modal-body">
				
			</div>
		</div>
	</div>
</div>

<div id="modalhapus" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Apakah Anda Yakin Ingin Menghapus Ini?
			</div>
			<div id="hapus" class="modal-body" align="center">
				<form method="POST" action="controller/distributorcontroller.php?page=hapusdistributor">
					<input type="hidden" name="id" id="idhapus" value="">
					<a class="btn btn-primary" data-dismiss="modal">Tidak</a>
					<input type="submit" value="YA" class="btn btn-danger">
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$(document).on('click', '#buttonedit' ,function(){
			var id = $(this).data('id');
			$("#edit").load('view/distributor/edit.php?id='+id);
		});
		$(document).on('click', '#buttonhapus', function(){
			var id = $(this).data('id');
			$("#idhapus").val(id);
		});
	});
</script>