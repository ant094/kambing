<?php
// $email=empty($email);
// die($email);
?>

<body class="" style="  ">


	<h3 class="login">
		<h3 class="row text-center" style="margin-top: 70px;">
			<div class="col-12 text-center">
				<img src="<?= base_url('Asset/image/GKJW/gkjw.PNG') ?>" alt="">

			</div>
			<div class="col-12">
				<b style="font-size: 22px;  margin-left: -5px; ">KPAR-BLOK IX</b>
			</div>


		</h3>
	</h3>
	<div class="row" style="margin-top: 20px; 	">
		<div class="offset-1" style="  ">
			<form action="<?= base_url('kpar/login') ?>" enctype="multipart/form-data" method="post">
				<div class="input-field-with-icon pt-0">
					<!-- <?php
							if ($register != 'A') {
							?>
						<i>
							<p style="color: #FFFFFF">Registrasi berhasil silakan Login</p>
						</i>
					<?php
							}
					?> -->
					<label for="email" style="">Email</label>
					<span class="fas fa-id-badge" style=" font-size: 18px;"></span>
					<input type="text" class=" " name="email" id="email" placeholder="Email address" style="background: #FFFFFF; color:black;">
					<label for=" email" style="">Password</label>
					<span class="fas fa-key" style=" font-size: 18px;"></span>
					<input type="password" class=" " name="pass" id="email" placeholder="Password" style="background: #FFFFFF; color:black;">
					<!-- <label for=" email">Password</label>
					<span class="icon icon-lock">
						<input type="password" name="" id="password" placeholder="Password" />
					</span> -->

				</div>
		</div>
		<!-- <?php
				if (validation_errors('email')) {
				?>
			<div class="offset-6 mb-3" style="   background: #4dabf5;">
				<span class="" style="color: #FFFFFF;">*Email harus terisi</span>
			</div>
		<?php
				}
		?> -->
		<!-- <?php
				if ($email) {
				?>
			<div class="offset-6 mb-3 mt-0" style="   background: #4dabf5;">
				<span class="" style="color: #FFFFFF;"><?= $email ?></span>
			</div>
		<?php
				}
		?> -->

	</div>
	<div class="row">
		<div class="offset-1 col-10 pb-1 " style=" ">

			<input class="btn btn-light btn-block" type="submit" name="submit" value="Login" style="font-size: 13px;    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
	border-color: white;
	background: black;
	color: #FFFFFF;
	">
		</div>
	</div>

	<!-- 
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
	</div> -->

	<script type="text/javascript" src="<?= base_url('Asset/') ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?= base_url('Asset/') ?>js/popper.js"></script>
	<script type="text/javascript" src="<?= base_url('Asset/') ?>js/bootstrap.js"></script>
</body>

</html>
