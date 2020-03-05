<div class="row" style="margin-top: 67px; margin-bottom: 25px; font-size: 12px; font-family: monospace">
	<div class=" offset-1 col-10 pl-4 pr-4  pt-2 pb-3" style="border: #c5c4c4 solid 1px; box-shadow: #c5c4c4 1px 1px 1px;">

		<div class="row  pb-2 pt-2" >
			<div class="col-6 pr-1">
				<p class="mb-0">Diagnosis Dokter:</p>
			</div>
			<div class="col-5 pr-0 pl-1">
				<p class="mb-0"><?= $penyakit?></p>
			</div>
		</div>
		<div class="row  pb-2 pt-2" >
			<div class="col-12 pr-1">
				<p class="mb-0">Catatan: </p>
			</div>
			<div class="col-12 ">
				<span class="mb-0"><?= $catatan = $catatan ? $catatan : "Catatan Tidak Ada"; ?></span>
			</div>
		</div>

	</div>
</div>



