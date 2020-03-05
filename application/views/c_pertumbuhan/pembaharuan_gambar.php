<div class="form-group mt-4" style="line-height: 10px;">
	<label for=" mb-1" style="font-size: 14px; font-family: monospace;">Perbarui Foto Kambing anda!</label>
	<div class="custom-file">
		<input class="btn btn-lg" style="font-size: 14px; padding-top: 5px;" type="file" name="userfile" class="form-control-file" id="exampleFormControlFile1">
	</div>
	<?php
	if ($error) {
		?>
		<b> <span style="font-size: 12px; color: red; font-family: monospace;">*gambar wajib diisi!</span></b><br>
		<b> <span style="font-size: 12px; color: red; font-family: monospace;">*format jpg/png!</span></b>
	<?php
	}
	?>
</div>
