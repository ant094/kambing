<div class="row mtNav2" style=" background-color: #2196f3f2;">
	<nav class="navbar navbar-light redNav pr-0  fixed-bottom " style="padding-bottom: 4px; background-color: #2196f3f2; border: #2196f3f2 solid 1px; box-shadow: #2196f3cc 1px 1px 4px;">

		<div class=" col-3 pl-0 " style=" text-align: center;">
			<a href="<?= base_url("login/about") ?>" style="text-decoration: none;">
				<i class="fas fa-info-circle" style="    color: #FFFFFF; font-size: 20px; padding-top: 0px; padding-bottom: 0px;"></i>
				<p style="     color: #FFFFFF; font-size: 10px; margin-bottom: 0px;">SiKambing</p>
			</a>

		</div>
		<div class=" col-3 pl-0" style=" text-align: center;">
			<a href="<?= base_url('M_sistem_pakar/index')  ?>" style="text-decoration: none;">
				<i class="fas fa-user-md " style="    color: #FFFFFF; font-size: 20px; padding-top: 0px; padding-bottom: 0px;"></i>
				<p style="     color: #FFFFFF; font-size: 10px; margin-bottom: 0px; ">S. Pakar</p>
			</a>
		</div>

		<div class=" col-3 pl-0" style=" text-align: center;">
			<a href="<?= base_url('M_takaran_pakan/index')  ?>" style="text-decoration: none;">
				<i class="fas fa-balance-scale" style="    color: #FFFFFF; font-size: 20px; padding-top: 0px; padding-bottom: 0px;"></i>
				<p style="     color: #FFFFFF; font-size: 10px; margin-bottom: 0px;">T. Pakan</p>
			</a>
		</div>

		<div class=" col-3 pl-0 pr-2" style=" text-align: center;">
			<a href="<?= base_url('M_catatan_pertumbuhan/index')  ?>" style="text-decoration: none;">
				<i class="fas fa-book iconStyle" style="    color: #FFFFFF; font-size: 20px; padding-top: 0px; padding-bottom: 0px;"></i>
				<p style="     color: #FFFFFF; font-size: 10px; margin-bottom: 0px;">C. Berat</p>
			</a>
		</div>
	</nav>
</div>
<!-- <script type="text/javascript" src="<?= base_url('Asset/') ?>js/jquery.js"></script> -->
<!-- <script type="text/javascript" src="<?= base_url('Asset/') ?>js/popper.js"></script> -->
<!-- <script type="text/javascript" src="<?= base_url('Asset/') ?>js/bootstrap.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	// $('#myModal_delete').modal('show');
</script>

<?php
if ($check == "delete" and $check2 == "kambing") {
?>
	<script>
		swal("Data Kambing <?= $no_ternak2; ?>!", "Telah Dihapus!", "error");
	</script>
<?php
}
?>

</body>

</html>
