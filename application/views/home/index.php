<nav style="background: #2196f3cc;    border-bottom-right-radius: 45px;
    border-bottom-left-radius: 45px; height: 160px;">

	<nav class="navbar fixed-top navbar-light" style="    padding-bottom: 5px;
    padding-top: 5px;    background: #4dabf5;">
		<div class="row pt-2 pl-0 pr-0">
			<div class="col-1 pl-1  ">
				<button class="btn " style=" margin-top: -5px;"><i class=" fas  fa-user-circle " style=" font-size: 20px; color: #FFFFFF;" data-toggle="modal" data-target="#exampleModal"></i></button>
			</div>
			<div class="offset-1 col-8">
				<i><b style="font-size: 20px; color: #FFFFFF; margin-left: -5px; font-family: 'Shadows Into Light', cursive;">SiPakar Kambing </b></i>
			</div>
			<div class=" col-1  ">
				<button class="btn" style=" margin-top: -5px; margin-left: 30px;">
					<!-- <i class="fas fa-bell float-right" style=" font-size: 20px; color: #FFFFFF;"></i> -->
				</button>
			</div>
		</div>
	</nav>
</nav>

<div class="row  " style="    margin-top: -115px;">
	<div class="col-10 rounded-sm offset-1  " style="background: #ffffff; border-bottom: #c5c4c4 solid 1px; box-shadow: #c5c4c4 1px 1px 1px; margin-top:58px; ">

		<div class="row  pb-0" style="    border-bottom-right-radius: 45px;
    border-bottom-left-radius: 45px;  font-size: 10px; color: #2196f3f2">
			<div class=" col-3 text-center pr-0">
				<a href=" <?= base_url("dashboard/index") ?>" style="text-decoration: none;">
					<button class="btn">
						<i class="fas fa-tachometer-alt " style="color: #2196f3f2; font-size: 30px;"></i>
						<p class="mb-0" style="  font-size: 10px; color: #2196f3f2;"><b class="">Dashboard</b></span>
							<!-- <span class=" ml-4" style="line-height: 0px; font-size: 16px;"><b>/Mati</b></span> -->
					</button>
				</a>
			</div>
			<div class="col-6 text-center pr-0 pl-0">
				<a href="<?= base_url('Crud_kambing/tambah') ?>" style="text-decoration: none;">
					<button class="btn">
						<i class="fas fa-plus-circle " style="color: #2196f3f2;  font-size: 30px; "></i>
						<p class="mb-0" style="  font-size: 10px; color: #2196f3f2;"><b>Tambah Kambing</b></span>
					</button>
				</a>
				
			</div>
			<div class="pl-0 col-3 text-center">
				<a href="<?= base_url('home/history') ?>" style="text-decoration: none;">
					<button class="btn">
						<i class="fas fa-book-dead " style="color: #2196f3f2; font-size: 30px;"></i>
						<p class="mb-0" style="  font-size: 10px; color: #2196f3f2;"><b class="">Riwayat</b></span>
							<!-- <span class=" ml-4" style="line-height: 0px; font-size: 16px;"><b>/Mati</b></span> -->
					</button>
				</a>
			</div>
		</div>
	</div>
</div>


<!-- <i class="fas fa-grip-lines"></i>
<i class="fas fa-grip-vertical"></i> -->
<div class="row">
	<div class="col-11 pt-2 pl-4 mb-1">
		<b style="font-size: 18px; color: #2196f3f2;  font-family: serif;"> Daftar Kambing</b>
	</div>
</div>

<div class="row " style=" margin-bottom: 80px;">
	<?php
	if ($kambing) {
		$jml = count($kambing);
		for ($i = 1; $i <= $jml; $i++) {
	?>
			<?php
			if ($i % 2) {
			?>
				<div class=" offset-1 col-5 mb-1 mr-1 p-0 rounded text-center" style="border: #c5c4c4 solid 1px; box-shadow: #c5c4c4 1px 1px 4px;">
					<button class="btn p-0" style="    border: 0px;">
						<a href="<?= site_url('home/overview_kambing/') . $kambing[$i]; ?>" style="text-decoration: none;">
							<img src="<?= base_url('Asset/') ?>upload/kambing/<?= $gambar[$i]; ?>" alt="" class="img-fluid rounded pb-1" style="height: 125px;">
							<p class=" text-center " style="font-size: 12px; font-family: monospace; margin-bottom: 10px;"> <b>No. Ternak: <?= $kambing[$i]; ?></b></p>
						</a>
					</button>
				</div>
			<?php
			} else {
			?>

				<div class="  col-5  p-0 mb-1 rounded text-center" style="border: #c5c4c4 solid 1px; box-shadow: #c5c4c4 1px 1px 4px;  ">
					<button class="btn p-0" style="    border: 0px;">
						<a href="<?= site_url('home/overview_kambing/') . $kambing[$i] ?>" style="text-decoration: none;">
							<img src="<?= base_url('Asset/') ?>upload/kambing/<?= $gambar[$i]; ?>" alt="" class="img-fluid rounded pb-1" style="height: 125px;">
							<p class=" text-center " style="font-size: 12px; font-family: monospace; margin-bottom: 10px;"> <b>No. Ternak: <?= $kambing[$i] ?></b></p>
						</a>
					</button>
				</div>
			<?php
			}
			?>
		<?php
		}
	} else {
		?>
		<div class="offset-1 col-10 text-center mt-5" style="font-family: monospace; font-size: 17px;">
			<b class="text-center">
				Belom Ada Data
			</b>
			<b class="text-center">
				yang Ditambahkan
			</b>
		</div>
	<?php
	}
	?>
</div>


<!-- <?php
		if ($no_ternak2 != " ") {
		?>
	<div id="myModal_delete" class="modal fade  mt-5" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
<div class="modal-content">
	div class="modal-header">
	class="modal-title" style="font-size: 15px; font-family: monospace;">#Hapus kambing Sukses</h4>
	utton type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body" style="font-size: 12px; font-family: monospace;">
	<p>
		formasi Kambing
		b> <span style="color: red;"><?= $no_ternak2; ?> </span></b>
		ah dihapus
	</p>
</div>
div class="modal-footer">
button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
</div>
</div>

</div>
</div>
<?php
		}
?> -->

<!-- Modal -->
<div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content " style="font-size: 14px; font-family: monospace; ">
			<div class="modal-header ">
				<h5 class="modal-title" id="exampleModalLabel">Pengaturan User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 1.2em;">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center" style="font-size: 20px; font-family: serif;">
				<div class="row">
					<div class="col-4">
						<i class=" fas  fa-user-circle " style=" font-size: 70px; color: var(--gray);"></i>
					</div>
					<div class="col-8 pl-0 pt-2" style="text-align: left; font-size: 20px; font-family: serif;">
						<?php
						$user_pemilik =	$user->nama_pemilik;
						$user_pemilik = ucwords($user_pemilik);

						?>
						<p class="mb-0"> <?= $user_pemilik ?></p>
						<p class="mb-0 text-muted" style="font-size: 14px; font-family: serif;"><?= $user->email ?></p>
					</div>
				</div>
				<hr>
				<!-- <a style="text-decoration: none;" href="<?= base_url("dashboard/index") ?>">
					<div class="row">
						<div class="col-2">
							<i class="fas fa-tachometer-alt pl-1" style="font-size: 1.5em;  color: var(--gray); "></i>
						</div>
						<div class="col-10" style="text-align: left; font-size: 19px; font-family: serif;  color: black;">
							<p class="mb-0"> Dashboard</p>
							<hr class="m-1">
						</div>
					</div>
				</a> -->

				<!-- <a style="text-decoration: none;" href="<?= base_url("login/about") ?>">
					<div class="row">
						<div class="col-2">
							<i class="fas fa-info-circle pl-1" style="font-size: 1.5em;  color: var(--gray); "></i>
						</div>
						<div class="col-10" style="text-align: left; font-size: 19px; font-family: serif;  color: black;">
							<p class="mb-0"> Tentang SiKambing</p>
							<hr class="m-1">
						</div>
					</div>
				</a> -->

				<a style="text-decoration: none;" href="<?= base_url("login/bantuan") ?>">
					<div class="row">
						<div class="col-2">
							<span class="fa-stack fa-4x" style="font-size: 0.8em;  color: var(--gray); ">
								<i class="fas fa-square fa-stack-2x"></i>
								<i class="fas fa-comment-alt fa-stack-1x " style="color: #FFFFFF;"></i>
							</span>
						</div>

						<div class="col-10" style="text-align: left; font-size: 19px; font-family: serif; color: black; ">
							<p class="mb-0"> Bantuan</p>
							<hr class="m-1">
						</div>
					</div>
				</a>

				<p class="text-muted mb-0" style=" font-size: 14px; font-family: serif;">
					SiKambing v.0.1
				</p>
			</div>
			<div class="modal-footer">
				<div class="col-12 p-0">
					<a href="<?= base_url("login/logout") ?>" style="text-decoration: none;">
						<button type="button" class="btn btn-danger btn-block">Log Out<i class="fas fa-door-open"></i></button>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
