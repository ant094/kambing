<div style="font-size: 12px;
    font-family: monospace;">
	<div class="row">
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
	<div class="row">
		<div class="col-6">
			Usia
		</div>
		<div class="col-6">
			: <?= $nilai_awal; ?> Bulan
		</div>
	</div>

	<div class="row pb-1">
		<div class="col-6">
			Berat
		</div>
		<div class="col-6">
			: <?= $berat ?> Kg
		</div>
	</div>
	<div class="row pb-1" style="border-bottom: 1px solid #cecdcd; font-size: 12px;">
		<div class="col-6">
			Kategori
		</div>
		<div class="col-6">
			: <?= $kategori ?>
		</div>
	</div>
</div>
<div class="row pt-2 pb-1">
	<span style="font-size: 12px;">
		Tentukan Target bobot untuk usia <?= $nilai_akhir ?> Bulan
	</span>
</div>

<div class="row">
	<div class="offset-1 col-5  pl-0 ">
		<label class="form-check-label" for="inlineRadio2">
			<button id="button1" value="<?= $value1 ?>" class="btn btn-warning" type="button" style="font-size: 12px;">
				<i class="fas fa-star" style="color: var(--primary); ">
					<span style="color: #FFFFFF;"><?= $value1 ?> Kg</span>
				</i>
			</button>
		</label>
	</div>

	<div class="col-5 pl-0">
		<label class="form-check-label" for="inlineRadio2">
			<button id="button2" value="<?= $value2 ?>" class="btn btn-warning" type="button" style="font-size: 12px;">
				<i class="fas fa-star" style="color: var(--danger);">
					<span style="color: #FFFFFF;"><?= $value2 ?> Kg</span>
				</i>
			</button>
		</label>
	</div>
</div>
<?php
if ($nilai_akhir > 12 && $nilai_awal <= 24) {
	?>
	<div class=" row pt-1">
		<div style="font-size: 11px; font-family: unset">
			<div class="col-12">
				<span><i class="fas fa-star" style="color: var(--primary) ">
					</i> Kambing Sehat Untuk Ternak</span>
			</div>
			<div class=" col-12">
				<span><i class="fas fa-star" style="color: var(--danger) ">
					</i> Untuk Program Penggemukkan dan Target <br>diJual di Pasar</span>
			</div>
		</div>
	</div>
<?php
} else {
	?>
	<div class=" row pt-1">
		<div style="font-size: 11px; font-family: unset">
			<div class="col-12">
				<span><i class="fas fa-star" style="color: var(--primary) ">
					</i> Rekomendasi BB Rata-Rata</span>
			</div>
		</div>
	</div>
<?php
}
?>
<div class="row pt-1">
	<b style="font-size: 14px;">
		Informasi
	</b>
</div>
<div class="row " id="show1" style="border: 1px solid var(--primary); background: aliceblue;">
	<div class="col-12 pb-2 pt-1" style=" font-family:'Times New Roman', Times, serif; font-size: 13px; line-height: 16px; text-align: justify;">
		Capai berat ideal kambing <?= $value1 ?> Kg dengan ubah porsi pakan <br>
		<div class="col-12">
			<?= $value1_1 ?> Kg Rumput
		</div>
		<div class="col-12">
			<?= $value1_2 ?> Kg Ubi-ubian
		</div>
		untuk mencapai berat Kambing Sehat usia <?= $nilai_akhir ?> bulan. <br>
	</div>
</div>
<div class="row" id="show2" style="border: 1px solid var(--danger);background: #ff000014;">
	<div class="col-12 pb-2 pt-1" style="font-family:'Times New Roman', Times, serif; font-size: 13px; line-height: 16px; text-align: justify;">
		Capai berat ideal kambing <?= $value2 ?> Kg dengan ubah porsi pakan <br>
		<div class="col-12">
			<?= $value2_1 ?> Kg Rumput
		</div>
		<div class="col-12">
			<?= $value2_2 ?> Kg Ubi-ubian
		</div>
		untuk mencapai berat Kambing Sehat usia <?= $nilai_akhir ?> bulan. <br>
	</div>
</div>
