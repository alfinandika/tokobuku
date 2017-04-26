<?php
$pencarian = '';
if(isset($_POST['pencarian'])){
	$pencarian = trim($_POST['pencarian']);
}

require_once('model/buku.php');
$list_buku = $buku->index($pencarian);
$jumlah_buku = $buku->jumlah();
$no = 1;

?>
<?php
if(isset($_GET['sukses'])){
	echo "<div class='alert alert-success'>";
	if($_GET['sukses'] == 'create'){
		echo "Buku Telah Berhasil Ditambahkan";
	}
	if($_GET['sukses'] == 'update'){
		echo "Buku Telah Berhasil Diupdate";
	}
	if($_GET['sukses'] == 'delete'){
		echo "Buku Telah Berhasil Dihapus";
	}
	echo "</div>";
}
?>


<div class="col-md-8">
		<form method="POST" action="index.php?page=buku">
			<div class="input-group">
				<input type="text" name="pencarian" class="form-control" placeholder="Masukkan Judul atau Nomor ISBN">
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit">Cari</button>
			</span>
			</div>
		</form>

</div>

<div class="pull-right">
	<a href="index.php?page=tambahbuku" class="btn btn-primary">Tambah Buku</a>
</div>
<br>
<br>
<div class="pull-left">
	<strong>Jumlah Buku : <?=$jumlah_buku['jumlah']; ?></strong>
</div>

<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Judul</th>
		<th>ISBN</th>
		<th>Penerbit</th>
		<th>Tahun</th>
		<th>Stock</th>
		<th>Harga Jual</th>
		<th>Diskon</th>
		<th>Action</th>
	</tr>
	<?php
	while($buku = $list_buku->fetch(PDO::FETCH_LAZY)) {
	?>
	<tr>
		<td><?=$no++?></td>
		<td><?=$buku['judul']?></td>
		<td><?=$buku['noisbn']?></td>
		<td><?=$buku['penerbit']?></td>
		<td><?=$buku['tahun']?></td>
		<td><?=$buku['stok']?></td>
		<td>Rp.<?=$buku['harga_jual']?></td>
		<td><?=$buku['diskon']?> %</td>
		<td>
			<a href="index.php?page=detailbuku&id=<?=$buku['id_buku']?>" class="btn btn-warning btn-sm">Detail</a>
			<?php
			if($_SESSION['level'] == 'operator' OR $_SESSION['level'] == 'admin'){
			?>
			<a data-id="<?=$buku['id_buku']?>" data-toggle="modal" href="#modaledit" id="buttonedit" class="btn btn-success btn-sm">Edit</a>
			<a data-id="<?=$buku['id_buku']?>" data-toggle="modal" href="#modalhapus" id="buttonhapus" class="btn btn-danger btn-sm">Hapus</a>
			<?php
			}
			?>
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
				<form method="POST" action="controller/bukucontroller.php?page=hapusbuku">
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
			$("#edit").load('view/buku/edit.php?id='+id);
		});
		$(document).on('click', '#buttonhapus', function(){
			var id = $(this).data('id');
			$("#idhapus").val(id);
		});
	});
</script>