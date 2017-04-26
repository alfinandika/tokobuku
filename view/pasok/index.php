<?php
require_once('model/pasok.php');
$list_pasok = $pasok->index();
$jumlah_pasok = $pasok->jumlah();
?>

<?php
if(isset($_GET['sukses'])){
	echo "<div class='alert alert-success'>";
	if($_GET['sukses'] == 'create'){
		echo "Pemasok Telah Berhasil Ditambahkan";
	}
	if($_GET['sukses'] == 'update'){
		echo "Pemasok Telah Berhasil Diupdate";
	}
	if($_GET['sukses'] == 'delete'){
		echo "Pemasok Telah Berhasil Dihapus";
	}
	echo "</div>";
}
?>

<div class="pull-left">
	<a href="index.php?page=tambahpasok" class="btn btn-primary">Tambah Pemasok</a>
</div>
<br>
<br>
<div class="pull-left">
	<strong>Jumlah Buku : <?=$jumlah_pasok['jumlah']; ?></strong>
</div>

<table class="table table-bordered">
	<tr>
		<th>ID Pasok</th>
		<th>Distributor</th>
		<th>Buku</th>
		<th>Jumlah</th>
		<th>Tanggal</th>
		<th>Action</th>
	</tr>
	<?php
	while($pasok = $list_pasok->fetch(PDO::FETCH_LAZY)) {
	?>
	<tr>
		<td><?=$pasok['id_pasok']?></td>
		<td><?=$pasok['nama_distributor']?></td>
		<td><?=$pasok['judul_buku']?></td>
		<td><?=$pasok['jumlah']?></td>
		<td><?=$pasok['tanggal']?></td>
		<td>
			<a href="#modaledit" data-id="<?=$pasok['id_pasok']?>" id="buttonedit" data-toggle="modal" class="btn btn-success btn-sm">Edit</a>
			<a href="#modalhapus" data-id="<?=$pasok['id_pasok']?>" id="buttonhapus" data-toggle="modal" class="btn btn-danger btn-sm">Hapus</a>
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
				<form method="POST" action="controller/pasokcontroller.php?page=hapus">
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
			$("#edit").load('view/pasok/edit.php?id='+id);
		});
		$(document).on('click', '#buttonhapus', function(){
			var id = $(this).data('id');
			$("#idhapus").val(id);
		});
	});
</script>