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
	<div class="row ">
		<div class="col-6">
			Tgl Lahir
		</div>
		<div class="col-6">
			: <?= $tgl_lahir ?>
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

	<div class="row pb-1" style="border-bottom: 1px solid #cecdcd; ">
		<div class="col-6">
			Berat
		</div>
		<div class="col-6">
			: <?= $berat ?> Kg
		</div>
	</div>
	<div class="row pb-2 pt-2">
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
	<div class="row pt-1" style="border-top: 1px solid #cecdcd;">
		<b style="font-size: 14px;">
			Informasi
		</b>
	</div>
	<div class="row"></div>
	<div class="col-12 pb-2 pl-0" style="font-family:'Times New Roman', Times, serif; font-size: 14px; line-height: 18px; text-align: justify;">
		&emsp;&emsp;Kambing nomor ternak <?= $no_ternak ?> tergolong kambing <?= $kondisi ?> karena memiliki berat <?= $berat ?> Kg
		dimana kambing usia <?= $usia ?> bulan memiliki rentang bobot tubuh berkisar <?= $value3 ?> Kg.
		<br>
		<?php
		if ($kondisi == 'Kekurangan Gizi') {
			?>
			&nbsp;&nbsp;Segera lakukan peningkatan berat kambing untuk mencapai berat tubuh kambing yang sehat usia <?= $usia + 1; ?> bulan.
		<?php
		} elseif ($kondisi == 'Kelebihan Berat') {
			?>
			&nbsp;&nbsp;Segera lakukan penurunan berat kambing untuk mencapai berat tubuh kambing yang sehat usia <?= $usia + 1; ?> bulan.

		<?php
		}
		?>
	</div>


	<?php
	if ($target != 0) {
		?>
		<div class="row pb-2 pt-2" style="border-top: 1px solid #cecdcd;">
			<div class="col-5">
				Target
			</div>
			<div class="col-7">
				: <?= $target ?> Kg
			</div>
		</div>
		<div class="row " id="show1" style="border-top: 1px solid #cecdcd;">
			<b style="font-size: 14px;">
				Informasi
			</b>

			<div class="col-12 
			 pb-1 pt-1" style=" font-family:'Times New Roman', Times, serif; font-size: 12px; line-height: 16px; text-align: justify;">
				Capai berat ideal kambing <?= $target ?> Kg dengan ubah porsi pakan <br>
				<div class="col-12">
					<?= $value1_1 ?> Kg Rumput
				</div>
				<div class="col-12">
					<?= $value1_2 ?> Kg Ubi-ubian
				</div>
				untuk mencapai berat Kambing Sehat usia <?= $usia = $usia + 1 ?> bulan. <br>
			</div>
		</div>
	<?php
	}
	?>
</div>
