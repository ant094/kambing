<div class="row" style="font-size: 15px;">
	<label class="mb-1">Tentukan gejala Yang di Derita Kambing:</label>
	<div class="offset-1 col-11 mb-2">
		<?php
		for ($i = 1; $i <= 63; $i++) {
			?>
			<span id="iG<?= $i ?>"></span>
		<?php
		}

		?>
	</div>
	<?php

	$gejala2 = count($gejala);
	$gejala2 = $gejala2 - 1;

	?>

	<?php
	for ($i = 0; $i <= $gejala2; $i++) {

		?>
		<div class="offset-1 col-11 mb-2">

			<button type="button" id="O<?= $kunci[$i] ?>" value="<?= $kunci[$i] ?>" class="btn btn-primary btn-sm btn-block" style="font-size: 15px; 
	font-family: serif;"><?= $gejala[$i] ?></button>

		</div>

	<?php
	}
	?>
</div>
<hr style=" margin-top: 0px;">
<label for="exampleFormControlInput1" style="font-size: 12px; font-family: monospace;">Cari gejala penyakit yang lain jika masih ada lagi<i class="fas fa-diagnoses " style="font-size: 20px;"></i></label>

<div class="row">
	<div class="offset-1 col-11">
		<div class="form-group">
			<input type="text" class="form-control mb-3" id="searchA" placeholder="Search... ">
			<!-- </form> -->
			<!-- <a href="#" id="hasil1" class="list-group-item list-group-item-action"></a> -->
			<!-- <span id="hasilGejala"></span> -->

			<button id="P1" type="button" class="P1 btn btn-success btn-sm btn-block mb-2" style="font-size: 15px; font-family: serif; display: none;"></button>
			<button id="P2" type="button" class="P2 btn btn-success btn-sm btn-block mb-2" style="font-size: 15px; font-family: serif; display: none;"></button>
			<button id="P3" type="button" class="P3 btn btn-success btn-sm btn-block mb-2" style="font-size: 15px; font-family: serif; display: none;"></button>
			<button id="P4" type="button" class="P4 btn btn-success btn-sm btn-block mb-2" style="font-size: 15px; font-family: serif; display: none;"></button>
			<button id="P5" type="button" class="P5 btn btn-success btn-sm btn-block mb-2" style="font-size: 15px; font-family: serif; display: none;"></button>

		</div>
	</div>

</div>

<hr style="margin-top: 0px;">
<span class="terpilih" id='a'>Terpilih :</span>
<div class="row">
	<div class="offset-1 col-11 mb-1" style="    font-size: 16px;
	font-family: serif;">
		<?php
		for ($i = 0; $i < count($gejala_a); $i++) {
			?>
			<button type="button" class="btn btn-success btn-sm btn-block mb-2  disabled" disabled style="font-size: 15px; font-family: serif;" value="<?= $gejala_a[$i] ?>">
			<?= $gejala_b[$i] ?>
				<i class="fas fa-ban " style="font-size: 12px;"></i>
			</button>
		<?php
		}
		?>

		<?php
		for ($i = 1; $i <= 63; $i++) {
			?>
			<button id="G<?= $i ?>" type="button" class="btn btn-success btn-sm btn-block mb-2" style="font-size: 15px; font-family: serif; display: none;"></button>
		<?php
		}

		?>
		<form id="myForm" name="myForm" action="<?php echo base_url() . 'M_cek_kesehatan/hasil' ?>" method="post">
			<input type="hidden" name="pilihan1" value=<?= $gejala_awal?> id="id2">
			<!-- <input type="hidden" name="pilihan1" value="<?= $awal ?>" id="id2"> -->
		</form>
	</div>
</div>
