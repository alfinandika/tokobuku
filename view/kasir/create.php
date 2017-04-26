<?php
if(isset($_GET['status']) && $_GET['status'] == 'passwordtidakcocok'){
?> 
<div class="alert alert-danger">Password Tidak Cocok</div>
<?php
}
?>

<form method="POST" action="controller/kasircontroller.php?page=create" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-control" style="width: 50%" required="required">
			<option value="1">Aktif</option>
			<option value="0">Tidak Aktif</option>
		</select>
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="username" name="username" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Konfirmasi Password</label>
		<input type="password" name="password_confirmation" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Akses</label>
		<select name="akses" class="form-control" style="width: 50%" required="required">
			<option value="admin">Admin</option>
			<option value="operator">Operator</option>
			<option value="kasir">Kasir</option>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" name="" value="Tambah User" class="btn btn-success">
	</div>

</form>