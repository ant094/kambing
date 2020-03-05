<div class="row">
	<div class="col-12 pl-0" style="font-size: 15px; font-family: serif;">
		<p class="mb-1">Kambing anda menderita penyakit:</p>
	</div>
</div>

<div class="row" style="font-size: 17px; font-family: monospace;">
	<div class="col-12 text-center">
		<u>
			<b><?= $penyakit; ?></b>
		</u>
	</div>
</div>

<div class="row" style="font-size: 12px; font-family: monospace;">
	<div class=" col-1">
		<p>Gejala: </p>
	</div>
	<div class="ml-2 col-10">
		<?php
		foreach ($gejala as $value) {
		?>
			<p class="mb-0">&nbsp; <i class="fas fa-check" style="font-size: 10px; color: var(--success);"></i> <?= $value ?></p>
		<?php
		}
		?>
	</div>
</div>
<hr>
<?php
$penyakit = explode("(", $penyakit);
$pengobatan = trim(strtolower($penyakit[0])) . ".PNG";
$pencegahan = trim(strtolower($penyakit[0])) . "2.PNG";
$pengobatan = str_replace(' ', '', $pengobatan);
$pencegahan = str_replace(' ', '', $pencegahan);
?>
<div class="row">
	<div class="col-12 pl-0" style="font-size: 15px; font-family: serif;">
		<p class="mb-1"><b><u>Pengobatan :</u></b></p>
	</div>
	<div class="col-12 pl-0 pr-0  m-0">
		<img src="<?= base_url('Asset/image/penyakit/') . $pengobatan ?>" alt="" class="img-fluid rounded">
	</div>
</div>
<hr>
<div class="row">
	<div class="col-12 pl-0" style="font-size: 15px; font-family: serif;">
		<p class="mb-1"><b><u>Pencegahan :</u></b></p>
	</div>
	<div class="col-12 pl-0 pr-0  m-0">
		<img src="<?= base_url('Asset/image/penyakit/') . $pencegahan ?>" alt="" class="img-fluid rounded">
	</div>
</div>
