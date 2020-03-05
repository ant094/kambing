<div class="form-group " style="line-height: 10px;">
	<label for="exampleFormControlInput1" style="font-size: 13px;">Set Tgl</label>
	<input name="tgl" style="height: 27px;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Format: 22-01-2019">
	<br>
	<label for="exampleFormControlInput1" style="font-size: 13px;">Hasil Tgl:</label>
	<?= $set_tgl ?>
</div>
<div class="row mt-3 pb-2">
	<div class=" col-2 ">
		<input name="submit" class="btn btn-warning" type="submit" value="Reset" style="font-size: 13px;">
	</div>
	<div class="offset-5 col-2  ">
		<input name="submit" class="btn btn-primary" type="submit" value="<?= $value_button ?>" style="font-size: 13px;">
	</div>

</div>
