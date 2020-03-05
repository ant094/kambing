<div style="font-size: 12px;
    font-family: monospace;">
	<div class="row ">
		<div class="col-6">
			<img style="height: 210px; width: 245px;" class="rounded  " src="<?= base_url('Asset/upload/kambing/') . $kambing['gambar_kambing']; ?>" alt="">
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-6">
			Nomor Ternak
		</div>
		<div class="col-6">
			: <?= $kambing['no_ternak'] ?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			Jenis Kelamin
		</div>
		<div class="col-6">
			<?php
			switch ($kambing['jenis_kelamin']) {
				case 'P':
					$jenis_kelamin = "Pejantan";
					break;

				case 'B':
					$jenis_kelamin = "Betina";
					break;
			}
			?>
				: <?= $jenis_kelamin ?>
		</div>
	</div>
	<div class="row ">
		<div class="col-6">
			Tgl Lahir
		</div>
		<div class="col-6">
			: <?= $kambing['tgl_lahir'] ?>
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

	<div class="row">
		<div class="col-6">
			Tinggi
		</div>
		<div class="col-6">
			: <?= $tinggi ?> Cm
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			Diameter
		</div>
		<div class="col-6">
			: <?= $diameter ?> "
		</div>
	</div>
	<div class="row pb-1" style="border-bottom: 1px solid #cecdcd; ">
		<div class="col-6">
			Berat
		</div>
		<div class="col-6">
			: <?= $berat ?> Kg
		</div>
	</div>

	<div class="row pt-1">
		<b style="font-size: 14px;">
			Informasi
		</b>
	</div>


	<div class="row pb-1 pt-1" style="border-top: 1px solid #cecdcd;">
		<div class="col-6">
			Kondisi
		</div>
		<div class="col-6">
			: <?= $kondisi ?>
		</div>
	</div>
</div>
