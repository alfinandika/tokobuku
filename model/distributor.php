<?php
require_once('model.php');
class distributor extends model {

	public function index(){
		$sql = $this->db->prepare("SELECT * FROM distributor");
		$sql->execute();

		return $sql;
	}

	public function store($nama_distributor, $alamat, $telepon){
		$sql = $this->db->prepare("INSERT INTO distributor(nama_distributor, alamat, telepon) VALUES(?, ?, ?)");
		$sql->bindParam(1, $nama_distributor);
		$sql->bindParam(2, $alamat);
		$sql->bindParam(3, $telepon);
		$sql->execute();

		return $sql;

	}

	public function jumlah (){
		$sql = $this->db->prepare("SELECT COUNT(*) as jumlah FROM distributor");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function edit($id_distributor){
		$sql = $this->db->prepare('SELECT * FROM distributor WHERE id_distributor=?');
		$sql->bindParam(1, $id_distributor);
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function update($nama_distributor, $alamat, $telepon, $id_distributor){
		$sql = $this->db->prepare("UPDATE distributor SET nama_distributor=?, alamat=?, telepon=? WHERE id_distributor=?");
		$sql->bindParam(1, $nama_distributor);
		$sql->bindParam(2, $alamat);
		$sql->bindParam(3, $telepon);
		$sql->bindParam(4, $id_distributor);
		$sql->execute();

		return $sql;
	}

	public function delete($id_distributor){
		$sql = $this->db->prepare("DELETE FROM distributor WHERE id_distributor=?");
		$sql->bindParam(1, $id_distributor);
		$sql->execute();

		return $sql;
	}
}

$distributor = new distributor;
?>