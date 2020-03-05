<?php
// $email=empty($email);
// die($email);
?>

<body class="" style="background: #2196f3cc;  ">




	<h3 class="login">
		<h3 class="row" style="margin-top: 70px;">
			<div class=" offset-3 col-8 mt-5 pt-3 pl-2" style="  background: #4dabf5;">
				<!-- <i style="font-size: 1.5em; color: #FFFFFF;" class="fas fa-dna ml-3 "> </i> -->
				<!-- <i><b style="font-size: 42px; color: #FFFFFF; margin-left: -5px; font-family: 'Mountains of Christmas', cursive;">SiKambing</b></i> -->
				<i><b style="font-size: 42px; color: #FFFFFF; margin-left: -5px; font-family: 'Shadows Into Light', cursive;">SiKambing</b></i>
		</h3>
	</h3>
	<div class="row" style="margin-top: 100px; ">
		<div class="offset-1" style="   background: #4dabf5;">
			<form action="<?= base_url('login/') ?>" enctype="multipart/form-data" method="post">
				<div class="input-field-with-icon ">
					<?php
					if ($register != 'A') {
					?>
					<i>
						<p style="color: #FFFFFF">Registrasi berhasil silakan Login</p>
					</i>
						<?php
					}
					?>
					<label for="email" style="color: #FFFFFF;">Email Address</label>
					<span class="far fa-envelope" style="color: #FFFFFF; font-size: 18px;"></span>
					<input type="text" class="
						<?php if (validation_errors('email') or $email) {
							echo 'mb-0';
						} else {
							# code...
							echo 'mb-4';
						}
						?>
						 " name="email" id="email" placeholder="Email address" />

					<!-- <label for="email">Password</label>
						<span class="icon icon-lock">
							<input type="password" name="" id="password" placeholder="Password" />
						</span> -->

				</div>
		</div>
		<?php
		if (validation_errors('email')) {
		?>
			<div class="offset-6 mb-3" style="   background: #4dabf5;">
				<span class="" style="color: #FFFFFF;">*Email harus terisi</span>
			</div>
		<?php
		}
		?>
		<?php
		if ($email) {
		?>
			<div class="offset-6 mb-3 mt-0" style="   background: #4dabf5;">
				<span class="" style="color: #FFFFFF;"><?= $email ?></span>
			</div>
		<?php
		}
		?>

	</div>
	<div class="row">
		<div class="offset-1 col-10 pb-1 " style=" ">

			<input class="btn btn-light btn-block" type="submit" name="submit" value="SIGN IN" style="font-size: 13px;    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
	border-color: white;
	background: #4dabf5;
	color: #FFFFFF;
	font-size: 12px;
	">
		</div>
	</div>


	<div class=" row">
		<div class="offset-5 col-2 pb-1 " style="color: white; font-size: 9px;">ATAU</div>
	</div>




	</form>

	<div class="row">
		<div class="offset-1 col-10 pb-1" style=" ">
			<a href="<?= base_url('login/register/'); ?>">
				<button class="btn btn-default btn-block" type="submit" style="font-size: 13px;    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
		border-color: #05b37f;
	background: #05b37f;
	color: #FFFFFF;
">Join Now</button>
			</a>
		</div>
	</div>
	</div>

	<script type="text/javascript" src="<?= base_url('Asset/') ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?= base_url('Asset/') ?>js/popper.js"></script>
	<script type="text/javascript" src="<?= base_url('Asset/') ?>js/bootstrap.js"></script>
</body>

</html>
