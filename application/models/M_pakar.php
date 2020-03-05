<?php
class M_pakar extends CI_Model {

	protected $tampung;
	protected $tampung2 = false;

	function penyakit($data){
		$hitung = count($data);
$penyakit=[
	"P1","P2","P3","P4","P5","P6","P7","P8","P9","P10",
	"P11","P12","P13","P14","P15","P16","P17","P18","P19","P20",
	"P21","P22","P23","P24","P25"
];

		// Kudis (Scabies)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G1") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G2") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G3") {
								for ($i = 0; $i < $hitung; $i++) {
									if ($data[$i] == "G4") {
										$this->tampung = $penyakit[0];
										$this->tampung2 .= $penyakit[0].'-';
									}
								}
							}
						}
					}
				}
			}
		}
	
		//Belatungan (Myasis)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G5") {
						 $this->tampung 	= $penyakit[1];
					     $this->tampung2 	.= $penyakit[1] . '-';
			}
		}
	
		// Radang Susu (Mastitis)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == 'G6') {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] =='G7') {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == 'G8') {
								for ($i = 0; $i < $hitung; $i++) {
									if ($data[$i] == 'G9') {
										$this->tampung = $penyakit[2];
										$this->tampung2 	.= $penyakit[2] . '-';
									
									}
								}
							}
						}
					}
				}
			}
		}
		
//Keropeng (Orf)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G10") {
				$this->tampung = $penyakit[3];
					$this->tampung2 	.= $penyakit[3] . '-';
			}
		}

		//Demam Susu(Milk Fever)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G11") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G12") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G13") {
								 $this->tampung = $penyakit[4];
								 	$this->tampung2 	.= $penyakit[4] . '-';
							}
						}
					}
				}
			}
		}
	
		// Kejang Rumput (Grass Tetani)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G15") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G14") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G16") {
								 $this->tampung = $penyakit[5];
								 	$this->tampung2 	.= $penyakit[5] . '-';
							}
						}
					}
				}
			}
		}

		// Kelumpuhan
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G15") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G43") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G50") {
								 $this->tampung = $penyakit[20];
								 	$this->tampung2 	.= $penyakit[20] . '-';
							}
						}
					}
				}
			}
		}

		//Titani
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G15") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G53") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G54") {
								 $this->tampung = $penyakit[23];
								 	$this->tampung2 	.= $penyakit[23] . '-';
							}
						}
					}
				}
			}
		}

		//Kuku Busuk (Foot Rot)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G17") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G18") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G19") {
								 $this->tampung = $penyakit[6];
								 	$this->tampung2 	.= $penyakit[6] . '-';
							}
						}
					}
				}
			}
		}

		//Keracunan Tanaman
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G20") {
				 $this->tampung = $penyakit[7];
				 	$this->tampung2 	.= $penyakit[7] . '-';
			}
		}

		//Diare
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G21") {
				 $this->tampung = $penyakit[10];
				 	$this->tampung2 	.= $penyakit[10] . '-';
			}
		}

		//Kutu
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G24") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G22") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G23") {
								$this->tampung = $penyakit[9];
								for ($i = 0; $i < $hitung; $i++) {
									if ($data[$i] == "G60") {
										$this->tampung = $penyakit[9];
											$this->tampung2 	.= $penyakit[9] . '-';
									}
								}
							}
						}
					}
				}
			}
		}

		//Cacingan
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G24") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G22") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G23") {
								for ($i = 0; $i < $hitung; $i++) {
									if ($data[$i] == "G25") {
										 $this->tampung = $penyakit[8];
										 	$this->tampung2 	.= $penyakit[8] . '-';
									}
								}
							}
						}
					}
				}
			}
		}

		//Konstipasi/sembelit
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G28") {
			for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G62") {
				 $this->tampung = $penyakit[22];
				 	$this->tampung2 	.= $penyakit[22] . '-';
			}
			}
			}
		}

		//Perut Kembung (Bloating)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G28") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G27") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G29") {
								$this->tampung = $penyakit[11];
									$this->tampung2 	.= $penyakit[11] . '-';
							}
						}
					}
				}
			}
		}

		//Pink eye
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G31") {
			for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G61") {
				$this->tampung = $penyakit[14];
					$this->tampung2 	.= $penyakit[14] . '-';
			}
			}
			}
		}

		//Sakit Mata
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G31") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G30") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G32") {
								for ($i = 0; $i < $hitung; $i++) {
									if ($data[$i] == "G33") {
										 $this->tampung = $penyakit[12];
										 	$this->tampung2 	.= $penyakit[12] . '-';
									}
								}
							}
						}
					}
				}
			}
		}
		
		//Penyakit mulut dan kuku (PMK)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G34") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G35") {
						 $this->tampung = $penyakit[13];
						 	$this->tampung2 	.= $penyakit[13] . '-';
					}
				}
			}
		}

		//Penyakit radang limbah (Antraks)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G37") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G36") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G38") {
								 $this->tampung = $penyakit[15];
								 	$this->tampung2 	.= $penyakit[15] . '-';
							}
						}
					}
				}
			}
		}

		//Radang Paru-paru  (Pneumonia)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G37") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G36") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G39") {
								for ($i = 0; $i < $hitung; $i++) {
									if ($data[$i] == "G41") {
										for ($i=0; $i < $hitung; $i++) { 
											if ($data[$i] == "G42") {
												 $this->tampung = $penyakit[17];
												 	$this->tampung2 	.= $penyakit[17] . '-';
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}

		//Ngorok (Septicaemia Epizootica)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G37") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G36") {
						for ($i = 0; $i < $hitung; $i++) {
							// if ($data[$i] == "G39") {
								for ($i = 0; $i < $hitung; $i++) {
									if ($data[$i] == "G41") {
										for ($i=0; $i < $hitung; $i++) { 
											if ($data[$i] == "G42") {
												for ($i = 0; $i < $hitung; $i++) {
													if ($data[$i] == "G59") {
														for ($i = 0; $i < $hitung; $i++) {
															if ($data[$i] == "G40") {
																$this->tampung =  $penyakit[16];
																	$this->tampung2 	.= $penyakit[16] . '-';
															}
														}
													}
												}
											}
										}
									}
								}
							// }
						}
					}
				}
			}
		}

		//Enterotoxemia
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G37") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G36") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G51") {
								for ($i = 0; $i < $hitung; $i++) {
									if ($data[$i] == "G52") {
										 $this->tampung = $penyakit[21];
										 	$this->tampung2 	.= $penyakit[21] . '-';
									}
								}
							}
						}
					}
				}
			}
		}

		//Dermatitis
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G46") {
			for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G63") {
				$this->tampung = $penyakit[18];
					$this->tampung2 	.= $penyakit[18] . '-';
			}
			}
			}
		}

		//Peste des Petites Ruminants (PPR)
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G46") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G47") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G48") {
								for ($i = 0; $i < $hitung; $i++) {
									if ($data[$i] == "G49") {
										 $this->tampung = $penyakit[19];
										 	$this->tampung2 	.= $penyakit[19] . '-';
									}
								}
							}
						}
					}
				}
			}
		}

		//Radang Pusar
		for ($i = 0; $i < $hitung; $i++) {
			if ($data[$i] == "G55") {
				for ($i = 0; $i < $hitung; $i++) {
					if ($data[$i] == "G56") {
						for ($i = 0; $i < $hitung; $i++) {
							if ($data[$i] == "G57") {
								for ($i = 0; $i < $hitung; $i++) {
									if ($data[$i] == "G58") {
										 $this->tampung = $penyakit[24];
										 	$this->tampung2 	.= $penyakit[24] . '-';
									}
								}
							}
						}
					}
				}
			}
		}
		$data = [$this->tampung, $this->tampung2];

		return $data;
	}


	public function probabilitas($gejala)
	{
		$data = [
			"P1"  => ["G1", "G2", "G3", "G4"],
			"P2"  => ["G5"],
			"P3"  => ["G6", "G7", "G8", "G9"],
			"P4"  => ["G10"],
			"P5"  => ["G11", "G12", "G13"],
			"P6"  => ["G15", "G14", "G16"],
			"P7"  => ["G17", "G18", "G19"],
			"P8"  => ["G20"],
			"P9"  => ["G22", "G24", "G23", "G25"],
			"P10" => ["G22", "G24", "G23", "G60"],
			"P11" => ["G21"],
			"P12" => ["G27", "G29","G28"],
			"P13" => ["G30", "G32", "G33", "G31"],
			"P14" => ["G34", "G35"],
			"P15" => ["G31", "G61"],
			"P16" => ["G36", "G37", "G38"],
			"P17" => ["G36", "G37", "G39", "G41", "G42", "G59", "G40"],
			"P18" => ["G36", "G37", "G39", "G41", "G42"],
			"P19" => ["G46","G63"],
			"P20" => ["G47", "G48", "G49", "G46"],
			"P21" => ["G15", "G43", "G50"],
			"P22" => ["G36", "G37", "G51", "G52"],
			"P23" => ["G28", "G62"],
			"P24" => ["G15", "G53", "G54"],
			"P25" =>  ["G55", "G56", "G57", "G58"],
		];

		$penyakit = array();
		$hasil	  = array();
		$A = 1;
		for ($i=1; $i <=25 ; $i++) { 
			$P= "P".$i;
			$P2= array_diff($data[$P],$gejala);
			$jml_data 	= count($data[$P]); // 1
			$jml_data_P	= count($P2); //1

			$jml_hasil	= $jml_data - $jml_data_P;
		
			if (($jml_hasil / $jml_data) * 100  != 0) {
				$hasil[$A]		= floor(($jml_hasil / $jml_data) * 100);
				$penyakit[$A] = $P;
				$A++;
			}
		}
		// print_r($gejala);
		$nilai_tertinggi = array_unique($hasil);
		$nilai_tertinggi = max($nilai_tertinggi);

		$data = [$hasil, $penyakit, $nilai_tertinggi];
		return $data;
	}

	public function gejala($i)
	{
		$data = [
			"P1"  => ["G1", "G2", "G3", "G4"],
			"P2"  => ["G5"],
			"P3"  => ["G6", "G7", "G8", "G9"],
			"P4"  => ["G10"],
			"P5"  => ["G11", "G12", "G13"],
			"P6"  => ["G15", "G14", "G16"],
			"P7"  => ["G17", "G18", "G19"],
			"P8"  => ["G20"],
			"P9"  => ["G22", "G24", "G23", "G25"],
			"P10" => ["G22", "G24", "G23", "G60"],
			"P11" => ["G21"],
			"P12" => ["G27", "G29", "G28"],
			"P13" => ["G30", "G32", "G33", "G31"],
			"P14" => ["G34", "G35"],
			"P15" => ["G31", "G61"],
			"P16" => ["G36", "G37", "G38"],
			// "P17" => ["G36", "G37", "G39", "G41", "G42", "G59", "G40"],
			"P17" => ["G36", "G37", "G41", "G42", "G59", "G40"],
			"P18" => ["G36", "G37", "G39", "G41", "G42"],
			"P19" => ["G46","G3"],
			"P20" => ["G47", "G48", "G49", "G46"],
			"P21" => ["G15", "G43", "G50"],
			"P22" => ["G36", "G37", "G51", "G52"],
			"P23" => ["G28", "G62"],
			"P24" => ["G15", "G53", "G54"],
			"P25" =>  ["G55", "G56", "G57", "G58"],
		];


		$data = $data[$i];
		return $data;
	}


	public function pakarIF($kunci)
	{
		if ($kunci == "G1" or $kunci == "G2" or $kunci == "G3" or $kunci == "G4") {
			$dss = ["G1", "G2", "G3", "G4"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G5") {
			$dss = ['G5'];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G6" or $kunci == "G7" or $kunci == "G8" or $kunci == "G9") {
			$dss = ["G6", "G7", "G8", "G9"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G10") {
			$dss = ['G10'];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G11" or $kunci == "G12" or $kunci == "G13") {
			$dss = ["G11", "G12", "G13"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G15") {
			$dss = ["G15", "G14", "G16", "G43", "G50", "G53", "G54"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G14" or $kunci == "G16") {
			$dss = ["G15", "G14", "G16"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G43" or $kunci == "G50") {
			$dss = ["G15", "G43", "G50"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G53" or $kunci == "G54") {
			$dss = ["G15", "G53", "G54"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G17" or $kunci == "G18" or $kunci == "G19") {
			$dss = ["G17", "G18", "G19"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G20") {
			$dss = ['G20'];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G21") {
			$dss = ['G21'];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G24") {
			$dss = ["G22", "G24", "G23", "G25", "G60"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G22" or $kunci == "G23" or $kunci == "G25") {
			$dss = ["G22", "G24", "G23", "G25", "G60"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G22" or $kunci == "G23" or $kunci == "G60") {
			$dss = ["G22", "G24", "G23", "G25", "G60"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G28" or $kunci == "G62") {
			$dss = ["G27", "G29","G28", "G62"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G27" or $kunci == "G29") {
			$dss = ["G27", "G29", "G28"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G31" or $kunci == "G61") {
			$dss = ["G31", "G30", "G32", "G33",  "G61"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G30" or $kunci == "G32" or $kunci == "G33") {
			$dss = ["G30", "G32", "G33", "G31"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G34" or $kunci == "G35") {
			$dss = ["G34", "G35"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G36" or $kunci == "G37") {
			$dss = ["G36", "G37", "G38", "G39", "G41", "G42", "G51", "G52","G40", "G59"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G38") {
			$dss = ["G36", "G37", "G38"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G51" or $kunci == "G52") {
			$dss = ["G36", "G37", "G51", "G52"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G39" or $kunci == "G41" or $kunci == "G42") {
			$dss = ["G36", "G37", "G39", "G41", "G42"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G39" or $kunci == "G41" or $kunci == "G42" or $kunci == "G59"  or $kunci == "G40" ) {
			$dss = ["G36", "G37", "G39", "G41", "G42", "G59", "G40"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G46" or $kunci == "G63") {
			$dss = ["G46", "G47", "G48", "G49",  "G63"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G47" or $kunci == "G48" or $kunci == "G49") {
			$dss = ["G47", "G48", "G49", "G46"];
			$dss = $this->_dss($kunci, $dss);
		}
		if ($kunci == "G55" or $kunci == "G56" or $kunci == "G57" or $kunci == "G58") {
			$dss = ["G55", "G56", "G57", "G58"];
			$dss = $this->_dss($kunci, $dss);
		}
		return $dss;
	}


	public function _dss($kunci, $dss)
	{
		$dss_count = count($dss) - 1;
		for ($i = 0; $i <= $dss_count; $i++) {
			if ($kunci == $dss[$i]) {
				unset($dss[$i]);
			}
		}
		return $dss;
	}

}
