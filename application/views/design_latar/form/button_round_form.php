<!-- SUbmit Form -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Masa Penjualan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="font-size: 13px; font-family: inherit; text-align: center;">
				"Masa Penjualan adalah dimana usia kambing sudah siap untuk dipasarkan"
				<hr>
				namun untuk mendapatkan keuntungan yang tinggi
				anda dapat mengikuti program penggemukkan kambing agar harga jual kambing anda semakin tinggi.
				<hr>
				Terima kasih :V
			</div>
			<div class="modal-footer">
<form action=" <?= $simpan2; ?>" method="post">
					<input type="submit" value="Tidak, Terima Kasih" name="submit" id="" class="btn btn-secondary" style="font-size: 13px;" >
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 13px;"><b></b></button> -->
				</form>

				<a href="<?= $simpan ?>">
					<button type="button" class="btn btn-success" style="font-size: 13px;"><b>Ok, Setuju</b></button>
				</a>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade mt-4" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Control Pertumbuhan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="font-size: 13px; font-family: inherit; text-align: center;">
				<blockquote class="blockquote text-center">
					<p class="mb-0" style="font-size: 11px;">"Keberhasilan dalam beternak kambing dapat diukur dari seberapa rajin dan teliti peternak kambing dalam mencatat data produksinya"</p>
					<footer class="blockquote-footer" style="font-size: 11px;"><cite title="Source Title">SiKambing 2K19</cite></footer>
				</blockquote>
				<hr>
				Tentukan Target berat sehat kambing berikutnya untuk
				kambing usia <?= $nilai_akhir ?> Bulan
			</div>
			<div class="modal-footer">
				<form action=" <?= $simpan2; ?>" method="post">
					<input type="submit" value="Tidak, Terima Kasih" name="submit" id="" class="btn btn-secondary" style="font-size: 13px;" >
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 13px;"><b></b></button> -->
				</form>
				<a href="<?= $simpan ?>">
					<button type="button" class="btn btn-success" style="font-size: 13px;"><b>Ok, Setuju</b></button>
				</a>
			</div>
		</div>
	</div>
</div>
<?php
if ($nilai_awal >= 12 && $nilai_awal <= 24) {
	?>
	<?php
		if ($font_tingkatkan == "Simpan") { ?>

		<div class=" row mb-3">
			<div class="offset-1 col-10 pb-1" style=" ">
				<button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-block <?= $hijau ?>" style="font-size: 13px;    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
">
					<b><?= $font_tingkatkan; ?></b>
				</button>
			</div>
		</div>
	<?php
		} else {
			?>
		<div class="row ">
			<div class="offset-1 col-10 pb-1" style=" ">
				<form action=" <?= $simpan2; ?>" method="post">
					<input type="hidden" name="simpan" value="simpan" id="">
					<input class="btn btn-block <?= $hijau ?>" name="submit" type="submit" value="Simpan" style="font-size: 13px;    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
">
				</form>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-12" style=" ">
				<button data-toggle="modal" data-target="#exampleModal" type="button" class=" btn-block " type="submit" style="font-size: 15px; background: #FFFFFF; padding: 10px; padding-top:7px;    
	box-shadow: none;
    border: 0px;
	color: var(--success);
">
					<b>
						<?= $font_tingkatkan; ?>
					</b>
				</button>
			</div>
		</div>
	<?php
		}
	} else {
		if (!$tingkatkan) { ?>
		<div class=" row mb-3">
			<div class="offset-1 col-10 pb-1" style=" ">
				<button data-toggle="modal" data-target="#exampleModal2" type="button" class="btn btn-block <?= $hijau ?>" style="font-size: 13px;    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
">
					<b><?= $font_tingkatkan; ?></b>
				</button>
			</div>
		</div>
	<?php
		} else {

			?>
		<div class="row ">
			<div class="offset-1 col-10 pb-1" style=" ">
				<form action=" <?= $simpan2; ?>" method="post">
					<input class="btn btn-block <?= $hijau ?>" name="submit" type="submit" value="Simpan" style="font-size: 13px;    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
">
				</form>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-12" style=" ">
				<a href="<?= $simpan ?>">
					<button type="button" class=" btn-block " type="submit" style="font-size: 15px; background: #FFFFFF; padding: 10px; padding-top:7px;    
	box-shadow: none;
    border: 0px;
	color: var(--green);
">
						<b>
							<?= $font_tingkatkan; ?>
						</b>
					</button>
				</a>
			</div>
		</div>
<?php
	}
}
?>
