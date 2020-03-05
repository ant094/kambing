<div class="" style="margin-top: 65px;"></div>
<div class="row mb-3">

<div class="offset-6 col-6">
<form action="<?= base_url('dashboard/detail_penyakit') ?>" method="post">
<div class="input-group">
  <select class="custom-select" name="pilih" id="inputGroupSelect04" aria-label="Example select with button addon">
    <option value="all" selected>All</option>
 <?php
 for ($i=0; $i < count($gejala); $i++) { 

?>
<option value="<?= $gejala2[$i] ?>"><?= $gejala[$i] ?></option>
<?php
}
 ?>
   
  </select>
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">Button</button>
  </div>
</div>
</form>
</div>

</div>



<div class="table-responsive">
	<table class="table" style="font-size: 14px;">
		<thead>
			<tr>
				<th scope="col">Ternak</th>
				<th scope="col">Penyakit</th>
				<th scope="col">tgl</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$total = count($count);
			for ($i = 0; $i < $total; $i++) {
				$a = $count[$i];
				$a = explode("-", $a);
				$b = $a[2] . '/' . $a[1] . '/' . $a[0];
			?>
				<tr>
					<td><?= $count3[$i] ?></td>
					<td><?= $count2[$i] ?></td>
					<td><?= $b ?></td>
				</tr>
			<?php
			}
			?>


		</tbody>
	</table>

</div>
