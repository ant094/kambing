<div class="row" style="margin-top: 68px;" ></div>

<?php
	if ($KM) {
	?>
<div class="row" >
	<div class="col-10 " style="font-family: 'Bree Serif', serif; ">
			<button class="btn btn-sm btn-primary" style="	border-bottom-right-radius: 20px;
	border-top-right-radius: 20px;"><i class="fas fa-book"> Kambing Muda</i></button>
	</div>
</div>
<div class="table-responsive">
	<table class="table mb-0">
		<!-- <caption>List of users</caption> -->
		<thead>
			<tr style=" font-size: 11px;" class="text-center">
				<th scope="col">No</th>
				<th scope="col">No Ternak</th>
				<th scope="col">Berat</th>
				<th scope="col">PBBH</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody id="berat">
			<?php
			$no= 1;
				for ($i=0; $i <count($KM); $i++) { 
			?>
					<tr style="font-size: 11px; text-align: center;" id="hBerat">
						<td><?= $no?></td>
						<td><?= $KM[$i]  ?> Kg</td>
						<td><?= $KM2[$i]." Kg";  ?> </td>
						<td><?= $KM3[$i]." Kg";  ?> </td>
						<td><a href="<?= base_url('home/overview_kambing/').$KM[$i]   ?>">
								Detail
							</a></td>
					</tr>
					<input type="hidden" name="" value="0" id="nilaiCatatBerat">
					<input type="hidden" name="" value="1" id="nilaiTengahCatatBerat">
					<input type="hidden" name="" value="" id="jumlahCatatBerat">
				<?php
					$no++;
			} ?>
			
		</tbody>
	</table>
</div>
<?php
	}	
	
	if ($P) {
	?>
<div class="row"  >
	<div class="col-10 " style="font-family: 'Bree Serif', serif; ">
			<button class="btn btn-sm btn-primary" style="	border-bottom-right-radius: 20px;
	border-top-right-radius: 20px;"><i class="fas fa-book"> Pejantan</i></button>
	</div>
</div>
<div class="table-responsive">
	<table class="table mb-0">
		<!-- <caption>List of users</caption> -->
		<thead>
			<tr style=" font-size: 11px;" class="text-center">
				<th scope="col">No</th>
				<th scope="col">No Ternak</th>
				<th scope="col">Berat</th>
				<th scope="col">PBBH</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody id="berat">
			<?php
			$no= 1;
		
				for ($i=0; $i <count($P); $i++) { 
			?>
					<tr style="font-size: 11px; text-align: center;" id="hBerat">
						<td><?= $no?></td>
						<td><?= $P[$i]  ?> Kg</td>
						<td><?= $P2[$i]." Kg";  ?> </td>
						<td><?= $P3[$i]." Kg";  ?> </td>
						<td><a href="<?= base_url('home/overview_kambing/').$P[$i]   ?>">
								Detail
							</a></td>
					</tr>
					<input type="hidden" name="" value="0" id="nilaiCatatBerat">
					<input type="hidden" name="" value="1" id="nilaiTengahCatatBerat">
					<input type="hidden" name="" value="" id="jumlahCatatBerat">
				<?php
					$no++;
				
			} ?>
		</tbody>
	</table>
</div>
<?php
	}
	?>


<?php if ($BD) { ?>
<div class="row"  >
	<div class="col-10 " style="font-family: 'Bree Serif', serif; ">
			<button class="btn btn-sm btn-primary" style="	border-bottom-right-radius: 20px;
	border-top-right-radius: 20px;"><i class="fas fa-book"> Pejantan</i></button>
	</div>
</div>
<div class="table-responsive">
	<table class="table mb-0">
		<!-- <caption>List of users</caption> -->
		<thead>
			<tr style=" font-size: 11px;" class="text-center">
				<th scope="col">No</th>
				<th scope="col">No Ternak</th>
				<th scope="col">Berat</th>
				<th scope="col">PBBH</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody id="berat">
			<?php
			$no= 1;
			
				for ($i=0; $i <count($BD); $i++) { 
			?>
					<tr style="font-size: 11px; text-align: center;" id="hBerat">
						<td><?= $no?></td>
						<td><?= $BD[$i]  ?> Kg</td>
						<td><?= $BD2[$i]." Kg";  ?> </td>
						<td><?= $BD3[$i]." Kg";  ?> </td>
						<td><a href="<?= base_url('home/overview_kambing/').$BD[$i]   ?>">
								Detail
							</a></td>
					</tr>
					<input type="hidden" name="" value="0" id="nilaiCatatBerat">
					<input type="hidden" name="" value="1" id="nilaiTengahCatatBerat">
					<input type="hidden" name="" value="" id="jumlahCatatBerat">
				<?php
					$no++;
			} ?>
		</tbody>
	</table>
</div>
<?php
	}
	?>

<?php if ($BM) { ?>
<div class="row"  >
	<div class="col-10 " style="font-family: 'Bree Serif', serif; ">
			<button class="btn btn-sm btn-primary" style="	border-bottom-right-radius: 20px;
	border-top-right-radius: 20px;"><i class="fas fa-book"> Kambing Menyusui</i></button>
	</div>
</div>
<div class="table-responsive">
	<table class="table mb-0">
		<!-- <caption>List of users</caption> -->
		<thead>
			<tr style=" font-size: 11px;" class="text-center">
				<th scope="col">No</th>
				<th scope="col">No Ternak</th>
				<th scope="col">Berat</th>
				<th scope="col">PBBH</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody id="berat">
			<?php
			$no= 1;
			
				for ($i=0; $i <count($BM); $i++) { 
			?>
					<tr style="font-size: 11px; text-align: center;" id="hBerat">
						<td><?= $no?></td>
						<td><?= $BM[$i]  ?> Kg</td>
						<td><?= $BM2[$i]." Kg";  ?> </td>
						<td><?= $BM3[$i]." Kg";  ?> </td>
						<td><a href="<?= base_url('home/overview_kambing/').$BM[$i]   ?>">
								Detail
							</a></td>
					</tr>
					<input type="hidden" name="" value="0" id="nilaiCatatBerat">
					<input type="hidden" name="" value="1" id="nilaiTengahCatatBerat">
					<input type="hidden" name="" value="" id="jumlahCatatBerat">
				<?php
					$no++;
			} ?>
		</tbody>
	</table>
</div>
<?php
	}
	?>

	<?php if ($BH) { ?>
<div class="row"  >
	<div class="col-10 " style="font-family: 'Bree Serif', serif; ">
			<button class="btn btn-sm btn-primary" style="	border-bottom-right-radius: 20px;
	border-top-right-radius: 20px;"><i class="fas fa-book"> Kambing Bunting</i></button>
	</div>
</div>
<div class="table-responsive">
	<table class="table mb-0">
		<!-- <caption>List of users</caption> -->
		<thead>
			<tr style=" font-size: 11px;" class="text-center">
				<th scope="col">No</th>
				<th scope="col">No Ternak</th>
				<th scope="col">Berat</th>
				<th scope="col">PBBH</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody id="berat">
			<?php
			$no= 1;
			
				for ($i=0; $i <count($BM); $i++) { 
			?>
					<tr style="font-size: 11px; text-align: center;" id="hBerat">
						<td><?= $no?></td>
						<td><?= $BH[$i]  ?> Kg</td>
						<td><?= $BH2[$i]." Kg";  ?> </td>
						<td><?= $BH3[$i]." Kg";  ?> </td>
						<td><a href="<?= base_url('home/overview_kambing/').$BH[$i]   ?>">
								Detail
							</a></td>
					</tr>
					<input type="hidden" name="" value="0" id="nilaiCatatBerat">
					<input type="hidden" name="" value="1" id="nilaiTengahCatatBerat">
					<input type="hidden" name="" value="" id="jumlahCatatBerat">
				<?php
					$no++;
			} ?>
		</tbody>
	</table>
</div>
<?php
	}
	?>

<div class="row " style="margin-bottom: 100px;" ></div>