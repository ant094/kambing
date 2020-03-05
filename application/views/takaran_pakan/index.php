<div class="row" style="border: 1px solid var(--danger);background: #ff000014;">
	<div class="col-12 pt-1  ">
		<b style="font-size: 14px;">
			<u>
				Catatan
			</u>
		</b>
	</div>
	<div class="col-12 pb-2 pl-3" style="font-family:'Times New Roman', Times, serif; font-size: 12px; line-height: 16px; text-align: justify;">
		&nbsp;&nbsp;&nbsp;&nbsp; Kambing nomor ternak <?= $no_ternak ?> berusia jalan ke
		<?= $usia ?> bulan dimana rentang bobot normalnya adalah <?= $value3 ?> Kg.
		<br>
		BB rata-ratanya adalah <?= $bb_rata?> Kg.
	</div>
</div>

<hr>

<div class="row">
	<div class="col-12 pl-0" style="font-family:'Times New Roman', Times, serif; font-size: 12px; line-height: 16px; text-align: justify;">
		<span class="ml-2 mt-2" style="font-size: 13px;">
			Tentukan target yang anda inginkan untuk
		</span>

		<div class="row pb-1 pt-1" style="font-size: 13px;">
			<div class="offset-1 col-2">
				Usia
			</div>
			<div class="col-7">
				: <label for="" class="usia"><?= $usia ?></label> Bulan
			</div>
		</div>

		<div class="row pt-1">
			<div class="offset-1 col-3 pt-1 pr-0">
				<label for="exampleFormControlInput1" style="font-size: 13px;">Berat</label>
			</div>
			<div class="col-3 pl-0 pr-0">
				<input id="berat" style="height: 27px;" type="text" name="berat" value='' class="form-control" placeholder="5.76">
			</div>
			<div class=" col-3">
				<button id="cek" type="button" class="btn btn-sm btn-block btn-success">Cek</button>
			</div>
		</div>
	</div>
</div>

<hr>

<div class="row" id='border'>
	<div class="col-12 pt-1  ">
		<b style="font-size: 14px;">
			Informasi
		</b>
	</div>
	<div class="col-12 pb-2 pt-1" style="font-family:'Times New Roman', Times, serif; font-size: 13px; line-height: 16px; text-align: justify;">
		&nbsp;&nbsp;&nbsp;&nbsp;Capai berat yang diinginkan dengan ubah porsi pakan <br>
		<div class="col-12">
			<p class="valueA" style="margin: 0px;"></p>
		</div>
		<div class="col-12">
			<p class="valueB" style="margin: 0px;"> </p>
		</div>
	</div>
</div>
