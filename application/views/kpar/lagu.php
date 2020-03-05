<div class="bg-light">
	<nav class="navbar navbar-light  fixed-top" style=" background-color: #FFFFFF;">
		<a class="navbar-brand" href="#">
			<img src="<?= base_url('Asset/image/GKJW/gkjw.PNG') ?>" width="30" height="30" alt=""> <b>GKJW TanjungSari</b>
		</a>
	</nav>
	<div class="row">
		<div class="offset-2 col-8 " style="margin-top: 80px;">
			<blockquote class="blockquote text-right  mb-0">
				<p class="mb-0 text-center" style="font-size: 18px;">"Mari Melangkah Bersama"</p>
				<footer class="blockquote-footer">KPAR <cite title="Source Title">Blok IX</cite></footer>
			</blockquote>
		</div>
	</div>
	<div class="row " style="margin-top: 10px;">
		<div class="offset-1 col-10">
			<div class=" " style="line-height: 10px;">
				<form action="<?= base_url('kpar/cari') ?>" enctype="multipart/form-data" method="post">
					<div class="form-group mb-1">
						<!-- <form action="" method="get"> -->
						<label for="exampleFormControlInput1" style="font-size: 12px; font-family: monospace;">Cari Lagu</label>
						<i class=""></i>
						<i class="fas fa-search" style="font-size: 20px;"> </i><input type="text" name='cari' class="form-control" id="search" value="" placeholder="Search... ">
						<!-- </form> -->
						<div class="row">
							<div class="offset-1 col-11 ">
								<div class="list-group list-group-flush">
									<span id="hasil2"></span>
									<!-- <a href="#" id="hasil1" class="list-group-item list-group-item-action"></a> -->
									<span id="hasil"></span>
								</div>
							</div>
						</div>

						<p>
							<span id="hasil"></span>
						</p>

					</div>
					<div class="row">
						<div class="col-3">
							<p class="text-center"><a href="<?= base_url('kpar/cari') ?>"><i class="fas fa-redo-alt"></i> Reset</a>
	</p>
						</div>
						<div class="offset-5 col-3">
							<button type="submit" class="btn btn-sm btn-primary">Submit</button>
						</div>
					</div>
				</form>

			</div>
		</div>

	
			<div class=" col-12">
<div class="table-responsive-sm mt-3" >
  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $no=1;
  foreach ($lagu as $value) {
	  ?>
	    <tr>
      <th scope="row"><?= $no; ?></th>
      <td ><?= $value['judul'] ?></td> 
    </tr>
<?php
$no++;
  }
  ?>

  </tbody>
  </table>
</div>
			
		</div>
		</div>


	<button type="button" class="" data-toggle="modal" data-target="#exampleModal">
 <i class="fas fa-plus-circle move" style="font-size: 44px; position: fixed;
    top: 440px;
	left: 215px;"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content mt-5">
    
      <div class="modal-body">
       <form action="<?= base_url('kpar/tambah_lagu') ?>" method="post">
		     <div class="form-group">
    <label for="exampleFormControlInput1">Judul</label>
    <input type="text" name="lagu" class="form-control" id="exampleFormControlInput1" placeholder="Melayani Lebih Sungguh">
  </div>
 <div class="row"> <div class= " offset-4 col-3">    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</buttom></div>
    <div class="col-4"><button type="submit" class="btn btn-sm btn-primary">Simpan</button></div></div>
	   </form>
      </div>
    </div>
  </div>
</div>


	</form>
	</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
<?php
if ($tambah == "tambah") {
?>
	<script>
		swal("Lagu Baru!", "Telah Ditambahkan!", "success");
	</script>
<?php
}
?>
