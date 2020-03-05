<div class="row" style="font-size: 17px; font-family: monospace;">
	<div class="col-12 text-center">
		<u>
			<b><?= $penyakit; ?></b>
		</u>
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
