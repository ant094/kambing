<div id='informasi' style="font-size: 12px; font-family: monospace; ">
	<div class="row pb-2" style=" border-bottom: 1px solid #cecdcd; ">
		<div class="col-12 pl-0 pr-0 pt-0 text-center">
			<img src="<?= base_url('Asset/'); ?>upload/kambing/<?= $nama_gambar ?>" class="rounded img-fluid " alt="...">
		</div>
	</div>

	<div class="row pt-1">
		<b>
			Informasi
		</b>
	</div>


	<div class="row">
		<div class="col-6">
			No Ternak
		</div>
		<div class="col-6">
			: <?= $no_ternak; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			No Pejantan
		</div>
		<div class="col-6">
			: <?= $no_pejantan = $no_pejantan == "" ? "<i class=\"fas fa-minus\"></i>" : $no_pejantan; ?>
		</div>
	</div>
	<div class="row ">
		<div class="col-6">
			No Induk
		</div>
		<div class="col-6">
			: <?= $no_induk = $no_induk == "" ? "<i class=\"fas fa-minus\"></i>" : $no_induk; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			Jenis Kelamin
		</div>
		<div class="col-6">
			<?php
			switch ($jenis_kelamin) {
				case 'P':
					$jenis_kelamin = "Pejantan";
					break;

				case 'B':
					$jenis_kelamin = "Betina";
					break;
			}
			?>
				: <?= $jenis_kelamin; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			Tanggal Lahir
		</div>
		<div class="col-6">
			: <?= $tgl_lahir; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			Telinga
		</div>
		<div class="col-6">
			: <?= $telinga; ?>
		</div>
	</div>
	<div class="row pb-1">
		<div class="col-6">
			Pola Warna
		</div>
		<div class="col-6">
			: <?= $warna; ?>
		</div>
	</div>
</div>

<div class="row pl-0 pr-0">
	<div class=" col-4">
	<a href="<?= base_url('home/akhir/terjual/') . $no_ternak . "/"  . $id_user ?> ">
		<button class="btn btn-sm btn-success "   type="button" >
			<i class="fas fa-check" style="font-size: 13px;">Jual</i>
		</button>
		</a>
	</div>

	<div class=" col-4 pl-2 ">
		<a href="<?= base_url('home/akhir/Meninggal/') . $no_ternak . "/"  . $id_user ?> ">
		<button class="btn btn-sm btn-success "   type="button" >
			<i class="fas fa-check" style="font-size: 13px;">Meninggal</i>
		</button>
		</a>
	</div>

	<div class=" col-4 ">
		<button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#exampleModal">
			<i class="fas fa-trash" style="font-size: 13px;">Hapus</i>
		</button>
	</div>
</div>
<!-- Modal -->
<div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">#Delete</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="font-size: 13px;">
				Anda Yakin Akan Menghapus Informasi Kambing <?= $no_ternak; ?>?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<a href="<?= base_url('home/delete/') . $no_ternak; ?>">
					<button type="button" class="btn btn-primary">Ya, Hapus</button>
				</a>
			</div>
		</div>
	</div>
</div>

