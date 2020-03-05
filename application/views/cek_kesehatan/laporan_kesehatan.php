<div style="font-size: 12px;    font-family: monospace;">
	<div class="row ">
		<div class="col-6">
			<img style="height: 210px; width: 245px;" class="rounded  " src="<?= base_url('Asset/upload/kambing/') . $nama_gambar; ?>" alt="">
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-6">
			Nomor Ternak
		</div>
		<div class="col-6">
			: <?= $no_ternak ?>
		</div>
	</div>
	<div class="row">
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
				: <?= $jenis_kelamin ?>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			Usia
		</div>
		<div class=" col-6">
			: <?= $usia; ?> Bulan
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			Kondisi
		</div>
		<div class=" col-6">
			: <?= $kondisi; ?>
		</div>
	</div>
	</div>


	<?php
	if ($kondisi == "Tidak Sehat") {

		?>
		<div class="row pt-1" style="border-top: 1px solid #cecdcd;">
			<b style="font-size: 14px;">
				Informasi
			</b>
		</div>
		<div class="col-12 pb-2 pl-0" style="font-family:'Times New Roman', Times, serif; font-size: 14px; line-height: 18px; text-align: justify;">
			&emsp;&emsp;Lakukan diagnosa penyakit dengan fitur sistem pakar
		</div>
<?php
}

?>
