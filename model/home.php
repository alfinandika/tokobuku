<?php
require_once('model.php');

class home extends model{

	public function penjualan(){
		$sql = $this->db->prepare("SELECT COUNT(*) as jumlah FROM penjualan");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function user(){
		$sql = $this->db->prepare("SELECT COUNT(*) as jumlah FROM kasir");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function buku(){
		$sql = $this->db->prepare("SELECT COUNT(*) as jumlah FROM buku");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function stok(){
		$sql = $this->db->prepare("SELECT SUM(stok) as jumlah FROM buku");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}
}
$info = new home;
?>