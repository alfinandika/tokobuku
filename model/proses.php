<?php
require_once('buku.php');

	if($_GET['page'] == 'tambahbuku'){
		$judul = $_POST['judul'];
		$noisbn = $_POST['noisbn'];
		$penulis = $_POST['penulis'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$stok = $_POST['stok'];
		$harga_pokok = $_POST['harga_pokok'];
		$harga_jual = $_POST['harga_jual'];
		$ppn = $_POST['ppn'];
		$diskon = $_POST['diskon'];

		$buku->store($judul, $noisbn, $penulis, $penerbit, $tahun, $stok, $harga_pokok, $harga_jual, $ppn, $diskon);
		header('location: ../index.php?page=buku');
	}
	if($_GET['page'] == 'updatebuku'){
		$judul = $_POST['judul'];
		$noisbn = $_POST['noisbn'];
		$penulis = $_POST['penulis'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$stok = $_POST['stok'];
		$harga_pokok = $_POST['harga_pokok'];
		$harga_jual = $_POST['harga_jual'];
		$ppn = $_POST['ppn'];
		$diskon = $_POST['diskon'];
		$id_buku = $_GET['id'];

		$buku->update($judul, $noisbn, $penulis, $penerbit, $tahun, $stok, $harga_pokok, $harga_jual, $ppn, $diskon, $id_buku);
		header('location: ../index.php?page=buku');
	}
	if($_GET['page'] == 'hapusbuku'){
		$id_buku = $_GET['id'];
		$buku->delete($id_buku);
		header('location: ../index.php?page=buku');
	}

?>