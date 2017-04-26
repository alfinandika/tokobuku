<?php
require_once('model.php');

class buku extends model{

	 public function index($pencarian){
		$sql = $this->db->prepare("SELECT * FROM buku WHERE judul LIKE '%$pencarian%' OR noisbn LIKE '%$pencarian%'");
		//$sql->bindParam(1, $pencarian);
		$sql->execute();
		return $sql;
	}

	public function store($judul, $noisbn, $penulis, $penerbit, $tahun, $stok, $harga_pokok, $keuntungan, $harga_jual, $ppn, $diskon, $foto_upload){
		$sql = $this->db->prepare("INSERT INTO buku(judul, noisbn, penulis, penerbit, tahun, stok, harga_pokok, keuntungan, harga_jual, ppn, diskon, foto) VALUES (?, ?, ?, ? ,? ,? ,? ,? ,? ,?, ?,?)");
		$sql->bindParam(1, $judul);
		$sql->bindParam(2, $noisbn);
		$sql->bindParam(3, $penulis);
		$sql->bindParam(4, $penerbit);
		$sql->bindParam(5, $tahun);
		$sql->bindParam(6, $stok);
		$sql->bindParam(7, $harga_pokok);
		$sql->bindParam(8, $keuntungan);
		$sql->bindParam(9, $harga_jual);
		$sql->bindParam(10, $ppn);
		$sql->bindParam(11, $diskon);
		$sql->bindParam(12, $foto_upload);

		$sql->execute();

		return $sql;

	}

	public function show($id_buku){
		$sql = $this->db->prepare("SELECT * FROM buku WHERE id_buku=?");
		$sql->bindParam(1, $id_buku);
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function edit($id_buku){
		$sql = $this->db->prepare('SELECT * FROM buku WHERE id_buku=?');
		$sql->bindParam(1, $id_buku);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function update($judul, $noisbn, $penulis, $penerbit, $tahun, $stok, $harga_pokok, $keuntungan, $harga_jual, $ppn, $diskon, $foto_upload, $id_buku){

		$sql = $this->db->prepare("UPDATE buku set judul=?, noisbn=?, penulis=?, penerbit=?, tahun=?, stok=?, harga_pokok=?, keuntungan=?, harga_jual=?, ppn=?, diskon=?, foto=? WHERE id_buku=?");
		$sql->bindParam(1, $judul);
		$sql->bindParam(2, $noisbn);
		$sql->bindParam(3, $penulis);
		$sql->bindParam(4, $penerbit);
		$sql->bindParam(5, $tahun);
		$sql->bindParam(6, $stok);
		$sql->bindParam(7, $harga_pokok);
		$sql->bindParam(8, $keuntungan);
		$sql->bindParam(9, $harga_jual);
		$sql->bindParam(10, $ppn);
		$sql->bindParam(11, $diskon);
		$sql->bindParam(12, $foto_upload);
		$sql->bindParam(13, $id_buku);

		$sql->execute();

		return $sql;
	}

	public function delete($id_buku){
		$sql = $this->db->prepare("DELETE FROM buku WHERE id_buku=?");
		$sql->bindParam(1, $id_buku);
		$sql->execute();

		return $sql;

	}

	public function jumlah (){
		$sql = $this->db->prepare("SELECT COUNT(*) as jumlah FROM buku");
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_LAZY);

		return $row;
	}

	public function kurang($id_buku){
		$sql = $this->db->prepare("UPDATE keranjang set jumlah= jumlah-1");
	}

}
$buku = new buku;

?>