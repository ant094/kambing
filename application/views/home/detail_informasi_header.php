<div style="margin-top: 70px; margin-bottom: -65px; ">
	<div class="row" style="font-size: 13px;   font-family: monospace;">
		<div class="offset-1 col-6 pr-0">
			<b> Tanggal pencatatan :</b>
		</div>
		<div class="pl-0 col-5">
			<b>
					<?php
					
					$tgl_pencatatan = explode("-",$tgl_pencatatan);
					echo $tgl_pencatatan[2]."-".$tgl_pencatatan[1]."-".$tgl_pencatatan[0];
					
					?>
			 </b>
		</div>
	</div>
</div>
