<div class="row" style="margin-top: 67px; margin-bottom: 25px; font-size: 12px; font-family: monospace">
    <div class=" offset-1 col-10 pl-4 pr-4  pt-2 pb-3" style="border: #c5c4c4 solid 1px; box-shadow: #c5c4c4 1px 1px 1px;">
	<form action="<?= base_url('home/kambing/').$akhir."/" . $no_ternak . "/"  . $id_user ?>" method="post">

  <div class="mb-3">
    <label for="validationTextarea">Keterangan <?= $akhir?>:</label>
    <textarea class="form-control " name="ket" id="validationTextarea" placeholder="Required example textarea" required></textarea>
    <div class="invalid-feedback">
    </div>
    <div class="offset-10">
<input type="submit" class="mt-2 btn btn-success btn-sm" value="Simpan">
    </div>
    </form>
  </div>
    
		
	</div>



