<form method="POST" action="controller/bukucontroller.php?page=tambahbuku" enctype="multipart/form-data">
	<div class="form-group">
		<label>Judul Buku</label>
		<input type="text" name="judul" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Nomor ISBN</label>
		<input type="text" name="noisbn" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>penulis</label>
		<input type="text" name="penulis" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>penerbit</label>
		<input type="text" name="penerbit" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>tahun</label>
		<input type="number" name="tahun" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Stock</label>
		<input type="number" name="stok" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Harga Pokok</label>
		<input type="number" id="harga_pokok" name="harga_pokok" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Keuntungan</label>
		<input type="number" id="keuntungan" name="keuntungan" class="form-control" required="required" style="width: 50%">
	</div>
	<div class="form-group">
		<label>PPN (Dalam Persen)</label>
		<input type="number" id="ppn" name="ppn" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Diskon (Dalam Persen)</label>
		<input type="number" id="diskon" name="diskon" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<label>Harga jual</label>
		<input type="number" id="harga_jual" name="harga_jual" class="form-control" required="required" style="width: 50%">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control" style="width: 50%" required="required">
	</div>
	<div class="form-group">
		<input type="submit" name="" value="Tambah Buku" class="btn btn-success">
	</div>

</form>
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#diskon").keyup(function(){

			if($("#diskon").val() != ''){
				var diskon = parseInt($("#diskon").val());
			}else{
				var diskon = 0;
			}

			if($("#harga_pokok").val() != ''){
				var harga_pokok = parseInt($("#harga_pokok").val());
			}else{
				var harga_pokok = 0;
			}

			if($("#ppn").val() != ''){
				var ppn = parseInt($("#ppn").val());
			}else{
				var ppn = 0;
			}

			if($("#keuntungan").val() != ''){
				var keuntungan = parseInt($("#keuntungan").val());
			}else{
				var keuntungan = 0;
			}

			var harga_jual = harga_pokok-(diskon/100*harga_pokok)+(ppn/100*harga_pokok)+keuntungan;
			$("#harga_jual").val(harga_jual);
		})
		$("#ppn").keyup(function(){

			if($("#diskon").val() != ''){
				var diskon = parseInt($("#diskon").val());
			}else{
				var diskon = 0;
			}

			if($("#harga_pokok").val() != ''){
				var harga_pokok = parseInt($("#harga_pokok").val());
			}else{
				var harga_pokok = 0;
			}

			if($("#ppn").val() != ''){
				var ppn = parseInt($("#ppn").val());
			}else{
				var ppn = 0;
			}
			if($("#keuntungan").val() != ''){
				var keuntungan = parseInt($("#keuntungan").val());
			}else{
				var keuntungan = 0;
			}


			var harga_jual = harga_pokok+(ppn/100*harga_pokok)-(diskon/100*harga_pokok)+keuntungan;
			$("#harga_jual").val(harga_jual);
		})
		$("#harga_pokok").keyup(function(){

			if($("#diskon").val() != ''){
				var diskon = parseInt($("#diskon").val());
			}else{
				var diskon = 0;
			}

			if($("#harga_pokok").val() != ''){
				var harga_pokok = parseInt($("#harga_pokok").val());
			}else{
				var harga_pokok = 0;
			}

			if($("#ppn").val() != ''){
				var ppn = parseInt($("#ppn").val());
			}else{
				var ppn = 0;
			}
			if($("#keuntungan").val() != ''){
				var keuntungan = parseInt($("#keuntungan").val());
			}else{
				var keuntungan = 0;
			}


			var harga_jual = harga_pokok+(ppn/100*harga_pokok)-(diskon/100*harga_pokok)+keuntungan;
			$("#harga_jual").val(harga_jual);
		})

		$("#keuntungan").keyup(function(){

			if($("#diskon").val() != ''){
				var diskon = parseInt($("#diskon").val());
			}else{
				var diskon = 0;
			}

			if($("#harga_pokok").val() != ''){
				var harga_pokok = parseInt($("#harga_pokok").val());
			}else{
				var harga_pokok = 0;
			}

			if($("#ppn").val() != ''){
				var ppn = parseInt($("#ppn").val());
			}else{
				var ppn = 0;
			}
			if($("#keuntungan").val() != ''){
				var keuntungan = parseInt($("#keuntungan").val());
			}else{
				var keuntungan = 0;
			}


			var harga_jual = harga_pokok+(ppn/100*harga_pokok)-(diskon/100*harga_pokok)+keuntungan;
			$("#harga_jual").val(harga_jual);
		})

	});
</script>