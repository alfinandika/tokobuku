<?php
require_once('model/penjualan.php');
if(isset($_GET['cari'])){
	$dari = $_POST['dari'];
	$sampai = $_POST['sampai'];
	$list_penjualan = $penjualan->cari($dari, $sampai);
}else{
	$list_penjualan = $penjualan->index();
}

$jumlah = $penjualan->jumlah();
?>

<?php
if(isset($_GET['cari'])){
?>
<div class="pull-left">
	Jumlah Penjualan : <?=$jumlah['jumlah']?> <br>
	<h4>Hasil Pencarian Dari Tanggal <?=$dari?> Sampai Tanggal <?=$sampai?></h4>
</div>
<?php
}
?>

<div class="pull-right">
	<a data-toggle="modal" href="#modalcari" class="btn btn-primary">Pencarian</a>
</div>

<p>
	

</p>

<table class="table table-bordered">
	<tr>
		<th>ID Penjualan</th>
		<th>Kasir</th>
		<th>Total</th>
		<th>Tanggal</th>
		<th>Action</th>
	</tr>
	<?php
	while($penjualan = $list_penjualan->fetch(PDO::FETCH_LAZY)){
	?>
	<tr>
		<td><?=$penjualan['id_penjualan']?></td>
		<td><?=$penjualan['kasir']?></td>
		<td>Rp.<?=$penjualan['total']?>,-</td>
		<td><?=$penjualan['tanggal']?></td>
		<td><a href="index.php?page=detail_penjualan&id_penjualan=<?=$penjualan['id_penjualan']?>" class="btn btn-warning btn-sm">Detail</a></td>
	</tr>
	<?php
		}
	?>
</table>
<div id="modalcari" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Pencarian Data
			</div>
			<div id="edit" class="modal-body">
				<form method="POST" action="index.php?page=penjualan&cari=1">
					<div class="form-group">
						<label>Dari :</label>
						<input type="date" class="form-control" name="dari">
					</div>
					<div class="form-group">
						<label>Sampai :</label>
						<input type="date" class="form-control" name="sampai">
					</div>
					<input type="submit" class="btn btn-primary" value="CARI">
					
				</form>
			</div>
		</div>
	</div>
</div>