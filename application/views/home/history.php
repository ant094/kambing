<div class="row" style="margin-top: 5px; margin-bottom: 25px; font-size: 12px; font-family: monospace">
	<div class=" offset-1 col-10 pl-4 pr-4  pt-2 pb-3" style="border: #c5c4c4 solid 1px; box-shadow: #c5c4c4 1px 1px 1px;">

<?php
if (count($all) != 0) {

?>
	<?php foreach ($all as $value) {
?>

<a href="" style="text-decoration: none; color: black;"  >
			<div class="row  pb-2 pt-2" style="border-bottom: #c5c4c4 solid 1px; box-shadow-bottom: #c5c4c4 1px 1px 1px; ">
			<div class="col-4 p-0">
				<div class="">
					<img src="<?= base_url('Asset/'); ?>upload/kambing/<?= $value->gambar_kambing ?>" style="height: 70px; " class="img-fluid rounded  " alt="...">
				</div>
			</div>
			<div class="col-4 pr-1">
				<p class="mb-0">No Ternak</p>
			</div>
			<div class="col-4 pr-0 pl-1">
				<p class="mb-0">: <?= $value->no_ternak ?></p>
					<p class="mb-0 success"> <?= $j = $value->status == 1 ? "Terjual" : "Meninggal" ?> <i class="fas fa-check "></i></p>
			</div>
		</div>
</a>
		
<?php
	} ?>
<?php
}else{
	?>
<div class="row text-center">
<div class="col-12">
	<b>
	<h6>Belum ada data yang ditambahkan</h6>
	</b>
</div>
</div>
	<?php
}
	?>
	</div>
</div>


<!-- <p class="mb-0"> <?= $value->ket ?></p> -->
			