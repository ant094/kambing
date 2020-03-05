<div style="font-family: monospace">

	<div class="row pb-2 " style="font-size: 14px; border-bottom: 1px solid #cecdcd; ">
		<div class="col-12 pr-0 pl-0 text-center">
			<img src=" <?= base_url('Asset/'); ?>upload/kambing/<?= $nama_gambar ?>" style="height: 200px;" class="rounded img-fluid " alt="...">
		</div>

	</div>

	<div class="row pt-1">
		<b style="font-size: 12px;">
			Informasi
		</b>
	</div>


	<div class="row" style=" font-size: 12px;">
		<div class="col-6">
			No Ternak
		</div>
		<div class="col-6">
			: <?= $no_ternak; ?>
		</div>
	</div>
	<div class="row" style=" font-size: 12px;">
		<div class="col-6">
			No Pejantan
		</div>
		<div class="col-6">
			: <?= $no_pejantan; ?>
		</div>
	</div>
	<div class="row " style=" font-size: 12px;">
		<div class="col-6">
			No Induk
		</div>
		<div class="col-6">
			: <?= $no_induk; ?>
		</div>
	</div>
	<div class="row" style="font-size: 12px;">
		<div class="col-6">
			Jenis Kelamin
		</div>
		<div class="col-6">
			<?php
			switch ($jenis_kelamin) {
				case 'P':
					$jenis_kelamin = "Pejantan";
					break;

				case 'B':
					$jenis_kelamin = "Betina";
					break;
			}
			?>
				: <?= $jenis_kelamin; ?>
		</div>
	</div>
	<div class="row" style="font-size: 12px;">
		<div class="col-6">
			Berat
		</div>
		<div class="col-6">
			: <?= $berat; ?> Kg
		</div>
	</div>
	<div class="row" style="font-size: 12px;">
		<div class="col-6">
			Tanggal Lahir
		</div>
		<div class="col-6">
			: <?= $tgl_lahir; ?>
		</div>
	</div>
	<div class="row" style="font-size: 12px;">
		<div class="col-6">
			Telinga
		</div>
		<div class="col-6">
			: <?= $telinga; ?>
		</div>
	</div>
	<div class="row pb-1" style=" font-size: 12px;">
		<div class="col-6">
			Pola Warna
		</div>
		<div class="col-6">
			: <?= $warna; ?>
		</div>
	</div>

</div>
