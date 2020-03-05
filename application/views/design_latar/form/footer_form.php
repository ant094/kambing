	</form>
	</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#myModal_sukses').modal('show');
			//Takaran Pakan-C. Produksi
			$('#show2').hide();
			$('#button2').click(function() {
				$('#button2').removeClass("btn-warning");
				$('#button1').addClass("btn-warning");
				$('#button2').addClass("btn-danger");
				$('#show2').slideDown(1000);
				$('#show1').hide();
			});
			$('#button1').click(function() {
				$('#button1').removeClass("btn-warning");
				$('#button2').removeClass("btn-danger");
				$('#button2').addClass("btn-warning");
				$('#button1').addClass("btn-info");
				$('#show1').slideDown(1000);
				$('#show2').hide();
			});


			$('#link').click(function() {
				var info = $('.btn-info').val();
				var danger = $('.btn-danger').val();
				if (info) {

					// location.href = 'http://localhost/TA/Me/M_catatan_pertumbuhan/overview_takaran_pakan/' + info;
					location.href = '<?= base_url("M_catatan_pertumbuhan/overview_takaran_pakan/") ?>' + info;

				}
				if (danger) {
					// location.href = 'http://localhost/TA/Me/M_catatan_pertumbuhan/overview_takaran_pakan/' + danger;
					location.href = '<?= base_url("M_catatan_pertumbuhan/overview_takaran_pakan/") ?>' + danger;
				}

			});
			// Batas

			//Overview Kambing

			//Batas


			$('#cek').click(function() {
				$('#border').addClass('border-success');
				var berat = $('#berat').val() ? $('#berat').val() : 0;
				var usia = $('.usia').text();
				$('.target2').text(berat);
				$('#target3').val(berat);

				berat = parseFloat(berat);
				usia = parseFloat(usia);
				var nilaiValue = ((berat * 10) / 100) * 2;
				if (usia <= 12) {
					var valueA = ((nilaiValue * 60) / 100);
					var valueB = ((nilaiValue * 40) / 100);
					valueA = valueA.toFixed(2);
					valueB = valueB.toFixed(2);
					$('.valueA').text(valueA + " Kg Rumput");
					$('.valueB').text(valueB + " Kg Ubi-ubian");

				} else {
					var valueA = ((nilaiValue * 75) / 100);
					var valueB = ((nilaiValue * 25) / 100);
					valueA = valueA.toFixed(2);
					valueB = valueB.toFixed(2);
					$('.valueA').text(valueA + " Kg Rumput");
					$('.valueB').text(valueB + " Kg Ubi-ubian");
					// alert(usia);
				}
			});

			$('#search').keyup(function() {
				var s = $('#search').val();

				$('#h1').remove();
				$('#h2').remove();
				$('#h3').remove();
				$('#h4').remove();
				$('#h5').remove();

				$.ajax({
					type: 'POST',
					url: '<?= base_url("M_sistem_pakar/tampung") ?>',
					data: 'id=' + s,
					dataType: 'json',
					cache: false,
					success: function(result) {
						$('#hasil').before(result[0]);
						$('#hasil').before(result[1]);
						$('#hasil').before(result[2]);
						$('#hasil').before(result[3]);
						$('#hasil').before(result[4]);
					},
				});
			});

			$('#searchA').keyup(function() {
				var s = $('#searchA').val();

				$('.P1').hide();
				$('.P2').hide();
				$('.P3').hide();
				$('.P4').hide();
				$('.P5').hide();


				$.ajax({
					type: 'POST',
					url: '<?= base_url("M_sistem_pakar/tampungB") ?>',
					data: 'id=' + s,
					dataType: 'json',
					cache: false,
					success: function(result) {

						$('.P1').val(result[0]);
						$('.P2').val(result[1]);
						$('.P3').val(result[2]);
						$('.P4').val(result[3]);
						$('.P5').val(result[4]);

					},
				});
				$.ajax({
					type: 'POST',
					url: '<?= base_url("M_sistem_pakar/tampungBB") ?>',
					data: 'id=' + s,
					dataType: 'json',
					cache: false,
					success: function(result) {

						$('.P1').text(result[0]).show();
						$('.P2').text(result[1]).show();
						$('.P3').text(result[2]).show();
						$('.P4').text(result[3]).show();
						$('.P5').text(result[4]).show();

					},
				});

			});



			function inputSession(a) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("M_sistem_pakar/tampungA") ?>',
					data: 'id=' + a,
					dataType: 'json',
					cache: false,
					success: function(result) {
						// alert(result[0]);
						$('#id1').val(result[0]);
					},
				});
			}

			// $('.print').click(function() {
			// 	// location.href = 'http://localhost/TA/Me/M_sistem_pakar/pakar/' + gejala;
			// 	location.href = '';
			// });


			$('#submit').click(function() {
				var gejala = $("#id2").val();
				// location.href = 'http://localhost/TA/Me/M_sistem_pakar/pakar/' + gejala;
				location.href = '<?= base_url("M_sistem_pakar/pakar/") ?>' + gejala;
			});

			function sebelum(c, d) {
				var a = $(c).text();
				var b = $(c).val();
				$(d).show();
				$(d).text(a);
				$(d).val(b);

				$(c).hide();
				inputSession(b);
			}

			function sesudah(c, d) {
				var a = $(c).text();
				var b = $(c).val();
				$(d).show();
				$(d).text(a);
				$(d).val(b);

				$(c).hide();
				inputSessionA(b);
			}

			$('button').click(function() {
				var a = $(this).attr('id');


				for (let index = 1; index <= 63; index++) {
					index3 = "G" + index;
					if (a == index3) {
						index1 = "#G" + index;
						index2 = "#OG" + index;
						sesudah(index1, index2);
					}
				}

				for (let index = 1; index <= 63; index++) {

					index4 = "OG" + index;
					if (a == index4) {
						index1 = "#G" + index;
						index2 = "#OG" + index;
						sebelum(index2, index1);
					}
				}

				for (let index = 1; index <= 5; index++) {
					index5 = "P" + index;
					if (a == index5) {
						var b = $(this).val();
						var c = $(this).text();
						index1 = "#" + b;
						$(index1).show();
						$(index1).text(c);
						$(index1).val(b);
						index5 = "#" + index5;
						$(index5).hide();
						inputSession(b);
					}
				}

			});

			function inputSessionA(a) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("M_sistem_pakar/deleteSession") ?>',
					data: 'id=' + a,
					dataType: 'json',
					cache: false,
					success: function(result) {
						$('#id1').val(result[0]);
					},
				});
			}

			// PAGINATION
			// PAGINATION KESEHATAN
			$('#kesKanan').click(function() {
				var noTernak = $("#noTernak").val();
				var nilaiKesehatan = $("#nilaiKesehatan").val();
				var nilaiTengahKesehatan = $("#nilaiTengahKesehatan").val();
				var jumlahKesehatan = $("#jumlahKesehatan").val();

				if (jumlahKesehatan != nilaiTengahKesehatan) {

					var tampung = noTernak + "-" + nilaiKesehatan + "-" + nilaiTengahKesehatan;

					$('#pKes1').remove();
					$('#pKes2').remove();
					$('#pKes3').remove();

					var nilaiCenter = parseInt(nilaiTengahKesehatan) + 1;
					$("#nilaiCenterKesehatan").text(nilaiCenter);
					$.ajax({
						type: 'POST',
						url: '<?= base_url("home/paginationKesehatan") ?>',
						data: 'id=' + tampung,
						dataType: 'json',
						cache: false,
						success: function(result) {
							$('#hasilKes').after(result[2]);
							$('#hasilKes').after(result[1]);
							$('#hasilKes').after(result[0]);
							$("#nilaiKesehatan").val(result[3]);
							$("#nilaiTengahKesehatan").val(result[4]);
						},
					});
				} else {

				}
			});
			$('#kesKiri').click(function() {
				var nilaiTengahKesehatan = $("#nilaiTengahKesehatan").val();
				if (nilaiTengahKesehatan != 1) {
					var noTernak = $("#noTernak").val();
					var nilaiKesehatan = $("#nilaiKesehatan").val();

					var tampung = noTernak + "-" + nilaiKesehatan + "-" + nilaiTengahKesehatan;

					var nilaiCenter = parseInt(nilaiTengahKesehatan) - 1;
					$("#nilaiCenterKesehatan").text(nilaiCenter);

					$('#pKes1').remove();
					$('#pKes2').remove();
					$('#pKes3').remove();

					$.ajax({
						type: 'POST',
						url: '<?= base_url("home/paginationKiriKesehatan") ?>',
						data: 'id=' + tampung,
						dataType: 'json',
						cache: false,
						success: function(result) {
							for (let index = 0; index < 3; index++) {
								var i = index;
								$('#hasilKes').after(result[i]);
							}
							$("#nilaiKesehatan").val(result[3]);
							$("#nilaiTengahKesehatan").val(result[4]);
						},
					});
				} else {

				}

			});


			//PAGINATION PAKAR
			$('#pakarKanan').click(function() {
				var noTernak = $("#noTernak").val();
				var nilaiKesehatan = $("#nilaiSistemPakar").val();
				var nilaiTengahKesehatan = $("#nilaiTengahSistemPakar").val();
				var jumlahKesehatan = $("#jumlahSistemPakar").val();

				if (jumlahKesehatan != nilaiTengahKesehatan) {

					var tampung = noTernak + "-" + nilaiKesehatan + "-" + nilaiTengahKesehatan;

					$('#pPakar1').remove();
					$('#pPakar2').remove();
					$('#pPakar3').remove();

					var nilaiCenterPakar = parseInt(nilaiTengahKesehatan) + 1;
					$("#nilaiCenterSistemPakar").text(nilaiCenterPakar);
					$.ajax({
						type: 'POST',
						url: '<?= base_url("home/paginationSistemPakar") ?>',
						data: 'id=' + tampung,
						dataType: 'json',
						cache: false,
						success: function(result) {
							$('#hasilPakar').after(result[2]);
							$('#hasilPakar').after(result[1]);
							$('#hasilPakar').after(result[0]);
							$("#nilaiSistemPakar").val(result[3]);
							$("#nilaiTengahSistemPakar").val(result[4]);
						},
					});


				} else {

				}
			});
			$('#pakarKiri').click(function() {
				var nilaiTengahKesehatan = $("#nilaiTengahSistemPakar").val();
				var noTernak = $("#noTernak").val();
				var nilaiKesehatan = $("#nilaiSistemPakar").val();
				var jumlahKesehatan = $("#jumlahSistemPakar").val();
				if (nilaiTengahKesehatan != 1) {
					var tampung = noTernak + "-" + nilaiKesehatan + "-" + nilaiTengahKesehatan;
					$('#pPakar1').remove();
					$('#pPakar2').remove();
					$('#pPakar3').remove();

					var nilaiCenterPakar = parseInt(nilaiTengahKesehatan) - 1;
					$("#nilaiCenterSistemPakar").text(nilaiCenterPakar);
					$.ajax({
						type: 'POST',
						url: '<?= base_url("home/paginationKiriSistemPakar") ?>',
						data: 'id=' + tampung,
						dataType: 'json',
						cache: false,
						success: function(result) {
							$('#hasilPakar').after(result[2]);
							$('#hasilPakar').after(result[1]);
							$('#hasilPakar').after(result[0]);
							$("#nilaiSistemPakar").val(result[3]);
							$("#nilaiTengahSistemPakar").val(result[4]);
						},
					});
				} else {

				}
			});
			$('#berKanan').click(function() {
				var noTernak = $("#noTernak").val();
				var nilaiKesehatan = $("#nilaiCatatBerat").val();
				var nilaiTengahKesehatan = $("#nilaiTengahCatatBerat").val();
				var jumlahKesehatan = $("#jumlahCatatBerat").val();

				if (jumlahKesehatan != nilaiTengahKesehatan) {
					var tampung = noTernak + "-" + nilaiKesehatan + "-" + nilaiTengahKesehatan;
					$('#hBerat1').remove();
					$('#hBerat2').remove();
					$('#hBerat3').remove();
					$('#hBerat4').remove();

					var nilaiCenter = parseInt(nilaiTengahKesehatan) + 1;
					$("#nilaiCenterCatatBerat").text(nilaiCenter);
					$.ajax({
						type: 'POST',
						url: '<?= base_url("home/paginationCatatBerat") ?>',
						data: 'id=' + tampung,
						dataType: 'json',
						cache: false,
						success: function(result) {
							$('#berat').after(result[3]);
							$('#berat').after(result[2]);
							$('#berat').after(result[1]);
							$('#berat').after(result[0]);
							$("#nilaiCatatBerat").val(result[4]);
							$("#nilaiTengahCatatBerat").val(result[5]);
						},
					});
				} else {

				}
			});

			$('#berKiri').click(function() {
				var noTernak = $("#noTernak").val();
				var nilaiKesehatan = $("#nilaiCatatBerat").val();
				var nilaiTengahKesehatan = $("#nilaiTengahCatatBerat").val();
				var jumlahKesehatan = $("#jumlahCatatBerat").val();

				if (nilaiTengahKesehatan != 1) {
					var tampung = noTernak + "-" + nilaiKesehatan + "-" + nilaiTengahKesehatan;
					$('#hBerat1').remove();
					$('#hBerat2').remove();
					$('#hBerat3').remove();
					$('#hBerat4').remove();

					var nilaiCenter = parseInt(nilaiTengahKesehatan) - 1;
					$("#nilaiCenterCatatBerat").text(nilaiCenter);
					// $("#jumlahCatatBerat").val(nilaiCenter);
					$.ajax({
						type: 'POST',
						url: '<?= base_url("home/paginationKiriCatatBerat") ?>',
						data: 'id=' + tampung,
						dataType: 'json',
						cache: false,
						success: function(result) {
							$('#berat').after(result[3]);
							$('#berat').after(result[2]);
							$('#berat').after(result[1]);
							$('#berat').after(result[0]);
							$("#nilaiCatatBerat").val(result[4]);
							$("#nilaiTengahCatatBerat").val(result[5]);
						},
					});
				} else {

				}
			});

			// });
		});
		// $('#customSwitches').prop('indeterminate', true)
		$(document).ready(function() {
			$('#informasi').show();
			$('#title').append('<span id="text">Sembunyikan informasi</span>');
			$('#top').hide();

			$('.customSwitchesA').click(function() {

				if ($('.customSwitchesA').is(":checked")) {
					// $('#informasi2').fadeOut();
					// $('#informasi').fadeOut();
					$('#informasi').show();
					$('#informasi2').hide();
					$('#top').show();
					$('#text').remove();
					$('#title').append('<span id="text">Tampilkan informasi</span>');
				} else {
					$('#informasi').show();
					$('#informasi2').show();
					$('#top').hide();
					$('#text').remove();
					$('#title').append('<span id="text">Sembunyikan informasi</span>');
				}
			});

// $('#terjual').click(function() {
// 	var r = $("textarea").val();
// 	alert(r);
			
// 			});

	


// Kurang Nilai
			$('#tahunA').on("change",function() {
				$('#pilihA').removeAttr("disabled");
			});
			$('#pilihA').on("change",function() {
				$('#pilihAB').removeAttr("disabled");
			});
			$('#tahunB').on("change",function() {
// alert("dad");
				$('#pilihBB').removeAttr("disabled");
			});
			$('#pilihBB').on("change",function() {
				$('#pilihBBB').removeAttr("disabled");
			});
			
			$('#khusus').hide();
			$('.betina').click(function() {
				if ($('.betina').is(":checked")) {
					$('#khusus').show();
					$('.print').removeClass('btn-success');
					$('.print').addClass('btn-primary');
				} else {
					$('#khusus').hide();
					$('.print').addClass('btn-success');
					$('.print').removeClass('btn-primary');
				}
			});
			$('#khususA').hide();
			$('.dash').click(function() {
				if ($('.dash').is(":checked")) {
					$('#khususA').show();
				} else {
					$('#khususA').hide();
				}
			});
		});
	</script>
