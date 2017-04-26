<?php
require_once('../model/auth.php');
session_start();


if($_GET['page'] == 'login'){
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$login = $auth->login($username, $password);

	if($username == $login['username'] && $password == $login['password']){
		if($login['status'] == 1){
			$_SESSION['username'] = $username;
			$_SESSION['id_kasir'] = $login['id_kasir'];
			$_SESSION['level'] = $login['akses'];
	
			header('location: ../index.php');
		}else{
			header('location: ../login.php?status=tidakaktif');
		}
	}else{
		header('location: ../login.php?status=gagal');
}

}
if($_GET['page'] == 'logout'){
	session_destroy();
		$_SESSION['username'] = '';
		$_SESSION['id_kasir'] = '';
		$_SESSION['level'] = '';
	header('location: ../login.php');
}
?>