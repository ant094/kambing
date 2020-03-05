<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="" style="margin-top: 65px;"></div>

<b>
<p>Analisa Pertumbuhan</p>
</b>
</span>
<canvas id="myChart" width="400" height="400"></canvas>

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Kelompok</th>
				<th scope="col">Pertumbuhan</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($km) { ?>
				<tr>
					<td>Kambing Muda</td>
					<td> <?= $km ?>/hari</td>
				</tr>
			<?php } ?>
			<?php if ($p) { ?>
				<tr>
					<td>Pejantan</td>
					<td> <?= $p ?>/hari</td>
				</tr>
			<?php } ?>
			<?php if ($bd) { ?>
				<tr>
					<td>Betina Dewasa</td>
					<td><?= $bd ?>/hari</td>
				</tr>
			<?php } ?>
			<?php if ($bh) { ?>
				<tr>
					<td>Betina Bunting</td>
					<td><?= $bh ?>/hari</td>
				</tr>
			<?php } ?>
			<?php if ($bm) { ?>
				<tr>
					<td>Betina Menyusui</td>
					<td><?= $bm ?>/hari</td>
				</tr>
			<?php } ?>
			<tr>
				<td colspan="2">
					<a href="<?= base_url("dashboard/detail_analisa_pertumbuhan") ?>">
						<button class="btn btn-success btn-block">Detail</button>
					</a>


					
				</td>
			</tr>
		</tbody>
	</table>
</div>
<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Kambing Muda', 'Pejantan', 'Betina Dewasa', 'Betina Bunting', 'Betina Menyusui'],
			datasets: [{
				label: 'Pertumbuhan',
				data: [2, 3, 1, 1, 2],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>

<div class="row">
	<div class="col-12">
		<b>
			<p class="m-0">Analisa Penyakit</p>
		</b>
	</div>
</div>

<div class="row pb-1 pt-1" style="margin-top: -16px;">
	<input type="hidden" name="" value="" id="noTernak">
	<div class="offset-7  col-5">
		<div class="custom-control custom-switch ">
			<input type="checkbox" class="custom-control-input check customSwitches dash" id="customSwitches">
			<label class="custom-control-label" for="customSwitches" style="font-size: 10px;"><span>Tampilkan Atur Tgl</span></label>
		</div>
	</div>
</div>
<div class="" id="khususA">
	<form action="<?= base_url('dashboard/tentukan_batas') ?>" method="post" class="">
		<div class="row pl-2 pr-2 pt-1 pb-1" id="form">
			<div class="col-4">
				<select name="tahun" id="tahunA" class="custom-select custom-select-sm">
					<option selected>Tahun</option>
					<?php 
				
					for ($i=0; $i < count($tahun) ; $i++) { 
					?>
					<option value="<?= $tahun[$i] ?>"><?= $tahun[$i] ?></option>
					<?php 
					}
					?>
				</select>
			</div>
			<div class="col-5 pl-0">
				<select name="bulan" id="pilihA" class="custom-select custom-select-sm" disabled>
					<option selected>Bulan</option>
				<?php 
				$A=1;
					for ($i=0; $i < count($bulan) ; $i++) { 
					?>
					<option value="<?= $A; ?>"><?= $bulan[$i] ?></option>
					<?php 
					}
					?>
				</select>
			</div>
			<div class="col-3 pl-1">
				<select  name="tgl" id="pilihAB" class="custom-select custom-select-sm" disabled>
					<option selected>Tgl</option>
				<?php 
					for ($i=1; $i < 32 ; $i++) { 
					?>
					<option value="<?= $i; ?>"><?= $i ?></option>
					<?php 
					}
					?>
				</select>
			</div>
		</div>
		<div class="row pl-2 pr-2 pt-1 pb-1" id="form">
			<div class="col-4">
				<select name="tahun1" id="tahunB" class="custom-select custom-select-sm">
					<option selected>Tahun</option>
					<?php 
				
					for ($i=0; $i < count($tahun) ; $i++) { 
					?>
					<option value="<?= $tahun[$i] ?>"><?= $tahun[$i] ?></option>
					<?php 
					}
					?>
				</select>
			</div>
			<div class="col-5 pl-0">
				<select name="bulan1" id="pilihBB" class="custom-select custom-select-sm" disabled>
					<option selected>Bulan</option>
				<?php 
				$A=1;
					for ($i=0; $i < count($bulan) ; $i++) { 
					?>
					<option value="<?= $A; ?>"><?= $bulan[$i] ?></option>
					<?php
								$A++;
					}
					?>
				</select>
			</div>
			<div class="col-3 pl-1">
				<select name="tgl1" id="pilihBBB" class="custom-select custom-select-sm" disabled>
					<option selected>Tgl</option>
				<?php 
					for ($i=1; $i < 32 ; $i++) { 
					?>
					<option value="<?= $i; ?>"><?= $i ?></option>
					<?php 
					}
					?>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="offset-8 col-4">
				<input type="submit" class="btn btn-success btn-sm" value="Submit">
			</div>
		</div>
	</form>
</div>

<p class="text-center m-0 mb-2"><?= $tgl?>
</p>
<?php
if ($reset) {
	# code...
?>
	<p class="text-center"><a href="<?= base_url('dashboard/index') ?>"><i class="fas fa-redo-alt"></i> Reset</a>
	</p>
<?php
}

?>
<!-- <b> -->
	<?php 
	if (count($count) != 0 ) {
		
	?>
<canvas id="myChart2" width="400" height="400"></canvas>

	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Penyakit</th>
					<th scope="col">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php
				for ($i = 0; $i < count($count); $i++) {
				?>
					<tr>
						<td><?= $count[$i][0]  ?></td>
						<td><?= $count[$i][1]  ?></td>
					</tr>
				<?php }	?>
				<tr>
					<td colspan="2">
						<a href="<?= base_url('dashboard/detail_penyakit') ?>">
							<button class="btn btn-success btn-block">Detail</button>
						</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<script>
		var ctx = document.getElementById('myChart2').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: [<?php for ($i = 0; $i < count($count); $i++) {
								echo '"' . $count[$i][0] . '"' . ', ';
							}  ?>],
				datasets: [{
					label: 'Pertumbuhan',
					data: [<?php for ($i = 0; $i < count($count); $i++) {
								echo $count[$i][1] . ', ';
							}  ?>],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>
	
	<?php
	}else{
		?>
		<div class="row text-center mb-5">
		<div class="col-12">
		<b><p>Data Tidak Ditemukan</p></b>
		</div>
		</div>
		<?php
		
	}
	?>
