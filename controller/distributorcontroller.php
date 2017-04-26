<?php
require_once('../model/distributor.php');
if(isset($_GET['page'])){

	if($_GET['page'] == 'tambahdistributor'){
		$nama_distributor = $_POST['nama_distributor'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];

		$distributor->store($nama_distributor, $alamat, $telepon);

		header('location: ../index.php?page=distributor&sukses=create');

	}

	if($_GET['page'] == 'hapusdistributor'){
		$id_distributor = $_POST['id'];

		$distributor->delete($id_distributor);

		header('location: ../index.php?page=distributor&sukses=delete');

	}
	if($_GET['page'] == 'updatedistributor'){
		$nama_distributor = $_POST['nama_distributor'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$id_distributor = $_GET['id'];
		
		$distributor->update($nama_distributor, $alamat, $telepon, $id_distributor);

		header('location: ../index.php?page=distributor&sukses=update');
	}
}
?>