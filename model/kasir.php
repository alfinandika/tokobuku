<?php
require_once('model.php');

class kasir extends model {

	public function index(){
		$sql = $this->db->prepare("SELECT * FROM kasir");
		$sql->execute();

		return $sql;
	}

	public function store($nama, $alamat, $telepon, $status, $username, $password, $akses){
		$sql = $this->db->prepare("INSERT INTO kasir(nama, alamat, telepon, status, username, password, akses) VALUES (?,?,?,?,?,?,?)");
		$sql->bindParam(1,$nama);
		$sql->bindParam(2,$alamat);
		$sql->bindParam(3,$telepon);
		$sql->bindParam(4,$status);
		$sql->bindParam(5,$username);
		$sql->bindParam(6,$password);
		$sql->bindParam(7,$akses);

		$sql->execute();

		return $sql;

	}

	public function nonaktif($id_kasir){
		$sql = $this->db->prepare("UPDATE kasir SET status=0 WHERE id_kasir=?");
		$sql->bindParam(1, $id_kasir);
		$sql->execute();

		return $sql;
	}

	public function aktifkan($id_kasir){
		$sql = $this->db->prepare("UPDATE kasir SET status=1 WHERE id_kasir=?");
		$sql->bindParam(1, $id_kasir);
		$sql->execute();

		return $sql;
	}

	public function edit($id_kasir){
		$sql = $this->db->prepare("SELECT * FROM kasir WHERE id_kasir=?");
		$sql->bindParam(1, $id_kasir);
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}
	public function update($nama, $alamat, $telepon, $status, $username, $password, $akses, $id_kasir){
		$sql = $this->db->prepare("UPDATE kasir SET nama=?, alamat=?, telepon=?, status=?, username=?, password=?, akses=? WHERE id_kasir=?");
		$sql->bindParam(1,$nama);
		$sql->bindParam(2,$alamat);
		$sql->bindParam(3,$telepon);
		$sql->bindParam(4,$status);
		$sql->bindParam(5,$username);
		$sql->bindParam(6,$password);
		$sql->bindParam(7,$akses);
		$sql->bindParam(8,$id_kasir);

		$sql->execute();

		return $sql;
	}

	public function update_no_pass($nama, $alamat, $telepon, $status, $username, $akses, $id_kasir){
		$sql = $this->db->prepare("UPDATE kasir SET nama=?, alamat=?, telepon=?, status=?, username=?, akses=? WHERE id_kasir=?");
		$sql->bindParam(1,$nama);
		$sql->bindParam(2,$alamat);
		$sql->bindParam(3,$telepon);
		$sql->bindParam(4,$status);
		$sql->bindParam(5,$username);
		$sql->bindParam(6,$akses);
		$sql->bindParam(7,$id_kasir);

		$sql->execute();

		return $sql;
	}

	public function show ($id_kasir){
		$sql = $this->db->prepare("SELECT * FROM kasir WHERE id_kasir=?");
		$sql->bindParam(1, $id_kasir);
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_LAZY);
		return $row;
	}
}
$kasir = new kasir;
?>