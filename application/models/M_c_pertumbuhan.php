<?php
class M_c_pertumbuhan extends CI_Model {

function cek_kesehatan($jenis_kelamin,$nilai_awal,$berat){
		//Data Cek_kesehatan
		$tingkatkan = "";		$tingkat1 		= "Tingkatkan Berat";
								$tingkat2		= "Turunkan Berat";

		$kondisi	= "";		$sehat 			= "Sehat";
								$tidak_sehat	= "tidak Sehat";
								$melebihi_batas = "Melebihi Berat Normal";
								$sehat 			= "Sehat";

		if ($jenis_kelamin == "B") {
			switch ($nilai_awal) {
				case 0:
				case 1:
				case 2:
				case 3:
					if ($berat < 2.28) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 10.12) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;

					//Group 2  6.10 – 12.50 
				case 4:
				case 5:
				case 6:
					if ($berat < 6.10) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 12.50) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;

					//Group 3  11.33 – 16.68  
				case 7:
				case 8:
				case 9:
					if ($berat < 11.33) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 16.68) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;

					//Group 4  12.79 – 17.92  
				case 10:
				case 11:
					
				case 12:
					if ($berat < 12.79) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 17.92) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;

					//Group 5  12.68 – 24.82  
				case 13:
				case 14:
				case 15:
				case 16:
				case 17:
				case 18:
					if ($berat < 12.68) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 25.82) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;

					//Group 6   17.78 – 25.67
				case 19:
				case 20:
				case 21:
				case 22:
				case 23:
				case 24:
				case 25:
				case 26:
				case 27:
				case 28:
				case 29:
				case 30:
					if ($berat < 17.78) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 26.67) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;
				default:
					if ($berat < 23.04) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 35.13) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;
			}
		}else{
			switch ($nilai_awal) {
				case 0:
				case 1:
				case 2:
				case 3:
					if ($berat < 2.28) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 10.12) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;

					//Group 2  6.10 – 12.50 
				case 4:
				case 5:
				case 6:
					if ($berat < 6.10) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 12.50) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;

					//Group 3  11.33 – 16.68  
				case 7:
				case 8:
				case 9:
					if ($berat < 11.33) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 16.68) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;

					//Group 4  12.79 – 17.92  
				case 10:
				case 11:

				case 12:
					if ($berat < 12.79) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 17.92) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;

					//Group 5  12.68 – 24.82  
				case 13:
				case 14:
				case 15:
				case 16:
				case 17:
				case 18:
					if ($berat < 12.68) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 30.82) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;

					//Group 6   17.78 – 25.67
				case 19:
				case 20:
				case 21:
				case 22:
				case 23:
				case 24:
				case 25:
				case 26:
				case 27:
				case 28:
				case 29:
				case 30:
					if ($berat < 17.78) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 31.67) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;
				default:

					if ($berat < 23.04) {
						$kondisi = $tidak_sehat;
						$tingkatkan = $tingkat1;
					} elseif ($berat > 41.13) {
						$kondisi = $melebihi_batas;
						$tingkatkan = $tingkat2;
					} else {
						$kondisi = $sehat;
					}
					break;
			}
		}
		$data=[
			'tingkatkan'=>$tingkatkan,
			'kondisi'=>$kondisi,
		];
		return $data;
		}
		
function tgl($kambing){
		date_default_timezone_set('Asia/Jakarta');
		$db				 = $this->m_data->get_id('kambing', 'no_ternak', $kambing);
		$db1			 = $this->m_data->get_id('tgl', 'id_tgl', 1);

		// $tahun		     = substr($db['tgl_lahir'], 6, 4);
		// $bulan			 = substr($db['tgl_lahir'], 3, 2);
		// $tgl			 = substr($db['tgl_lahir'], 0, 2);
		// $tgl		 	 = $tahun . "-" . $bulan . "-" . $tgl;
		$waktu_awal      = strtotime($db['tgl_lahir']);
		// $waktu_sekarang  = date('d-m-Y');
		$waktu_sekarang  = strtotime($db1['tgl']);
		// die($waktu_sekarang);
		$usia 			 = timespan($waktu_awal, $waktu_sekarang, 4);

		$usia			 = explode(" ", $usia);
		//Sorting Nilai Array 1Minutes, Hours,
		$angka1			 = !empty($usia[0]) ? $usia[0] : false;
		$value1			 = !empty($usia[1]) ? $usia[1] : false;
		if ($value1 == "Minutes," or $value1 == "Minute,"   or $value1 == "Minutes" or $value1 == "Minute") {
			$value1 = " ";
			$angka1 = " ";
		} elseif ($value1 == "Hours," or $value1 == "Hour,"   or $value1 == "Hours" or $value1 == "Hour") {
			$value1 = " ";
			$angka1 = " ";
		} elseif ($value1 == "Days," or $value1 == "Day,"     or $value1 == "Days" or $value1 == "Day") {
			$value1 = "Hari";
		} elseif ($value1 == "Weeks," or $value1 == "Week,"   or $value1 == "Weeks" or $value1 == "Week") {
			$value1 = "Minggu";
		} elseif ($value1 == "Months," or $value1 == "Month," or $value1 == "Months" or $value1 == "Month") {
			$value1 = "Bulan";
		} elseif ($value1 == "Years," or $value1 == "Year,"	or $value1 == "Years" or $value1 == "Year") {
			$value1 = "Tahun";
		} else {
			$value1 = " ";
			$angka1 = " ";
		}

		//Sorting Nilai Array 2
		$angka2			 = !empty($usia[2]) ? $usia[2] : false;
		$value2			 = !empty($usia[3]) ? $usia[3] : false;
		if ($value2 == "Minutes," or $value2 == "Minute,"	  or $value2 == "Minutes" or $value2 == "Minute") {
			$value2 = " ";
			$angka2 = " ";
		} elseif ($value2 == "Hours," or $value2 == "Hour,"   or $value2 == "Hours" or $value2 == "Hour") {
			$value2 = " ";
			$angka2 = " ";
		} elseif ($value2 == "Days," or $value2 == "Day," 	  or $value2 == "Days" or $value2 == "Day") {
			$value2 = "Hari";
		} elseif ($value2 == "Weeks," or $value2 == "Week,"	  or $value2 == "Weeks" or $value2 == "Week") {
			$value2 = "Minggu";
		} elseif ($value2 == "Months," or $value2 == "Month," or $value2 == "Months" or $value2 == "Month") {
			$value2 = "Bulan";
		} else {
			$value2 = " ";
			$angka2 = " ";
		}

		//Sorting Nilai Array 3
		$angka3			 = !empty($usia[4]) ? $usia[4] : false;
		$value3			 = !empty($usia[5]) ? $usia[5] : false;
		if ($value3 == "Minutes," or $value3 == "Minute," or $value3 == "Minutes" or $value3 == "Minute") {
			$value3 = " ";
			$angka3 = " ";
		} elseif ($value3 == "Hours,"  or $value3 == "Hour,"  or $value3 == "Hours"  or $value3 == "Hour") {
			$value3 = " ";
			$angka3 = " ";
		} elseif ($value3 == "Days,"   or $value3 == "Day,"   or $value3 == "Days"   or $value3 == "Day") {
			$value3 = "Hari";
		} elseif ($value3 == "Weeks,"  or $value3 == "Week,"  or $value3 == "Weeks"  or $value3 == "Week") {
			$value3 = "Minggu";
		} elseif ($value3 == "Months," or $value3 == "Month," or $value3 == "Months" or $value3 == "Month") {
			$value3 = "Bulan";
		} else {
			$value3 = " ";
			$angka3 = " ";
		}

		//Sorting Nilai Array 3
		$angka4			 = !empty($usia[6])  ? $usia[6] : false;
		$value4			 = !empty($usia[7])  ? $usia[7] : false;
		if ($value4 == "Minutes," or $value4 == "Minute,"     or $value4 == "Minutes" or $value4 == "Minute") {
			$value4 = " ";
			$angka4 = " ";
		} elseif ($value4 == "Hours,"  or $value4 == "Hour,"  or $value4 == "Hours"  or $value4 == "Hour") {
			$value4 = " ";
			$angka4 = " ";
		} elseif ($value4 == "Days,"   or $value4 == "Day,"   or $value4 == "Days"   or $value4 == "Day") {
			$value4 = "Hari";
		} elseif ($value4 == "Weeks,"  or $value4 == "Week,"  or $value4 == "Weeks"  or $value4 == "Week") {
			$value4 = "Minggu";
		} elseif ($value3 == "Months," or $value4 == "Month," or $value3 == "Months" or $value4 == "Month") {
			$value4 = "Bulan";
		} else {
			$value4 = " ";
			$angka4 = " ";
		}

		// var_dump($usia);
		$usia = $angka1 . " " . $value1 . " " . $angka2 . " " . $value2 . " " . $angka3 . " " . $value3 . " " . $angka4 . " " . $value4;
		// echo $usia;

		return $usia;
}

	public function setAwal($usia)
	{
		$usia			 = explode(" ", $usia);
		$angka_minggu2 	 = 0;
		for ($i = 0; $i <= 7; $i++) {
			$minggu = $usia[$i];
			if ($minggu == "Minggu") {
				$a = $i - 1;
				$angka_minggu2 = (int) $usia[$a];
			}
		}
		//hari
		$angka_hari2 = 0;
		for ($i = 0; $i <= 7; $i++) {
			$hari = $usia[$i];
			if ($hari == "Hari") {
				$a = $i - 1;
				$angka_hari2 = (int) $usia[$a];
			}
		}

		//Bulan
		$angka_bulan2 = 0;
		for ($i = 0; $i <= 7; $i++) {
			$hari = $usia[$i];
			if ($hari == "Bulan") {
				$a = $i - 1;
				$angka_bulan2 = (int) $usia[$a];
			}
		}
		$angka_tahun2 = 0;
		for ($i = 0; $i <= 7; $i++) {
			$hari = $usia[$i];
			if ($hari == "Tahun") {
				$a = $i - 1;
				$angka_tahun2 = (int) $usia[$a];
			}
		}
		$angka_minggu2  = $angka_minggu2 * 7;
		$angka_tahun2 	= $angka_tahun2 * 12;
		$total			= $angka_minggu2 + $angka_hari2;
		$total2			= $angka_bulan2 + $angka_tahun2; //Nilai Awal 21

		// $total			= 20;
		if ($total >= 16) {
			$total			= $total2 + 1;
			$total2			= $total2 + 2;
		} else {
			$total			= $total2;
			$total2			= $total2 + 1;
		}

		$data = [
			'nilai_awal' => $total,
			'nilai_akhir' => $total2,
		];

		return $data;
	}

	public function target($nilai_akhir,$jenis_kelamin){
		$value1 = "";
		$value2 = "";
		$value3 = "";
		if ($jenis_kelamin=="B") {
			switch ($nilai_akhir) {
				case 1:
				case 2:
				case 3:
					$value1 = 5.76;
					$value2 = 6.76;
					$value3 =  "2,28 – 10,12";
					break;
				case 4:
				case 5:
				case 6:
					$value1 = 9.31;
					$value2 = 10.31;
					$value3 =  "6,10 – 12,50";
					break;

					//Group 3  11.33 – 16.68  
				case 7:
				case 8:
				case 9:
					$value1 = 13.41;
					$value2 = 14.41;
					$value3 =  "11,33 – 16,68";
					break;

					//Group 4  12.79 – 17.92  
				case 10:
				case 11:
				case 12:
					$value1 = 14.52;
					$value2 = 15.52;
					$value3 =  "12,79 – 17,92 ";
					break;

					//Group 5  12.68 – 24.82  
				case 13:
				case 14:
				case 15:
				case 16:
				case 17:
				case 18:
					$value1 = 19.14;
					$value2 = 25;
					$value3 =  "12,68 – 25,82";
					break;

					//Group 6   17.78 – 25.67
				case 19:
				case 20:
				case 21:
				case 22:
				case 23:
				case 24:
				case 25:
				case 26:
				case 27:
				case 28:
				case 29:
				case 30:
					$value1 = 21.13;
					$value2 = 25;
					$value3 =  "17,78 – 25,67";
					break;
				default:
					$value1 = 24;
					$value2 = 25;
					$value3 =  "23,04 – 35,13";
					break;
			}
		}else{
			switch ($nilai_akhir) {
				case 1:
				case 2:
				case 3:
					$value1 = 5.76;
					$value2 = 6.76;
					$value3 =  "2,28 – 10,12";
					break;
				case 4:
				case 5:
				case 6:
					$value1 = 9.31;
					$value2 = 10.31;  
					$value3 =  "6,10 – 12,50";
					break;

					//Group 3  11.33 – 16.68  
				case 7:
				case 8:
				case 9:
					$value1 = 13.41;
					$value2 = 14.41;
					$value3 =  "11,33 – 16,68";
					break;

					//Group 4  12.79 – 17.92  
				case 10:
				case 11:
				case 12:
					$value1 = 14.52;
					$value2 = 15.52;
					$value3 =  "12,79 – 17,92 ";
					break;

					//Group 5  12.68 – 24.82  
				case 13:
				case 14:
				case 15:
				case 16:
				case 17:
				case 18:
					$value1 = 24.14;
					$value2 = 30;
					$value3 =  "12,68 – 30,82";
					break;

					//Group 6   17.78 – 25.67
				case 19:
				case 20:
				case 21:
				case 22:
				case 23:
				case 24:
				case 25:
				case 26:
				case 27:
				case 28:
				case 29:
				case 30:
					$value1 = 25.13;
					$value2 = 30;
					$value3 =  "17,78 – 31,67";
					break;
				default:
					$value1 = 25;
					$value2 = 30;
					$value3 =  "23,04 – 41,13";
					break;
		}
	}

		$data = [
			'value1' => $value1,
			'value2' => $value2,
			'value3' => $value3,
		];

		return $data;
	}

    }

