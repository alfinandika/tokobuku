<?php
require_once('../model/kasir.php');

if(isset($_GET['page'])){

	if($_GET['page'] == 'create'){
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$status = $_POST['status'];
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$password_confirmation = sha1($_POST['password_confirmation']);
		$akses = $_POST['akses'];

		if($password != $password_confirmation){
			header('location: ../index.php?page=tambahkasir&status=passwordtidakcocok');
		}else{
			$kasir->store($nama, $alamat, $telepon, $status, $username, $password, $akses);
			header('location: ../index.php?page=kasir&sukses=create');
		}
	}

	if($_GET['page'] == 'nonaktif'){
		$id_kasir = $_POST['id'];
		$kasir->nonaktif($id_kasir);
		header('location: ../index.php?page=kasir&sukses=nonaktif');
	}

	if($_GET['page'] == 'aktifkan'){
		$id_kasir = $_POST['id'];
		$kasir->aktifkan($id_kasir);
		header('location: ../index.php?page=kasir&sukses=aktifkan');
	}

	if($_GET['page'] == 'update'){
		$id_kasir = $_GET['id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$status = $_POST['status'];
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$password_confirmation = sha1($_POST['password_confirmation']);
		$akses = $_POST['akses'];

		if(empty($password)){
			$kasir->update_no_pass($nama, $alamat, $telepon, $status, $username, $akses, $id_kasir);
			header('location: ../index.php?page=kasir&sukses=update');
		}elseif(!empty($password)){

			if($password != $password_confirmation){
				header('location: ../index.php?page=editkasir&status=passwordtidakcocok&id='.$_GET['id']);
			}else{
				$kasir->update($nama, $alamat, $telepon, $status, $username, $password, $akses, $id_kasir);
				header('location: ../index.php?page=kasir&sukses=update');
			}

		}
	}
}
?>