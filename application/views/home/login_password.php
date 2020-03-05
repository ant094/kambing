	<div class="row" style="margin-top: 30px; ">
		<div class=" pl-4" style="  ">
			<form action="<?= base_url('Login/password/') ?>" method="post">
				<div class="input-field-with-icon">
					<label for="email" style="text-muted">Verifikasi Password</label>
					<span class="fas fa-lock" style=" font-size: 18px;"></span>
						<input type="password" class="
							<?php if (validation_errors('password') or $password) {
								echo "mb-0";
							} else {
								# code...
								echo "mb-4";
							}
							?>
						" name="password" id="" placeholder="*******" />
				</div>
				<?php
				if (validation_errors('password')) {
					?>
					<div class="offset-5 mb-3" >
						<span class="" style="color: red;">*Password harus terisi</span>
					</div>
				<?php
				}
				?>
				<?php
				if ($password) {
					?>
					<div class="offset-5 mb-3 mt-0">
						<span class="" style="color: red;"><?= $password ?></span>
					</div>
				<?php
				}
				?>
				<div class=" row">
							<div class="offset-2 col-9 pb-1" style=" ">
								<button class="btn btn-light btn-block" type="submit" style="font-size: 13px;    border-bottom-right-radius: 20px;
			border-top-right-radius: 20px;
			border-bottom-left-radius: 20px;
			border-top-left-radius: 20px;
			border-color: white;
			background: #4dabf5;
			color: #FFFFFF;
		">
									SIGN IN
								</button>
							</div>
					</div>
					<div class="row">
						<div class="offset-1 col-11">
							<span style="font-size: 9px;" class="text-muted"> Aplikasi SiKambing dilindungi dengan sistem proteksi terkini</span>
						</div>
					</div>
			</form>
		</div>
	</div>
