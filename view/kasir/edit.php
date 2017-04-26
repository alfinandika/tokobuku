<?php
if(isset($_GET['status']) && $_GET['status'] == 'passwordtidakcocok'){
?> 
<div class="alert alert-danger">Password Tidak Cocok</div>
<?php
}
require_once('../../model/kasir.php');
$id = $_GET['id'];
$list_kasir = $kasir->edit($id); 
?>

<form method="POST" action="controller/kasircontroller.php?page=update&id=<?=$id?>" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?=$list_kasir['nama']?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" value="<?=$list_kasir['alamat']?>">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control" value="<?=$list_kasir['telepon']?>">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-control">
			<option value="1">Aktif</option>
			<option value="0"
			<?php
			if ($list_kasir['status'] == '0') {
				echo "selected";
			}
			?> >Tidak Aktif</option>
		</select>
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="username" name="username" class="form-control" value="<?=$list_kasir['username']?>">
	</div>
	<div class="form-group">
		<label>Password (Opsional)</label>
		<input type="password" name="password" class="form-control" >
	</div>
	<div class="form-group">
		<label>Konfirmasi Password</label>
		<input type="password" name="password_confirmation" class="form-control" >
	</div>
	<div class="form-group">
		<label>Akses</label>
		<select name="akses" class="form-control" >
			<option value="admin"
			<?php
			if ($list_kasir['akses'] == 'admin') {
				echo "selected";
			}?>
			>Admin</option>
			<option value="operator"
			<?php
			if ($list_kasir['akses'] == 'operator') {
				echo "selected";
			}?>
			>Operator</option>
			<option value="kasir" 
			<?php
			if ($list_kasir['akses'] == 'kasir') {
				echo "selected";
			}?>
			>Kasir</option>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" name="" value="UPDATE" class="btn btn-success">
	</div>

</form>