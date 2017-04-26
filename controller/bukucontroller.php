<?php
require_once('../model/buku.php');

	if($_GET['page'] == 'tambahbuku'){
		$judul = $_POST['judul'];
		$noisbn = $_POST['noisbn'];
		$penulis = $_POST['penulis'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$stok = $_POST['stok'];
		$harga_pokok = $_POST['harga_pokok'];
		$keuntungan = $_POST['keuntungan'];
		$harga_jual = $_POST['harga_jual'];
		$ppn = $_POST['ppn'];
		$diskon = $_POST['diskon'];

		//menangani upload foto
		$list_ext = ['jpg', 'png'];
		$nama_foto = $_FILES['foto']['name'];
		$pecah = explode('.', $nama_foto);
		$ext = $pecah[1];

		//mengatasi duplikasi nama file
		$random = rand(1000000000000000, 9999999999999999);

		$lokasi_upload = '../foto/';
		$foto_upload = $random.$nama_foto;
		$path = $lokasi_upload.$foto_upload;

		if(in_array($ext, $list_ext)){
			$lokasi_awal = $_FILES['foto']['tmp_name'];
			move_uploaded_file($lokasi_awal, $path);
		}else{
			header('location: ../index.php?page=tambahbuku&status=ext');
		}
		//end menangani upload foto :)

		$buku->store($judul, $noisbn, $penulis, $penerbit, $tahun, $stok, $harga_pokok, $keuntungan, $harga_jual, $ppn, $diskon, $foto_upload);
		header('location: ../index.php?page=buku&sukses=create');

	}
	if($_GET['page'] == 'updatebuku'){
		$judul = $_POST['judul'];
		$noisbn = $_POST['noisbn'];
		$penulis = $_POST['penulis'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$stok = $_POST['stok'];
		$harga_pokok = $_POST['harga_pokok'];
		$keuntungan = $_POST['keuntungan'];
		$harga_jual = $_POST['harga_jual'];
		$ppn = $_POST['ppn'];
		$diskon = $_POST['diskon'];
		$id_buku = $_GET['id'];

		$foto_terdahulu = $buku->edit($id_buku);

		//menangani upload foto
		$list_ext = ['jpg', 'png'];
		$nama_foto = $_FILES['foto']['name'];
		$pecah = explode('.', $nama_foto);
		$ext = $pecah[1];

		//mengatasi duplikasi nama file
		$random = rand(1000000000000000, 9999999999999999);

		$lokasi_upload = '../foto/';
		$foto_upload = $random.$nama_foto;
		$path = $lokasi_upload.$foto_upload;

		if(in_array($ext, $list_ext)){


			//cek dan hapus foto terdahulu
			if(!empty($foto_terdahulu)){
				unlink($lokasi_upload.$foto_terdahulu['foto']);
			}

			$lokasi_awal = $_FILES['foto']['tmp_name'];
			move_uploaded_file($lokasi_awal, $path);
		}else{
			header('location: ../index.php?page=editbuku&id'.$id_buku.'&status=ext');
		}
		//end menangani upload foto :)

		$buku->update($judul, $noisbn, $penulis, $penerbit, $tahun, $stok, $harga_pokok, $keuntungan, $harga_jual, $ppn, $diskon, $foto_upload, $id_buku);
		header('location: ../index.php?page=buku&sukses=update');
	}
	if($_GET['page'] == 'hapusbuku'){
		$id_buku = $_POST['id'];
		$foto = $buku->edit($id_buku);
		$buku->delete($id_buku);

		if(!empty($foto['foto'])){
			unlink('../foto/'.$foto['foto']);
		}

		header('location: ../index.php?page=buku&sukses=delete');
	}
?>