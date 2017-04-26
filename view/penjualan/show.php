<?php
require_once('model/penjualan.php');

$id_kasir = $_SESSION['id_kasir'];

$id_penjualan = $_GET['id_penjualan'];
$list_penjualan = $penjualan->show($id_penjualan);

$total = 0;
?>
<h2 align="center">Detail Penjualan</h2>
<table class="table table-bordered">
	<tr>
		<th>Judul Buku</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>Sub Total</th>
	</tr>
	<?php
	while($cart = $list_penjualan->fetch(PDO::FETCH_LAZY)){

		 $total += $cart['total'];
	?>
	<tr>
		<td><?=$cart['judul']?></td>
		<td><?=$cart['harga_jual']?></td>
		<td><?=$cart['jumlah']?></td>
		<td>Rp.<?=$cart['total']?>,-</td>
	</tr>
	
	<?php
	}
	?>
	<tr>
		<td colspan="5"><div class="pull-right"><h4>Total Belanja Rp.<?=$total?>,-</h4></div></td>
	</tr>
</table>
<div class="pull-right">
	<a id="print" class="btn btn-primary">Print</a>
</div>
<script type="text/javascript">
	$("#print").click(function(){
		window.print();
	});
</script>