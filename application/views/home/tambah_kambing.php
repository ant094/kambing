 <!-- No Induk -->
 <?php
	$jk 			= $jenis_kelamin;
	$tl 			= $telinga;
	$berat_kosong 	= $berat_kosong ? $berat_kosong : "";
	// die($berat_kosong);
	?>
 <Span style="color: red;"><b>Tanda * Wajib Untuk diisi!</b></Span>
 <div class="form-group m" style="line-height: 10px;">
 	<label for="exampleFormControlInput1" style="font-size: 14px;">No Pejantan</label>
 	<input value="<?php echo $no_pejantan = $no_pejantan ? $no_pejantan : ""; ?>" name="no_pejantan" style="height: 27px;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Q202 P. Andi">
 	<!-- <?php
			if (validation_errors('no_pejantan') and $no_pejantan == " ") {
				echo "*harus di isi";
			}
			?> -->
 </div>
 <div class="form-group m " style="line-height: 10px;">
 	<label for="exampleFormControlInput1" style="font-size: 14px;">No Induk</label>
 	<input value="<?php echo $no_induk = $no_induk ? $no_induk : ""; ?>" name="no_induk" style="height: 27px;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Q101">
 	<!-- <?php
			if (validation_errors('no_induk') and $no_induk == " ") {
				echo "*harus di isi";
			}
			?> -->
 </div>
 <div class="form-group m" style="line-height: 10px;">
 	<label for="exampleFormControlInput1" style="font-size: 14px;"><Span style="color: red;">*</Span> No Ternak</label>
 	<input value="<?php echo $no_ternak = $no_ternak ? $no_ternak : ""; ?>" name="no_ternak" style="height: 27px;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="A001">
 	<?php
		if (validation_errors('no_ternak') and $no_ternak == "") {
		?>
 		<div class="offset-4 mb-3">
 			<span class="" style="color: red;">*no ternak harus terisi</span>
 		</div>
 	<?php
		}
		?>
 </div>

 <!-- Kelamin -->
 <label for="" style="font-size: 14px;"><Span style="color: red;">*</Span> Jenis Kelamin</label>
 <div class="row">
 	<div class="offset-1 col-10">
 		<div class="form-check form-check-inline">
 			<input <?php echo $jenis_kelamin = $jk == "P" ? "checked"  : " "; ?> class="form-check-input" type="radio" name="jenis_kelamin" id="Jantan" value="P">
 			<label class="form-check-label" style="font-size: 14px;" for="Jantan" id="Jantan">Jantan</label>
 		</div>

 		<div class="form-check form-check-inline">
 			<input <?= $jenis_kelamin = $jk == 'B' ? "checked" : " "; ?> class="form-check-input" type="radio" name="jenis_kelamin" id="Betina" value="B">
 			<label class="form-check-label" for="Betina" style="font-size: 14px;" id="Betina">Betina</label>
 		</div>
 	</div>
 	<?php
		if (validation_errors('jenis_kelamin')) {
		?>
 		<div class="offset-3 mb-3">
 			<span class="" style="color: red;">*Jenis kelamin harus terisi</span>
 		</div>
 	<?php

		}
		?>
 </div>
 <!-- Berat -->
 <div class="form-group  mt-2" style="line-height: 10px;">
 	<label for="exampleFormControlInput1" style="font-size: 14px;"><Span style="color: red;">*</Span>Berat</label>
 	<input name="berat" style="height: 27px;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="3.90" value="<?php echo $berat = $berat ? $berat : ""; ?>">
 	<?php
		if ($berat_kosong != "") {
		?>
 		<div class="offset-2 mb-3">
 			<span class="" style="color: red;"><?= $berat_kosong ?></span>
 		</div>
 	<?php
		}
		// die($berat_kosong);
		?>
 </div>

 <!-- TGl Lahir -->
 <div class="form-group m mt-2" style="line-height: 10px;">
 	<label for="exampleFormControlInput1" style="font-size: 14px;"><Span style="color: red;">*</Span> Tgl Lahir</label>
 	<input name="tgl_lahir" style="height: 27px;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Format: 22-01-2019">
 	<!-- <input name="tgl_lahir" style="height: 27px;" type="date" min="2000-01-01" class="form-control" id="exampleFormControlInput1" placeholder="Format: 22-01-2019"> -->
 	<?php
		if (validation_errors('tgl_lahir')) {
		?>
 		<div class="offset-1 mb-3">
 			<span class="" style="color: red;">*Tgl lahir tidak boleh kosong</span>
 		</div>
 	<?php
		}
		// die($berat_kosong);
		?>
 </div>
 <!-- Telinga -->
 <div class="form-group m mt-2 mb-0" style="line-height: 10px;">
 	<label for="exampleFormControlInput1" style="font-size: 14px; margin-bottom: 5px;"><Span style="color: red;">*</Span> Telinga</label>
 </div>
 <div class="row">
 	<div class="col-12">
 		<div class="form-check form-check-inline">
 			<input class="form-check-input" type="radio" name="telinga" id="k" value="kecil" <?= $telinga = $tl == 'kecil' ? "checked" : " "; ?>>
 			<label class="form-check-label" style="font-size: 14px;" for="k">Kecil</label>
 		</div>

 		<div class="form-check form-check-inline">
 			<input class="form-check-input" type="radio" name="telinga" id="s" value="sedang" <?= $telinga = $tl == 'sedang' ? "checked" : " "; ?>>
 			<label class="form-check-label" for="s" style="font-size: 14px;">Sedang</label>
 		</div>

 		<div class="form-check form-check-inline">
 			<input class="form-check-input" type="radio" name="telinga" id="p" value="panjang" <?= $telinga = $tl == 'panjang' ? "checked" : " "; ?>>
 			<label class="form-check-label" for="p" style="font-size: 14px;">Panjang</label>
 		</div>
 	</div>
 </div>
 <?php
	if (validation_errors('telinga')) {
	?>
 	<div class="offset-5 mb-3">
 		<span class="" style="color: red;">*Telinga harus terisi</span>
 	</div>
 <?php
	}
	?>
 <!-- Pola Warna -->
 <div class="form-group mt-3 mb-0" style="line-height: 10px;">
 	<label for="exampleFormControlInput1" style="font-size: 14px;"><Span style="color: red;">*</Span> Pola Warna</label>
 	<div class="row">
 		<div class="offset-3 col-8">
 			<div class="checkbox-inline">
 				<label><input type="checkbox" name="w_hitam" value="hitam"> Hitam</label>
 			</div>
 			<div class="checkbox-inline">
 				<label><input type="checkbox" name="w_putih" value="putih"> Putih</label>
 			</div>
 			<div class="checkbox-inline">
 				<label><input type="checkbox" name="w_coklat" value="coklat"> Coklat</label>
 			</div>
 		</div>
 	</div>
 </div>

 <!-- Upload FIle -->
 <div class="form-group">
 	<label for="exampleFormControlFile1" style="font-size: 14px;"><Span style="color: red;">*</Span>Upload Gambar Kambing</label>

 	<br>
 	<!-- <img src="<?= base_url('Asset/') ?>upload/default/default.jpg" alt="" style="height: 70px; margin-bottom: 8px; margin-left: 65px;"> -->
 	<!-- <br> -->
 	<input type="file" name="userfile" class="form-control-file" style="font-size: 12px;" id="exampleFormControlFile1">
 	<?php
		if ($error) {
		?>
 		<div class="offset-5 mb-3">
 			<span class="" style="color: red;">*Foto harus di isii</span>
 		</div>
 	<?php
		}
		?>
 </div>
