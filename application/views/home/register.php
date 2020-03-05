<!-- No Induk -->
<div class="line" style="margin-top: 65px;">
	<div class="row">
		<div class=" offset-1 col-10 mb-2">
			<span style="font-size: 12px;">
				Terima kasih telah bergabung!
			</span>
		</div>
		<form action="<? base_url('login/register') ?>" method="post">
			<div class=" offset-1 col-10">
				<div class="form-group m " style="line-height: 10px;">
					<label for="exampleFormControlInput1" style="font-size: 14px;">Nama </label>
					<input value="<?php echo $nama_pemilik = $nama_pemilik ? $nama_pemilik : " "; ?>" name="nama_pemilik" style="height: 27px;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ari Cahyono">
					<?php
					if (validation_errors('nama_pemilik')) {
					?>
						<div class="offset-6 mb-3"">
							<span class="" style=" color: red;">*Nama harus terisi</span>
						</div>
					<?php
					}
					?>

				</div>
				<div class="form-group " style="line-height: 10px;">
					<label for="exampleFormControlInput1" style="font-size: 14px;">Email</label>
					<input value="<?php echo $email = $email ? $email : " "; ?>" name="email" style="height: 27px;" type="email" class="form-control" id="exampleFormControlInput1" placeholder="ari@gmail.com">
					<?php
					if (validation_errors('email')) {
					?>
						<div class="offset-6 mb-3"">
							<span class="" style=" color: red;">*Email harus terisi</span>
						</div>
					<?php
					}
					?>
				</div>
				<div class="form-group m" style="line-height: 10px;">
					<label for="exampleFormControlInput1" style="font-size: 14px;">Password</label>
					<input name="password" style="height: 27px;" type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
					<?php
					if (validation_errors('password')) {
					?>
						<div class="offset-4 mb-3"">
							<span class="" style=" color: red;">*Password harus terisi</span>
						</div>
					<?php
					}
					?>
				</div>
				<!-- <div class="form-group m" style="line-height: 10px;">
					<label for="exampleFormControlInput1" style="font-size: 14px;">Re-Password</label>
					<input name="re_password" style="height: 27px;" type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
				</div> -->
				<div class="checkbox-inline">
					<?php
					if ($check) {
					?>
						<div class=" mb-3"">
							<span class="" style=" color: red;">*Wajib di pilih</span>
						</div>
					<?php
					}
					?>

					<label style="font-size: 12px;"><input type="checkbox" value="check" name="check"> Saya setuju dengan <span style="color: #05b37f;">Syarat & Ketentuan</span> dan
						<span style="color: #05b37f;">
							Kebijakan Privasi
						</span></label>
				</div>
			</div>
			<div class="offset-1 col-10 pb-1" style=" ">
				<input class="btn btn-default btn-block" type="submit" name="submit" value="Berikutnya" style="font-size: 13px;    border-bottom-right-radius: 20px;
			border-top-right-radius: 20px;
			border-bottom-left-radius: 20px;
			border-top-left-radius: 20px;
			border-color: white;
			background: #2c9bf4;
			color: #FFFFFF;
	">
			</div>
		</form>




	</div>
</div>
