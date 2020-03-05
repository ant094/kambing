<div style="margin-top: 32px; margin-bottom: 25px; " id='top'><br></div>
<div class="row pb-1 " style="margin-top: -16px;">
	<div class="col-4  ml-2 pr-2 mr-3">

		<a href="<?= base_url('laporan_kambing/'); ?>" target="_blank" style="text-decoration: none;">
			<button class="btn  btn-success btn-block print" type="submit" style="font-size: 12px;">
				<i class="fas fa-file-invoice" style="font-size: 16px;"></i>
				<b>
					Print
				</b>
			</button>
		</a>
	</div>
	<input type="hidden" name="" value="<?= $no_ternak ?>" id="noTernak">
	<div class="offset-2  col-5">
		<div class="custom-control custom-switch ">
			<input type="checkbox" class="custom-control-input check customSwitchesA" id="customSwitches">
			<label class="custom-control-label" for="customSwitches" style="font-size: 10px;"><span id='title'></span></label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-10 " style="font-family: 'Bree Serif', serif; ">
		<a href="<?= base_url('M_catatan_pertumbuhan/overview/') . $no_ternak; ?>" style="text-decoration: none;">
			<button class="btn btn-sm btn-primary" style="	border-bottom-right-radius: 20px;
	border-top-right-radius: 20px;"><i class="fas fa-book"> Catat Berat</i></button>
		</a>
	</div>
</div>
<div class="table-responsive">
	<table class="table mb-0">
		<!-- <caption>List of users</caption> -->
		<thead>
			<tr style=" font-size: 11px;" class="text-center">
				<th scope="col">Bulan</th>
				<th scope="col">Berat </th>
				<th scope="col">Target</th>
				<th scope="col">Kes</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody id="berat">
			<?php
			$c_berat = 1;
			if ($informasi) {
				foreach ($informasi as $key => $value) {
			?>
					<tr style="font-size: 11px; text-align: center;" id="hBerat<?= $c_berat ?>">
						<td><?= $value->bulan_ke; ?></td>
						<td><?= $value->nilai_awal; ?> Kg</td>
						<td><?= $value->nilai_target = $value->nilai_target ? $value->nilai_target . " Kg" : "<i class=\"fas fa-minus\"></i>"; ?> </td>
						<td><a href="<?= base_url('home/detail_informasi/') . $value->bulan_ke . "/" . $no_ternak; ?>">
								<!-- <button class="btn btn-success">Detail</button> -->
								Detail
							</a></td>
					</tr>
					<input type="hidden" name="" value="0" id="nilaiCatatBerat">
					<input type="hidden" name="" value="1" id="nilaiTengahCatatBerat">
					<input type="hidden" name="" value="<?= $jumlah_catat_berat=$jumlah_catat_berat-1; ?>" id="jumlahCatatBerat">
				<?php
					$c_berat++;
				}
			} else {
				?>
				<tr style="font-size: 12px; text-align: center;">
					<td colspan="6"><b>Catatan Masih Kosong</b></td>
				<?php
			}
				?>
		</tbody>
	</table>
</div>

<div class="row mb-0">
	<div class="offset-8 col-4 mr-1">
		<nav aria-label="...">
			<ul class="pagination pagination-sm mb-0">
				<li id="berKiri" class="page-item"><a class="page-link">
						<i class="fas fa-caret-left"></i>
					</a></li>
				</li>
				<li class="page-item"><a class="page-link" id="nilaiCenterCatatBerat"><?= $nilai_tengah_kesehatan ?></a></li>
				<li id="berKanan" class="page-item"><a class="page-link""><i class=" fas fa-caret-right"></i>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>

<!-- <div class="row">
	<div class="col-8 " style="font-family: 'Bree Serif', serif; ">
		<a href="<?= base_url('M_cek_kesehatan/cek/') . $no_ternak; ?>" style="text-decoration: none;">
			<button class="btn btn-sm btn-primary" style="	border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;"><i class="fas fa-notes-medical"> Cek Kesehatan</i></button>
		</a>
	</div>
	
</!--> 
<!-- CEK KESEHATAN -->
<!-- <div class="table-responsive">
	<table class="table mb-0">
		<thead>
			<tr style=" font-size: 11px;" class="text-center">
				<th scope="col">Tgl</th>
				<th scope="col" colspan="2">Keterangan</th>
				<th scope="col">Kesehatan</th>
			</tr>
		</thead>
		<tbody id="hasilKes">
			<?php
			$kes = 1;
			if ($cek_kesehatan) {
				foreach ($cek_kesehatan as $kesehatan) {
			?>
					<tr style="font-size: 12px; text-align: center; font-family: monospace; " id="pKes<?= $kes ?>">
						<td class="pl-0 pr-0">

							<?php
							$a = $kesehatan->tgl_cek_kesehatan;
							$a = explode("-", $a);
							$b = $a[2] . '/' . $a[1] . '/' . $a[0];
							echo $b;

							?>
						</td>
						<td class="pl-0 pr-0" colspan="2">
							<?= $kesehatan->kesehatan ?>
						</td>
						<td class="pl-0 pr-0"><a href="<?= base_url('home/detail_informasi/') . $value->bulan_ke . "/" . $no_ternak; ?>">
								<?= $kesehatan = $kesehatan->kesehatan == "Sehat" ? "<i class=\"fas fa-check\" style=\" font-size: 14px;\"></i>" : "<i class=\"fas fa-times\" style=\"color: red; font-size: 14px;\"></i>"  ?>
							</a></td>
					</tr>


					<input type="hidden" name="" value="<?= $nilai_kesehatan ?>" id="nilaiKesehatan">
					<input type="hidden" name="" value="<?= $nilai_tengah_kesehatan ?>" id="nilaiTengahKesehatan">
					<input type="hidden" name="" value="<?= $jumlah_kesehatan ?>" id="jumlahKesehatan">

				<?php
					$kes++;
				}
			} else {
				?>
				<tr style="font-size: 12px; text-align: center;">
					<td colspan="6"><b>Catatan Masih Kosong</b></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div> -->


<!-- 
<div class="row  mt-0">
	<div class="offset-8 col-4 mr-1">
		<nav aria-label="...">
			<ul class="pagination pagination-sm mb-0">

				<li id="kesKiri" class="page-item disabled  "><a class="page-link">
						<i class="fas fa-caret-left"></i>
					</a></li>
				</li>

				<li class="page-item"><a class="page-link" id="nilaiCenterKesehatan"> <?= $nilai_tengah_kesehatan ?> </a></li>

				<li id="kesKanan" class="page-item"><a class="page-link"><i class="fas fa-caret-right"></i>

					</a>
				</li>
			</ul>
		</nav>
	</div>
</div> -->



<div class="row">
	<div class="col-10 " style="font-family: 'Bree Serif', serif; ">
		<a href="<?= base_url('M_sistem_pakar/cari_gejala/') . $no_ternak; ?>" style="text-decoration: none;">
			<button class="btn btn-sm btn-primary" style="	border-bottom-right-radius: 20px;
	border-top-right-radius: 20px;"><i class="fas fa-user-md"> Sistem Pakar</i></button>
		</a>
	</div>
</div>

<div class="table-responsive">
	<table class="table mb-0">
		<!-- <caption>List of users</caption> -->
		<thead>
			<tr style=" font-size: 11px;" class="text-center">
				<th scope="col">Tgl</th>
				<th scope="col" colspan="2">Keterangan</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody id="hasilPakar">
			<?php
			$pakar_sistem = 1;
							// print_r($pakar);
							// die();
			if ($pakar) {
				foreach ($pakar as $pakar) {
			?>
					<tr style="font-size: 12px; text-align: center; font-family: monospace;" id="pPakar<?= $pakar_sistem ?>">
						<td class="pl-0 pr-0">

							<?php
							$a = $pakar['tgl_pencatatan'];
							$a = explode("-", $a);
							$b = $a[2] . '/' . $a[1] . '/' . $a[0];
							echo $b;

							?>
						</td>
						<td class="pl-0 pr-0" colspan="2">
							<?= $pakar['nm_penyakit'] ?>
							
						</td>
						<td class="pl-0 pr-0">

							<?php
							if ($pakar['nm_penyakit'] == 'Hubungi Dokter') {
								// $id_penyakit = "P" . $pakar['id_penyakit'];
								// $id_user 	 = $pakar['id_user'];

								if ($pakar['id_hubungi_dokter'] != 0) {
							?>
									<a href="<?= base_url('home/overview_sistem_pakar/') . $pakar['id_hubungi_dokter'] . "/" . $no_ternak . "/hb"; ?>" style=" font-size: 10px;">Review</a>
								<?php
								} else {
								?>
									<button class="btn btn-sm-block btn-info pr-1 pl-1 pt-1 pb-1" style="font-size: 10px;" data-toggle="modal" data-target="#exampleModalTambah">Tambah</button>
								<?php
								}
								?>

							<?php
							} else {
							?>
								<a href="<?= base_url('home/overview_sistem_pakar/') . $pakar['kunci'] . "/" . $no_ternak; ?>" style=" font-size: 10px;">Review</a>
							<?php
							}

							?>
							<!-- </a> -->
						</td>
					</tr>
					<input type="hidden" name="" value="0" id="nilaiSistemPakar">
					<input type="hidden" name="" value="1" id="nilaiTengahSistemPakar">
					<input type="hidden" name="" value="<?= $jumlah_pakar ?>" id="jumlahSistemPakar">
				<?php
					$pakar_sistem++;
				}
			} else {
				?>
				<tr style="font-size: 12px; text-align: center;">
					<td colspan="6"><b>Catatan Masih Kosong</b></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<div class="row mb-4 mt-0">
	<div class="offset-8 col-4 mr-1">
		<nav aria-label="...">
			<ul class="pagination pagination-sm mb-0">
				<li class="page-item"><a class="page-link" id="pakarKiri">
						<i class="fas fa-caret-left"></i>
					</a></li>
				</li>
				<li class="page-item"><a class="page-link" id="nilaiCenterSistemPakar"><?= $nilai_tengah_kesehatan ?></a></li>
				<li class="page-item"><a class="page-link" id="pakarKanan"><i class="fas fa-caret-right"></i>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>

<!-- Modal -->
<div class="modal fade mt-5" id="exampleModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body p-2">

				<form action="<?= base_url('home/tambah_hubungi_dokter/') . $no_ternak . "/" ."P26" . "/" . $id_user ?>" method="post">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Penyakit:</label>
						<input type="text" class="form-control" id="recipient-name" name="penyakit">
					</div>
					<div class="form-group">
						<label for="message-text" class="col-form-label">Catatan:</label>
						<textarea class="form-control" id="message-text" cols="60" rows="5" name="catatan"></textarea>
					</div>

			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
				<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
if ($check == "tambah" and $check2 == "kesehatan") {
?>
	<script>
		swal("Data Kesehatan!", "Telah Ditambahkan!", "success");
	</script>
<?php
}
?>
<?php
if ($check == "tambah" and $check2 == "penyakit") {
?>
	<script>
		swal("Data Penyakit!", "Telah Ditambahkan!", "success");
	</script>
<?php
}
?>
<?php
if ($check == "tambah" and $check2 == "berat") {
?>
	<script>
		swal("Data Berat!", "Telah Ditambahkan!", "success");
	</script>
<?php
}
?>
<?php
if ($check == "tambah" and $check2 == "target") {
?>
	<script>
		swal("Data Target Berat!", "Telah Ditambahkan!", "success");
	</script>
<?php
}
?>
<?php
if ($check == "tambah" and $check2 == "kambing") {
?>
	<script>
		swal("Data Kambing Baru!", "Telah Ditambahkan!", "success");
	</script>
<?php
}
?>
