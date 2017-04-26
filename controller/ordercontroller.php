<?php
require_once('../model/order.php');
session_start();
$id_kasir = $_SESSION['id_kasir'];
$page = $_GET['page'];




if($_GET['page'] == 'add'){
	$id_buku = $_GET['id_buku'];
	$cek = $order->cek_addcart($id_kasir,$id_buku);
	if($cek['jumlah'] == 0 ){
		$order->barangbelumada($id_kasir, $id_buku);
	}else{
		$order->barangada($id_kasir, $id_buku);
	}
	header('location: ../index.php?page=order');
}
if($_GET['page'] == 'kurang'){
		session_start();
		$id_buku = $_GET['id_buku'];
		$id_kasir = $_SESSION['id_kasir'];
		$order->kurang($id_kasir, $id_buku);

		header('location: ../index.php?page=cart');

	}

if($_GET['page'] == 'tambah'){
		session_start();
		$id_buku = $_GET['id_buku'];
		$id_kasir = $_SESSION['id_kasir'];
		$order->tambah($id_kasir, $id_buku);

		header('location: ../index.php?page=cart');

	}
if($_GET['page'] == 'delete_all'){
	session_start();
	$id_kasir = $_SESSION['id_kasir'];
	$order->delete_all($id_kasir);

	header('location: ../index.php?page=cart');
}

if($_GET['page'] == 'selesai'){
	$isi_keranjang = $order->isi_keranjang($id_kasir);
	$jumlah = count($isi_keranjang);
	$total = $_GET['total'];

	//insert di table penjualan
	$order->tambah_penjualan($id_kasir, $total);

	//mendapat id_penjualan terakhir
	$penjualan = $order->id_penjualan($id_kasir);
	$id_penjualan = $penjualan['id_penjualan'];

	//menyimpan di table detail_penjualan
	for ($i=0; $i < $jumlah; $i++) { 
		$order->simpan_detail($isi_keranjang, $i, $id_penjualan, $id_kasir); 
	}

	//mengurangi stok buku yang di order
	for($i=0; $i < $jumlah; $i++){
		$order->kurang_stock($isi_keranjang, $i);
	}

	$order->delete_all($id_kasir);

	header('location: ../index.php?page=selesai&id_penjualan='.$id_penjualan);
	
}
if($_GET['page'] == 'delete'){
	$id_buku = $_GET['id_buku'];
	$order->delete($id_kasir, $id_buku);

	header('location: ../index.php?page=cart');	
}
?>