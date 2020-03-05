<div class="container" style="margin-top: 70px; margin-bottom: 25px; font-size: 13px;
">
	Pilihlah pernyataan di bawah ini yang sesuai dengan keadaan kambing no ternak <?= $no_ternak ?>:
	<!-- G24 -->
	<div class="row mt-3 ">
		<div id="terpilih" class="offset-1 col-10 pb-3 pt-2 radius ">
			<div class="note_1" style="color: red;">
				harus dipilih ya tidak boleh Kosong!
			</div>
			<span class="pb-1">Apakah kambing memiliki nafsu makan yang baik ?</span>
			<button id="tanya_1" class="btn  btn-block btn-sm mt-1">Ya</button>
			<button id="tanya_2" class="btn  btn-block btn-sm ">Tidak</button>
		</div>
	</div>

	<!-- G11 -->
	<div class="row mt-3">
		<div id="terpilih2" class="offset-1 col-10 pb-3 pt-2 radius">
			<div class="note_2" style="color: red;">
				harus dipilih ya tidak boleh Kosong!
			</div>
			<span class="pb-1">Apakah kambing memiliki penampilan yang baik ?</span>
			<button id="tanya_3" class="btn btn-info btn-block btn-sm mt-1">Ya</button>
			<button id="tanya_4" class="btn btn-info btn-block btn-sm ">Tidak</button>
		</div>
	</div>

	<!-- G23 -->
	<!-- <div class="row mt-3">
		<div id="terpilih3" class="offset-1 col-10 pb-3 pt-2 radius ">
			<div class="note_3" style="color: red;">
				harus dipilih ya tidak boleh Kosong!
			</div>
			<span class="pb-1">Apakah kambing memiliki bulu halus dan mengkilat ?</span>
			<button id="tanya_5" class="btn btn-info btn-block btn-sm mt-1">Ya</button>
			<button id="tanya_6" class="btn btn-info btn-block btn-sm ">Tidak</button>
		</div>
	</div> -->

	<!-- G31 -->
	<div class="row mt-3">
		<div id="terpilih4" class="offset-1 col-10 pb-3 pt-2 radius ">
			<div class="note_4" style="color: red;">
				harus dipilih ya tidak boleh Kosong!
			</div>
			<span class="pb-1">Apakah kambing memiliki mata jernih ?</span>
			<button id="tanya_7" class="btn btn-info btn-block btn-sm mt-1">Ya</button>
			<button id="tanya_8" class="btn btn-info btn-block btn-sm ">Tidak</button>
		</div>
	</div>

	<!-- G37 -->
	<div class="row mt-3">
		<div id="terpilih5" class="offset-1 col-10 pb-3 pt-2 radius ">
			<div class="note_5" style="color: red;">
				harus dipilih ya tidak boleh Kosong!
			</div>
			<span class="pb-1">Apakah kambing memiliki nafas teratur ?</span>
			<button id="tanya_9" class="btn btn-info btn-block btn-sm mt-1">Ya</button>
			<button id="tanya_10" class="btn btn-info btn-block btn-sm ">Tidak</button>
		</div>
	</div>

	<!-- <div class="row mt-3">
		<div id="terpilih6" class="offset-1 col-10 pb-3 pt-2 radius ">
			<div class="note_6" style="color: red;">
				harus dipilih ya tidak boleh Kosong!
			</div>
			<span class="pb-1">Apakah kambing bergerak lincah ?</span>
			<button id="tanya_11" class="btn btn-info btn-block btn-sm mt-1">Ya</button>
			<button id="tanya_12" class="btn btn-info btn-block btn-sm ">Tidak</button>
		</div>
	</div> -->

	<!-- G25 -->
	<div class="row mt-3">
		<div id="terpilih7" class="offset-1 col-10 pb-3 pt-2 radius ">
			<div class="note_7" style="color: red;">
				harus dipilih ya tidak boleh Kosong!
			</div>
			<span class="pb-1">Apakah kambing memiliki kotoran yang normal tidak mencret ?</span>
			<button id="tanya_13" class="btn btn-info btn-block btn-sm mt-1">Ya</button>
			<button id="tanya_14" class="btn btn-info btn-block btn-sm ">Tidak</button>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-12 pb-2 pt-2">
			<button id="submit" class="btn btn-success btn-block btn-sm ">Submit All</button>
		</div>
	</div>

</div>

<form id="myForm" name="myForm" action="<?php echo base_url() . 'M_cek_kesehatan/hasil' ?>" method="post">
	<input type="hidden" name="pilihan1" id="id1">
	<input type="hidden" name="pilihan2" id="id2">
	<!-- <input type="hidden" name="pilihan3" id="id3"> -->
	<input type="hidden" name="pilihan4" id="id4">
	<input type="hidden" name="pilihan5" id="id5">
	<!-- <input type="hidden" name="pilihan6" id="id6"> -->
	<input type="hidden" name="pilihan7" id="id7">
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
	$(document).ready(function() {
		$('#terpilih').addClass('dasar');
		$('#terpilih2').addClass('dasar');
		$('#terpilih3').addClass('dasar');
		$('#terpilih4').addClass('dasar');
		$('#terpilih5').addClass('dasar');
		$('#terpilih6').addClass('dasar');
		$('#terpilih7').addClass('dasar');
		$('#tanya_1').addClass('btn-info');
		$('#tanya_2').addClass('btn-info');
		$('#tanya_3').addClass('btn-info');
		$('#tanya_4').addClass('btn-info');
		$('#tanya_5').addClass('btn-info');
		$('#tanya_6').addClass('btn-info');
		$('#tanya_7').addClass('btn-info');
		$('#tanya_8').addClass('btn-info');
		$('#tanya_9').addClass('btn-info');
		$('#tanya_10').addClass('btn-info');
		$('#tanya_11').addClass('btn-info');
		$('#tanya_12').addClass('btn-info');
		$('#tanya_13').addClass('btn-info');
		$('#tanya_14').addClass('btn-info');
		$('.note_1').hide();
		$('.note_2').hide();
		$('.note_3').hide();
		$('.note_4').hide();
		$('.note_5').hide();
		$('.note_6').hide();
		$('.note_7').hide();

		$('#tanya_1').click(function() {
			$('#tanya_1').val('pilih');
			$('#tanya_2').val('');
			$('#terpilih').addClass('sukses');
			$('#tanya_1').addClass('btn-success');
			$('#tanya_2').removeClass('btn-info');
			$('#tanya_1').removeClass('btn-info');
			$('#terpilih').removeClass('dasar');
			$('#tanya_2').removeClass('btn-danger');
			$('#terpilih').removeClass('danger');
			$('.note_1').hide();
		});
		$('#tanya_2').click(function() {
			$('#tanya_2').val('pilih');
			$('#tanya_1').val('');
			$('#terpilih').addClass('danger');
			$('#tanya_2').addClass('btn-danger');
			$('#tanya_1').removeClass('btn-info');
			$('#tanya_2').removeClass('btn-info');
			$('#terpilih').removeClass('dasar');
			$('#tanya_1').removeClass('btn-success');
			$('#terpilih').removeClass('sukses');
			$('.note_1').hide();
		});

		$('#tanya_3').click(function() {
			$('#tanya_3').val('pilih');
			$('#tanya_4').val('');
			$('#terpilih2').addClass('sukses');
			$('#tanya_3').addClass('btn-success');
			$('#tanya_4').removeClass('btn-info');
			$('#tanya_3').removeClass('btn-info');
			$('#terpilih2').removeClass('dasar');
			$('#tanya_4').removeClass('btn-danger');
			$('#terpilih2').removeClass('danger');
			$('.note_2').hide();
		});
		$('#tanya_4').click(function() {
			$('#tanya_4').val('pilih');
			$('#tanya_3').val('');
			$('#terpilih2').addClass('danger');
			$('#tanya_4').addClass('btn-danger');
			$('#tanya_3').removeClass('btn-info');
			$('#tanya_4').removeClass('btn-info');
			$('#terpilih2').removeClass('dasar');
			$('#tanya_3').removeClass('btn-success');
			$('#terpilih2').removeClass('sukses');
			$('.note_2').hide();
		});

		// $('#tanya_5').click(function() {
		// 	$('#tanya_5').val('pilih');
		// 	$('#terpilih3').addClass('sukses');
		// 	$('#tanya_5').addClass('btn-success');
		// 	$('#tanya_6').removeClass('btn-info');
		// 	$('#tanya_5').removeClass('btn-info');
		// 	$('#terpilih3').removeClass('dasar');
		// 	$('#tanya_6').removeClass('btn-danger');
		// 	$('#terpilih3').removeClass('danger');
		// 	$('.note_3').hide();
		// });
		// $('#tanya_6').click(function() {
		// 	$('#tanya_6').val('pilih');
		// 	$('#terpilih3').addClass('danger');
		// 	$('#tanya_6').addClass('btn-danger');
		// 	$('#tanya_5').removeClass('btn-info');
		// 	$('#tanya_6').removeClass('btn-info');
		// 	$('#terpilih3').removeClass('dasar');
		// 	$('#tanya_5').removeClass('btn-success');
		// 	$('#terpilih3').removeClass('sukses');
		// 	$('.note_3').hide();
		// });


		$('#tanya_7').click(function() {
			$('#tanya_7').val('pilih');
			$('#tanya_8').val('');
			$('#terpilih4').addClass('sukses');
			$('#tanya_7').addClass('btn-success');
			$('#tanya_8').removeClass('btn-info');
			$('#tanya_7').removeClass('btn-info');
			$('#terpilih4').removeClass('dasar');
			$('#tanya_8').removeClass('btn-danger');
			$('#terpilih4').removeClass('danger');
			$('.note_4').hide();
		});
		$('#tanya_8').click(function() {
			$('#tanya_8').val('pilih');
			$('#tanya_7').val('');
			$('#terpilih4').addClass('danger');
			$('#tanya_8').addClass('btn-danger');
			$('#tanya_7').removeClass('btn-info');
			$('#tanya_8').removeClass('btn-info');
			$('#terpilih4').removeClass('dasar');
			$('#tanya_7').removeClass('btn-success');
			$('#terpilih4').removeClass('sukses');
			$('.note_4').hide();
		});

		$('#tanya_9').click(function() {
			$('#tanya_9').val('pilih');
			$('#tanya_10').val('');
			$('#terpilih5').addClass('sukses');
			$('#tanya_9').addClass('btn-success');
			$('#tanya_10').removeClass('btn-info');
			$('#tanya_9').removeClass('btn-info');
			$('#terpilih5').removeClass('dasar');
			$('#tanya_10').removeClass('btn-danger');
			$('#terpilih5').removeClass('danger');
			$('.note_5').hide();
		});
		$('#tanya_10').click(function() {
			$('#tanya_10').val('pilih');
			$('#tanya_9').val('');
			$('#terpilih5').addClass('danger');
			$('#tanya_10').addClass('btn-danger');
			$('#tanya_9').removeClass('btn-info');
			$('#tanya_10').removeClass('btn-info');
			$('#terpilih5').removeClass('dasar');
			$('#tanya_9').removeClass('btn-success');
			$('#terpilih5').removeClass('sukses');
			$('.note_5').hide();
		});

		// $('#tanya_11').click(function() {
		// 	$('#tanya_11').val('pilih');
		// 	$('#terpilih6').addClass('sukses');
		// 	$('#tanya_11').addClass('btn-success');
		// 	$('#tanya_12').removeClass('btn-info');
		// 	$('#tanya_11').removeClass('btn-info');
		// 	$('#terpilih6').removeClass('dasar');
		// 	$('#tanya_12').removeClass('btn-danger');
		// 	$('#terpilih6').removeClass('danger');
		// 	$('.note_6').hide();
		// });
		// $('#tanya_12').click(function() {
		// 	$('#tanya_12').val('pilih');
		// 	$('#terpilih6').addClass('danger');
		// 	$('#tanya_12').addClass('btn-danger');
		// 	$('#tanya_11').removeClass('btn-info');
		// 	$('#tanya_12').removeClass('btn-info');
		// 	$('#terpilih6').removeClass('dasar');
		// 	$('#tanya_11').removeClass('btn-success');
		// 	$('#terpilih6').removeClass('sukses');
		// 	$('.note_6').hide();
		// });

		$('#tanya_13').click(function() {
			$('#tanya_13').val('pilih');
			$('#tanya_14').val('');
			$('#terpilih7').addClass('sukses');
			$('#tanya_13').addClass('btn-success');
			$('#tanya_14').removeClass('btn-info');
			$('#tanya_13').removeClass('btn-info');
			$('#terpilih7').removeClass('dasar');
			$('#tanya_14').removeClass('btn-danger');
			$('#terpilih7').removeClass('danger');
			$('.note_7').hide();
		});
		$('#tanya_14').click(function() {
			$('#tanya_14').val('pilih');
			$('#tanya_13').val('');
			$('#terpilih7').addClass('danger');
			$('#tanya_14').addClass('btn-danger');
			$('#tanya_13').removeClass('btn-info');
			$('#tanya_14').removeClass('btn-info');
			$('#terpilih7').removeClass('dasar');
			$('#tanya_13').removeClass('btn-success');
			$('#terpilih7').removeClass('sukses');
			$('.note_7').hide();
		});

		$('#submit').click(function() {
			// 	var pilihan = ['ari', 'anto', 'jimmy'];

			var tanya_1 = $('#tanya_1').val();
			var tanya_2 = $('#tanya_2').val();
			var tanya_3 = $('#tanya_3').val();
			var tanya_4 = $('#tanya_4').val();
			// var tanya_5 = $('#tanya_5').val();
			// var tanya_6 = $('#tanya_6').val();
			var tanya_7 = $('#tanya_7').val();
			var tanya_8 = $('#tanya_8').val();
			var tanya_9 = $('#tanya_9').val();
			var tanya_10 = $('#tanya_10').val();
			// var tanya_11 = $('#tanya_11').val();
			// var tanya_12 = $('#tanya_12').val();
			var tanya_13 = $('#tanya_13').val();
			var tanya_14 = $('#tanya_14').val();
			// var terpilih = $('#terpilih').val();

			if (tanya_1 == 'pilih' || tanya_2 == 'pilih') {
				if (tanya_1 == 'pilih') {
					var check = 'ya';
				} else {
					var check = 'tidak';
				}
			} else {
				$('.note_1').show();
			}

			if (tanya_3 == 'pilih' || tanya_4 == 'pilih') {
				if (tanya_3 == 'pilih') {
					var check2 = 'ya';
				} else {
					var check2 = 'tidak';
				}
			} else {
				$('.note_2').show();
			}
			// if (tanya_5 == 'pilih' || tanya_6 == 'pilih') {
			// 	if (tanya_5 == 'pilih') {
			// 		var check3 = 'ya';
			// 	} else {
			// 		var check3 = 'tidak';
			// 	}
			// } else {
			// 	$('.note_3').show();
			// }
			if (tanya_7 == 'pilih' || tanya_8 == 'pilih') {
				if (tanya_7 == 'pilih') {
					var check4 = 'ya';
				} else {
					var check4 = 'tidak';
				}
			} else {
				$('.note_4').show();
			}
			if (tanya_9 == 'pilih' || tanya_10 == 'pilih') {
				if (tanya_9 == 'pilih') {
					var check5 = 'ya';
				} else {
					var check5 = 'tidak';
				}
			} else {
				$('.note_5').show();
			}
			// if (tanya_11 == 'pilih' || tanya_12 == 'pilih') {
			// 	if (tanya_11 == 'pilih') {
			// 		var check6 = 'ya';
			// 	} else {
			// 		var check6 = 'tidak';
			// 	}
			// } else {
			// 	$('.note_6').show();
			// }
			if (tanya_13 == 'pilih' || tanya_14 == 'pilih') {
				if (tanya_13 == 'pilih') {
					var check7 = 'ya';
				} else {
					var check7 = 'tidak';
				}
			} else {
				$('.note_7').show();
			}

			// if (check && check2 && check3 && check4 && check5 && check7) {
			if (check && check2 && check4 && check5 && check7) {

				var id1;
				$('#id1').val(check);
				$('#id2').val(check2);
				// $('#id3').val(check3);
				$('#id4').val(check4);
				$('#id5').val(check5);
				// $('#id6').val(check6);
				$('#id7').val(check7);

				$('#myForm').submit();

				// var request = new XMLHttpRequest();
				// request.open('POST', '<?php echo base_url() . 'M_cek_kesehatan/hasil' ?>', true);
				// request.setRequestHeader("Content-type",'application/x-www-form-urlencoded');

				// request.send("test=ari");

				// $.ajax({
				// 	//Alamat url harap disesuaikan dengan lokasi script pada komputer anda
				// 	type: 'POST',
				// 	data: 'check=' + "ari",
				// 	url: '<?php echo base_url() . 'M_cek_kesehatan/hasil' ?>',
				// 	dataType: 'json',
				// 	success: function(hasil){
				// 		alert('sukse');
				// 	}
				// });
				// $.post('<?php echo base_url() . 'M_cek_kesehatan/hasil' ?>', {
				// 	nama: 'john',
				// 	time: "2pm"
				// });
				// location.href = 'http://localhost/TA/Me/M_cek_kesehatan/hasil/' + check;

			}
		});


	});
</script>
</body>
