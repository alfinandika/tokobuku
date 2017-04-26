<?php
require_once('model/order.php');

$id_kasir = $_SESSION['id_kasir'];

$list_cart = $order->cart($id_kasir);

$total = 0;
?>
<a href="controller/ordercontroller.php?page=delete_all" class="btn btn-danger">Delete All</a>
<table class="table table-bordered">
	<tr>
		<th>Judul Buku</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>Sub Total</th>
		<th>Action</th>
	</tr>
	<?php
	while($cart = $list_cart->fetch(PDO::FETCH_LAZY)){

		 $total += $cart['total'];
	?>
	<tr>
		<td><?=$cart['judul']?></td>
		<td><?=$cart['harga_jual']?></td>
		<td><a href="controller/ordercontroller.php?page=kurang&id_buku=<?=$cart['id_buku']?>" class="btn btn-danger">-</a><?=$cart['jumlah']?><a href="controller/ordercontroller.php?page=tambah&id_buku=<?=$cart['id_buku']?>" class="btn btn-success">+</a></td>
		<td>Rp.<?=$cart['total']?>,-</td>
		<td><a href="controller/ordercontroller.php?page=delete&id_buku=<?=$cart['id_buku']?>" class="btn btn-danger btn-sm">Delete</a></td>
	</tr>
	
	<?php
	}
	?>
	<tr>
		<td colspan="5"><div class="pull-right"><h4>Total Belanja Rp.<?=$total?>,-</h4></div></td>
	</tr>
</table>
<div class="pull-right"><a href="controller/ordercontroller.php?page=selesai&total=<?=$total?>" class="btn btn-primary">Selesai</a></div>
