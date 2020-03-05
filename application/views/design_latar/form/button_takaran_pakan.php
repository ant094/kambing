		<div class=" row mb-3">
			<div class="offset-1 col-10 pb-1" ">
		<!-- Button trigger modal -->
		<button type=" button" class="btn btn-block btn-success" data-toggle="modal" data-target="#exampleModal" style="font-size: 13px;    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
">
				Simpan
				</button>
			</div>
		</div>

		<div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<div class="modal-body" style="font-size: 14px; font-style: serif;">
						<p class="mb-0">Jika dilanjutkan akan mengubah data yang telah ada!</p>
						<p class="mb-0">
							&nbsp;&nbsp; &nbsp;&nbsp;Target Sebelumnya : <?= $nilai_target_sebelumnya ?>
						</p>
						<p class="mb-0">
							&nbsp;&nbsp; &nbsp;&nbsp;Target terbaru : <span class="target2"></span> Kg
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<form action="<?= base_url('M_takaran_pakan/tambah/')?>" method="post">
							<input type="hidden" name="berat" id="target3">							
							<button type="submit" class="btn btn-primary">Save changes</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- SUbmit Form -->
		<!-- <div class="offset-7 col-2 mt-3 pb-2"> -->
		<!-- </div> -->
