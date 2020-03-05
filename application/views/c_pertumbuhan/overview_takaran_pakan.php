<div class="row" style="font-size: 14px; font-size: 13px; 
    line-height: 18px;
    text-align: justify;">
	<div class="col-12 a" style="">
		Capai Berat Kambing <?= $nilai_target ?> Kg dengan Mengubah porsi Pakan
	</div>
</div>
<div class="row" style="font-size: 13px; font-family: monospace;">
	<div class="col-12">
		<ul class="a" style="list-style: none;">
			<li>
				<i class="fas fa-check">
					<?= $value1_1 ?> Kg Rumput &
				</i>
			</li>
			<li>
				<i class="fas fa-check">
					<?= $value1_2 ?> Kg Ubi Ubian
				</i>
			</li>
		</ul>
	</div>
</div>

<div class="row" style="font-size: 14px;">
	<div class="col-12" style="font-size: 14px; font-size: 13px;
    line-height: 18px;
    text-align: justify;">
		Untuk Mencapai berat <?= $nilai_target ?> Kg Kambing sehat usia <?= $nilai_akhir ?> bulan
	</div>
</div>

<div class="row mt-4" style="font-size: 14px;">
	<div class="col-4 ">
		<a href="<?= base_url('M_catatan_pertumbuhan/takaran_pakan/').$no_ternak ?>">
			<< Back </a> </div> <div class="offset-4 col-4">
				<a href="<?= base_url('M_catatan_pertumbuhan/pembaharuan_gambar') ?>">
					Ok >>
				</a>
	</div>
</div>
