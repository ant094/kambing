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

	<div class="row pb-1" style="<?= $a = $khusus != 'khusus' ?'border-bottom: 1px solid #cecdcd' : ''; ?> ">
		<div class="col-6">
			Berat
		</div>
		<div class="col-6">
			: <?= $berat ?> Kg
		</div>
	</div>
	<?php
	if ($khusus != 'khusus') {
		?>

		<div class="row pt-1">
			<b style="font-size: 14px;">
				Informasi
			</b>
		</div>
		<div class="row">
			<div class="col-12 pb-2" style="font-family:'Times New Roman', Times, serif; font-size: 13px; line-height: 16px; text-align: justify;">
				&nbsp;&nbsp;&nbsp;&nbsp;Kambing nomor ternak <?= $kambing['no_ternak'] ?> tergolong kambing <?= $kondisi ?> karena memiliki berat <?= $berat ?> Kg
				dimana kambing usia <?= $usia ?> bulan memiliki rentang bobot tubuh berkisar <?= $value3 ?> Kg.
				<br>
				<?php
					if ($kondisi == 'tidak sehat') {
						?>
					&nbsp;&nbsp;&nbsp;&nbsp;Segera lakukan peningkatan berat kambing untuk mencapai berat tubuh kambing yang sehat usia <?= $nilai_awal ?> bulan.
				<?php
					} elseif ($kondisi == 'Melebihi Berat Normal') {
						?>
					&nbsp;&nbsp;&nbsp;&nbsp;Segera lakukan penurunan berat kambing untuk mencapai berat tubuh kambing yang sehat usia <?= $nilai_awal ?> bulan.

				<?php
					}
					?>
			</div>
		</div>

	<?php
	}
	?>
	<div class="row pb-1 pt-1" style="border-top: 1px solid #cecdcd;">
		<div class="col-5">
			Kondisi
		</div>
		<div class="col-7">
			<?php
			if ($kondisi == "Sehat") {
				$kondisi = "Ideal";
			}
			if ($kondisi == "tidak Sehat") {
				$kondisi = "Kekurangan Gizi";
			}
			if ($kondisi == "Melebihi Berat Normal") {
				$kondisi = "Kelebihan Berat";
			}
			?>
			: <?= $kondisi ?>
		</div>
	</div>
</div>
