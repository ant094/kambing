<div style="font-size: 14px;">
	<div class="row  pb-2 pt-2" style="border-bottom: #c5c4c4 solid 1px; box-shadow-bottom: #c5c4c4 1px 1px 1px; ">
		<div class="col-12 " style="text-align: justify;">
			&nbsp;&nbsp;Ada beberapa kemungkinan penyakit yang diderita kambing!
		</div>
	</div>
	<?php
	$A = 1;
	$jml_penyakit	= count($penyakit) != 5 ? count($penyakit) : 5;

	for ($i = 0; $i < $jml_penyakit; $i++) {
		# code...
		?>

		<div class="row  pb-2 pt-1" style="border-bottom: #c5c4c4 solid 1px; box-shadow-bottom: #c5c4c4 1px 1px 1px; ">
			<div class="col-12 text-right">
				<h5 class="mb-0">
					<?php
						if ($percentase) {
							?>
						<div style="font-size: 15px;">
							Persentase Diagnosa: <?= $percentase[$A - 1] ?><i class="fas fa-percent" style="font-size: 0.9em"></i>
						</div>
					<?php
						}
						?>
				</h5>
			</div>
			<div class="col-10 p-0">
				<div class="text-left">
					<h6 class="mb-0"><?= $A . ". " . $penyakit[$i] ?> </h6>
				</div>
			</div>
			<div class="col-2 p-0">

			</div>

			<div class="col-2 pr-1">
				<p class="mb-0">Gejala: </p>

			</div>
			<div class="col-10 pr-0 pl-3">
				<?php
					foreach ($gejala as $value) {
						?>
					<p class="mb-0">&nbsp; <i class="fas fa-check" style="font-size: 10px; color: var(--success);"></i> <?= $value ?></p>
				<?php
					}
					?>
			</div>
		</div>
	<?php
		$A++;
	}
	?>
	<div class="row  pb-2 pt-2">
		<div class="col-12">
			<b style="font-size: 14px;">
				Saran Informasi
			</b>
		</div>
		<div class="col-12 pb-2" style="font-family:'Times New Roman', Times, serif; font-size: 14px; line-height: 16px; text-align: justify;">
			&nbsp;&nbsp;&nbsp;&nbsp;Segera hubungi dokter hewan atau mantri hewan terdekat agar kambing segera mendapat pengobatan.
		</div>
	</div>
</div>
