<?php
require_once('model.php');

class pasok extends model{

	public function index(){
		$sql = $this->db->prepare("SELECT pasok.id_pasok as id_pasok, pasok.jumlah as jumlah, pasok.tanggal as tanggal, distributor.nama_distributor as nama_distributor, buku.judul as judul_buku FROM pasok INNER JOIN distributor INNER JOIN buku WHERE distributor.id_distributor = pasok.id_distributor AND pasok.id_buku = buku.id_buku");
		$sql->execute();

		return $sql;
	}

	public function store($id_distributor, $id_buku, $jumlah, $tanggal){
		$sql = $this->db->prepare("INSERT INTO pasok(id_distributor, id_buku, jumlah, tanggal) VALUES (?, ?, ?, ?)");
		$sql->bindParam(1, $id_distributor);
		$sql->bindParam(2, $id_buku);
		$sql->bindParam(3, $jumlah);
		$sql->bindParam(4, $tanggal);
		$sql->execute();

		return $sql;
	}

	public function tambah_stok($jumlah, $id_buku){
		$sql = $this->db->prepare("UPDATE buku SET stok=stok+? WHERE id_buku=?");
		$sql->bindParam(1, $jumlah);
		$sql->bindParam(2, $id_buku);
		$sql->execute();

		return $sql;
	}

	public function edit($id_pasok){
		$sql = $this->db->prepare("SELECT * FROM pasok WHERE id_pasok=?");
		$sql->bindParam(1, $id_pasok);
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function update($id_distributor, $id_buku, $jumlah, $tanggal, $id_pasok){
		$sql = $this->db->prepare("UPDATE pasok SET id_distributor=?, id_buku=?, jumlah=?, tanggal=? WHERE id_pasok=?");
		$sql->bindParam(1, $id_distributor);
		$sql->bindParam(2, $id_buku);
		$sql->bindParam(3, $jumlah);
		$sql->bindParam(4, $tanggal);
		$sql->bindParam(5, $id_pasok);
		$sql->execute();

		return $sql;
	}

	public function delete($id_pasok){
		$sql = $this->db->prepare("DELETE FROM pasok WHERE id_pasok=?");
		$sql->bindParam(1, $id_pasok);
		$sql->execute();

		return $sql;
	}

	public function jumlah (){
		$sql = $this->db->prepare("SELECT COUNT(*) as jumlah FROM pasok");
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function distributor (){

		$sql = $this->db->prepare('SELECT * FROM distributor');
		$sql->execute();

		return $sql;
	
	}
	public function buku (){

		$sql = $this->db->prepare('SELECT * FROM buku');
		$sql->execute();

		return $sql;
	
	}
}
$pasok = new pasok;
?>