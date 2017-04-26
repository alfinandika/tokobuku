<?php
require_once('model/kasir.php');
$list_kasir = $kasir->index();
?>

<?php
if(isset($_GET['sukses'])){
	echo "<div class='alert alert-success'>";
	if($_GET['sukses'] == 'create'){
		echo "User Telah Berhasil Ditambahkan";
	}
	if($_GET['sukses'] == 'update'){
		echo "User Telah Berhasil Diupdate";
	}
	if($_GET['sukses'] == 'aktifkan'){
		echo "User Telah Berhasil Diaktifkan";
	}
	if($_GET['sukses'] == 'nonaktif'){
		echo "User Telah Berhasil Dinonaktifkan";
	}
	echo "</div>";
}
?>

<p>
	<a href="index.php?page=tambahkasir" class="btn btn-primary">Tambah User</a>
</p>
<table class="table table-bordered">
	<tr>
		<th>ID Kasir</th>
		<th>Nama</th>
		<th>Status</th>
		<th>Username</th>
		<th>Password</th>
		<th>Akses</th>
		<th>Action</th>
	</tr>
	<?php
	while($kasir = $list_kasir->fetch(PDO::FETCH_LAZY)){
	?>
	<tr>
		<td><?=$kasir['id_kasir']?></td>
		<td><?=$kasir['nama']?></td>
		<td>
			<?php
			if($kasir['status'] == 1){
				echo 'Aktif';
			}else{
				echo "Tidak Aktif";
			}
			?>
		</td>
		<td><?=$kasir['username']?></td>
		<td>*****</td>
		<td><?=$kasir['akses']?></td>
		<td>
			<a href="index.php?page=detailkasir&id=<?=$kasir['id_kasir']?>" class="btn btn-warning btn-sm">Detail</a>
			<a href="#modaledit" data-id="<?=$kasir['id_kasir']?>" data-toggle="modal" id="buttonedit" class="btn btn-success btn-sm">Edit</a>
			<?php
			if($kasir['status'] == '1'){
			echo '<a href="#modalnonaktif" data-toggle="modal" id="buttonnonaktif" data-id="'.$kasir['id_kasir'].'" class="btn btn-danger btn-sm">Nonaktifkan</a>';
			}else{
			echo '<a href="#modalaktifkan" data-toggle="modal" id="buttonaktifkan" data-id="'.$kasir['id_kasir'].'" class="btn btn-primary btn-sm">Aktifkan</a>';
			}
			?>
		</td>
	</tr>
	<?php
}
	?>
</table>

<div id="modaledit" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Edit Kasir
			</div>
			<div id="edit" class="modal-body">
				
			</div>
		</div>
	</div>
</div>

<div id="modalnonaktif" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Apakah Anda Yakin Ingin Menonaktifkan User Ini?
			</div>
			<div id="hapus" class="modal-body" align="center">
				<form method="POST" action="controller/kasircontroller.php?page=nonaktif">
					<input type="hidden" name="id" id="idnonaktif" value="">
					<a class="btn btn-primary" data-dismiss="modal">TIDAK</a>
					<input type="submit" value="YA" class="btn btn-danger">
				</form>
			</div>
		</div>
	</div>
</div>

<div id="modalaktifkan" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Apakah Anda Yakin Ingin Mengaktifkan User Ini?
			</div>
			<div id="hapus" class="modal-body" align="center">
				<form method="POST" action="controller/kasircontroller.php?page=aktifkan">
					<input type="hidden" name="id" id="idaktifkan" value="">
					<a class="btn btn-primary" data-dismiss="modal">TIDAK</a>
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
			$("#edit").load('view/kasir/edit.php?id='+id);
		});
		$(document).on('click', '#buttonnonaktif', function(){
			var id = $(this).data('id');
			$("#idnonaktif").val(id);
		});
		$(document).on('click', '#buttonaktifkan', function(){
			var id = $(this).data('id');
			$("#idaktifkan").val(id);
		});
	});
</script>