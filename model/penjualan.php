<?php
require_once('model.php');

class penjualan extends model{

	public function index(){
		$sql = $this->db->prepare("SELECT penjualan.id_penjualan, kasir.nama as kasir, penjualan.total, penjualan.tanggal FROM penjualan INNER JOIN kasir ON kasir.id_kasir = penjualan.id_kasir");
		$sql->execute();

		return $sql;
	}

	public function cari($dari, $sampai){
		$sql = $this->db->prepare("SELECT penjualan.id_penjualan, kasir.nama as kasir, penjualan.total, penjualan.tanggal FROM penjualan INNER JOIN kasir ON kasir.id_kasir = penjualan.id_kasir WHERE tanggal BETWEEN '$dari' AND '$sampai'");
		$sql->execute();

		return $sql;
	}

	public function jumlah(){
		$sql = $this->db->prepare("SELECT count(*) as jumlah FROM penjualan INNER JOIN kasir WHERE kasir.id_kasir = penjualan.id_kasir");
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function show($id_penjualan){
		$sql = $this->db->prepare("SELECT detail_penjualan.id_penjualan, buku.judul, kasir.nama, detail_penjualan.harga_jual, detail_penjualan.jumlah, detail_penjualan.total FROM detail_penjualan INNER JOIN buku INNER JOIN kasir WHERE buku.id_buku=detail_penjualan.id_buku AND detail_penjualan.id_kasir=kasir.id_kasir AND id_penjualan=?");
		$sql->bindParam(1, $id_penjualan);
		$sql->execute();

		return $sql;;
	}
}

$penjualan = new penjualan;
?>