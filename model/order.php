<?php
require_once('model.php');

class order extends model {

	public function produk($pencarian){
		$sql = $this->db->prepare("SELECT * FROM buku WHERE judul LIKE '%$pencarian%' OR noisbn LIKE '%$pencarian%'");
		//$sql->bindParam(1, $pencarian);
		$sql->execute();
		return $sql;
	}

	public function cart($id_kasir){
		$sql = $this->db->prepare("SELECT keranjang.id_buku, buku.judul, buku.harga_jual, keranjang.jumlah, (buku.harga_jual * keranjang.jumlah) as total FROM buku INNER JOIN keranjang WHERE buku.id_buku = keranjang.id_buku AND id_kasir=?");
		$sql->bindParam(1, $id_kasir);
		$sql->execute();
		return $sql;
	}

	public function isi_keranjang($id_kasir){
		$isi_keranjang =  array();
		$sql = $this->db->prepare("SELECT keranjang.id_kasir, keranjang.id_buku,keranjang.jumlah, buku.harga_jual FROM keranjang INNER JOIN buku WHERE id_kasir=? AND keranjang.id_buku = buku.id_buku");
		$sql->bindParam(1, $id_kasir);
		$sql->execute();

		while ($r = $sql->fetch(PDO::FETCH_ASSOC)) {
			$isi_keranjang[] = $r;
		}

		return $isi_keranjang;
	}

	public function simpan_detail($isi_keranjang, $i, $id_penjualan, $id_kasir){
		$sql = $this->db->prepare("INSERT INTO detail_penjualan (id_penjualan, id_kasir, id_buku, harga_jual, jumlah, total) VALUES(?,?,{$isi_keranjang[$i]['id_buku']},{$isi_keranjang[$i]['harga_jual']}, {$isi_keranjang[$i]['jumlah']}, {$isi_keranjang[$i]['harga_jual']} * {$isi_keranjang[$i]['jumlah']})");
		$sql->bindParam(1, $id_penjualan);
		$sql->bindParam(2, $id_kasir);
		$sql->execute();

		return $sql;
	}

	public function kurang_stock($isi_keranjang, $i){
		$sql = $this->db->prepare("UPDATE buku SET stok=stok-{$isi_keranjang[$i]['jumlah']} WHERE id_buku={$isi_keranjang[$i]['id_buku']}");
		$sql->execute();

		return $sql;
	}

	public function jumlahorder($id_kasir){
		$sql = $this->db->prepare("SELECT COUNT(*) as jumlah FROM keranjang WHERE id_kasir=?");
		$sql->bindParam(1, $id_kasir);
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_LAZY);
		return $row;
	}

	public function cek_addcart($id_kasir, $id_buku){
		$sql = $this->db->prepare("SELECT COUNT(*) as jumlah FROM keranjang WHERE id_buku=? AND id_kasir=?");
		$sql->bindParam(1, $id_buku);
		$sql->bindParam(2, $id_kasir);
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_LAZY);
		return $row;
	}

	public function barangbelumada($id_kasir, $id_buku){
		$sql = $this->db->prepare("INSERT INTO keranjang(id_kasir, id_buku, jumlah) VALUES (?,?,1)");
		$sql->bindParam(1, $id_kasir);
		$sql->bindParam(2, $id_buku);
		$sql->execute();
	}

	public function barangada($id_kasir, $id_buku){
		$sql = $this->db->prepare("UPDATE keranjang SET jumlah = jumlah +1 WHERE id_kasir=? AND id_buku=?");
		$sql->bindParam(1, $id_kasir);
		$sql->bindParam(2, $id_buku);
		$sql->execute();

		return $sql;
	}

	public function kurang($id_kasir,$id_buku){
		$sql = $this->db->prepare("UPDATE keranjang set jumlah= jumlah-1 WHERE id_kasir=? AND id_buku=? ");
		$sql->bindParam(1, $id_kasir);
		$sql->bindParam(2, $id_buku);
		$sql->execute();

		return $sql;
	}

	public function tambah($id_kasir,$id_buku){
		$sql = $this->db->prepare("UPDATE keranjang set jumlah= jumlah+1 WHERE id_kasir=? AND id_buku=? ");
		$sql->bindParam(1, $id_kasir);
		$sql->bindParam(2, $id_buku);
		$sql->execute();

		return $sql;
	}
	public function delete_all($id_kasir){
		$sql = $this->db->prepare("DELETE FROM keranjang WHERE id_kasir=?");
		$sql->bindParam(1, $id_kasir);
		$sql->execute();

		return $sql;
	}

	public function delete($id_kasir, $id_buku){
		$sql = $this->db->prepare("DELETE FROM keranjang WHERE id_kasir=? AND id_buku=?");
		$sql->bindParam(1, $id_kasir);
		$sql->bindParam(2, $id_buku);
		$sql->execute();

		return $sql;
	}

	public function tambah_penjualan($id_kasir, $total){
		$tanggal = date('Y-m-d');
		$sql = $this->db->prepare("INSERT INTO penjualan (id_kasir, tanggal, total) VALUES (?, ?, ?)");
		$sql->bindParam(1, $id_kasir);
		$sql->bindParam(2, $tanggal);
		$sql->bindParam(3, $total);
		$sql->execute();

		return $sql;
	}
	
	public function id_penjualan($id_kasir){
		$sql = $this->db->prepare("SELECT * FROM penjualan WHERE id_kasir=? ORDER BY id_penjualan DESC LIMIT 1");
		$sql->bindParam(1, $id_kasir);
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_LAZY);
		return $row;
	}

	public function edit_id_penjualan(){
		$sql = $this->db->prepare("UPDATE detail_penjualan SET id_penjualan=?");
		$sql->bindParam(1, $id_kasir);
		$sql->execute();
	}


}
$order = new order;
?>