<div class="form-group " style="line-height: 10px;">
	<label for="exampleFormControlInput1" style="font-size: 13px;">Pilih Ternak</label>
	<select name="kambing" class="form-control" id="exampleFormControlSelect1">
		<?php
		foreach ($kambing as $value) {
			?>
			<option value="<?= $value->no_ternak; ?>"><?= $value->no_ternak; ?></option>
		<?php
		}
		?>

	</select>
	</div >
