<?php
require_once('../model/pasok.php');

if(isset($_GET['page'])){

	if($_GET['page'] == 'create'){
		$id_distributor = $_POST['id_distributor'];
		$id_buku = $_POST['id_buku'];
		$jumlah = $_POST['jumlah'];
		$tanggal = $_POST['tanggal'];

		$pasok->store($id_distributor, $id_buku, $jumlah, $tanggal);
		$pasok->tambah_stok($jumlah, $id_buku);
		header('location: ../index.php?page=pemasok&sukses=create');
	}

	if($_GET['page'] == 'hapus'){
		$id_pasok = $_POST['id'];
		$pasok->delete($id_pasok);

		header('location: ../index.php?page=pemasok&sukses=delete');
	}

	if($_GET['page'] == 'update'){
		$id_distributor = $_POST['id_distributor'];
		$id_buku = $_POST['id_buku'];
		$jumlah = $_POST['jumlah'];
		$tanggal = $_POST['tanggal'];
		$id_pasok = $_GET['id'];

		$pasok->update($id_distributor, $id_buku, $jumlah, $tanggal, $id_pasok);
		header('location: ../index.php?page=pemasok&sukses=update');
	}
}
?>