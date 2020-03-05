<div style="font-size: 12px;
    font-family: monospace;">
	<div class="row">
		<div class="col-6">
			<img style="height: 210px; width: 245px;" class="rounded  " src="<?= base_url('Asset/upload/kambing/') . $kambing['gambar_kambing']; ?>" alt="">
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-6">
			Nomor Ternak
		</div>
		<div class="col-6">
			: <?= $kambing['no_ternak']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			Jenis Kelamin
		</div>
		<div class="col-6">
			: <?= $kambing['jenis_kelamin'] == 'P' ? 'Pejantan' : "Betina"; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			Tgl Lahir
		</div>
		<div class="col-6">
			: <?= $kambing['tgl_lahir']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			Usia :
		</div>
	</div>
	<div class="row">
		<div class="ml-3 col-11">
			<?= $usia; ?>
		</div>
	</div>

	<!-- No Induk -->
	<!-- <div class="row">
		<div class="offset-3">
			<p class="text-muted m-0">*Contoh : 24.0 atau 24.99</p>
		</div>
	</div> -->
	<div class="row">
		<div class="col-6">
			<label for="exampleFormControlInput1" style="font-size: 14px;">Berat</label>
		</div>
		<div class="col-5">
			<input style="height: 27px;" type="text" name="berat" class="form-control" id="exampleFormControlInput1" placeholder=" 24.99 ">
		</div>
	</div>

	<?php
	if ($kosong) {
		?>
		<div class="row">
			<div class="offset-5">
				<span class=" m-0" style="color: red;"><?= $kosong ?> </span>
			</div>
		</div>
	<?php
	}
	?>
	<?php
	if ($nilai_awal >= 6 && $kambing['jenis_kelamin'] == 'B') {
		?>
		<div class="row">
			<div class="col-12">
				<div class="custom-control custom-switch ">
					<input type="checkbox" class="custom-control-input check betina" id="customSwitches">
					<label class="custom-control-label" for="customSwitches" style="font-size: 10px; padding-top: 5px;" class="pt-1">
						<b>Perilaku Khusus</b>
					</label>
				</div>
			</div>
		</div>
		<div class="row" id="khusus">
			<div class="offset-5 col-7">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="khusus" id="inlineRadio1" value="Betina Hamil">
					<label class="form-check-label" style="font-size: 11px;" for="inlineRadio1">Betina Hamil</label>
				</div>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="khusus" id="inlineRadio2" value="Betina Menyusui">
					<label class="form-check-label" for="inlineRadio2" style="font-size: 11px;">Betina Menyusui</label>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</div>
