<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sistem_pakar extends CI_Controller
{
	private $penyakit;
	protected $header_judul = "Sistem Pakar";
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != 'login') {
			redirect(base_url('login/index'));
		}

		$this->load->model(array('m_data', 'm_c_pertumbuhan','m_pakar'));
		// $this->load->library('form_validation');
		$this->load->helper(array('form'));
	}

	public function index()
	{
		
		$this->session->unset_userdata('no_ternak');
		
		$cari_kambing = [
			'id_user'	=> 	$this->session->userdata('id_user'),
			'status'	=> 	0,
		];
		$db		 = $this->m_data->get_where_objek('kambing', $cari_kambing);
	
		$data = [
			'back' 			=> base_url('home/index'),
			'judul_header'	=> "",
			'header_judul'	=> $this->header_judul,
			'value_button'	=> 'Berikutnya',
			'link_form'		=> base_url('M_sistem_pakar/cari_gejala/'),
			'kambing'		=> $db,
			'informasi'		=> FALSE,
		];

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('design_latar/form/header_form');
		$this->load->view('c_pertumbuhan/index', $data);
		$this->load->view('design_latar/form/button_form');
		$this->load->view('design_latar/form/footer_form');
	}

	public function cari_gejala()
	{
		$this->session->unset_userdata('cek_kesehatan_gejala');
		$back 			= base_url('M_sistem_pakar/index');
		$this->session->unset_userdata('overview');
		if ($this->uri->segment('3') == true) {
			$no_ternak  = $this->uri->segment('3');
			$back 		= base_url('home/overview_kambing/') . $no_ternak;
			$this->session->set_userdata('overview', 'overview');
		}
		$data = [
			'back' 			=> $back,
			'judul_header'	=> "",
			'header_judul'	=> $this->header_judul,
			'value_button'	=> 'Berikutnya',
			'link_form'		=> '',
		];
		$kambing = $this->input->post('kambing') ? $this->input->post('kambing') : $this->uri->segment('3');
		$this->session->set_userdata('no_ternak',$kambing);
	
		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('design_latar/form/header_form');
		$this->load->view('sistem_pakar/index', $data);
		$this->load->view('design_latar/form/footer_form');
	 }

	public function edit()
	{

	 }

	public function tampung()
	{
		$gejala  = $this->input->post('id') ? trim(strtolower( $this->input->post('id'))) : 'xxx';
		$db		 = $this->m_data->cariGejala('gejala','nm', $gejala);
		// $db		 = $this->m_data->tampil_data('gejala');
		// var_dump($db);
		$i=0;
		foreach ($db as $value) {
			$hasil 		= $value['nm'];
			$data[$i] 	= $hasil;
			$hasil2 	= $value['kunci'];
			$data2[$i]	= $hasil2;
			$i++;
		}
		// $link1 = base_url('M_sistem_pakar/gejala/').$data2[0];
		// $link2 = base_url('M_sistem_pakar/gejala/').$data2[1];
		// $link3 = base_url('M_sistem_pakar/gejala/').$data2[2];
		// $link4 = base_url('M_sistem_pakar/gejala/').$data2[3];
		// $link5 = base_url('M_sistem_pakar/gejala/').$data2[4];
			// $hasil1 = empty($data[0]) ? ' ' : "<button type=\"button\" id=\"h1\" value=" . $data2[0] . " class=\"btn btn-primary btn-sm btn-block\" style=\"font-size: 15px; font-family: serif;\">" . $data[0] . "</button>";
			// $hasil2 = empty($data[1]) ? ' ' : "<button type=\"button\" id=\"h2\" value=" . $data2[1] . " class=\"btn btn-primary btn-sm btn-block\" style=\"font-size: 15px; font-family: serif;\">" . $data[1] . "</button>";
			// $hasil3 = empty($data[2]) ? ' ' : "<button type=\"button\" id=\"h3\" value=" . $data2[2] . " class=\"btn btn-primary btn-sm btn-block\" style=\"font-size: 15px; font-family: serif;\">" . $data[2] . "</button>";
			// $hasil4 = empty($data[3]) ? ' ' : "<button type=\"button\" id=\"h4\" value=" . $data2[3] . " class=\"btn btn-primary btn-sm btn-block\" style=\"font-size: 15px; font-family: serif;\">" . $data[3] . "</button>";
			// $hasil5 = empty($data[4]) ? ' ' : "<button type=\"button\" id=\"h5\" value=" . $data2[4] . " class=\"btn btn-primary btn-sm btn-block\" style=\"font-size: 15px; font-family: serif;\">" . $data[4] . "</button>";
		// // $array = array($hasil1);
		$link1 =empty($data2[0]) ? ' ' : base_url('M_sistem_pakar/gejala/').$data2[0];
		$link2 =empty($data2[1]) ? ' ' : base_url('M_sistem_pakar/gejala/').$data2[1];
		$link3 =empty($data2[2]) ? ' ' : base_url('M_sistem_pakar/gejala/').$data2[2];
		$link4 =empty($data2[3]) ? ' ' : base_url('M_sistem_pakar/gejala/').$data2[3];
		$link5 =empty($data2[4]) ? ' ' : base_url('M_sistem_pakar/gejala/').$data2[4];

		$hasil1 = empty($data[0]) ? ' ' : "<a href=\"$link1\" id=\"h1\" class=\" list-group-item list-group-item-action list-group-item-secondary\" style=\"font-size: 13px;     line-height: 14px; \"><b>  ". $data[0]. "</b><i class=\"fas fa-arrow-up float-right\" style=\"transform: rotate(60deg);\"></i></a>";
		$hasil2 = empty($data[1]) ? ' ' : "<a href=\"$link2\" id=\"h2\" class=\"list-group-item list-group-item-action\" style=\"font-size: 13px;     line-height: 14px;\"><b>  ". $data[1]."</b><i class=\"fas fa-arrow-up float-right\" style=\"transform: rotate(60deg);\"></i></a>";
		$hasil3 = empty($data[2]) ? ' ' : "<a href=\"$link3\" id=\"h3\" class=\"list-group-item list-group-item-action\" style=\"font-size: 13px;     line-height: 14px;\"><b>  ". $data[2]."</b><i class=\"fas fa-arrow-up float-right\" style=\"transform: rotate(60deg);\"></i></a>";
		$hasil4 = empty($data[3]) ? ' ' : "<a href=\"$link4\" id=\"h4\" class=\"list-group-item list-group-item-action\" style=\"font-size: 13px;     line-height: 14px;\"><b>  ". $data[3]."</b><i class=\"fas fa-arrow-up float-right\" style=\"transform: rotate(60deg);\"></i></a>";
		$hasil5 = empty($data[4]) ? ' ' : "<a href=\"$link5\" id=\"h5\" class=\"list-group-item list-group-item-action\" style=\"font-size: 13px;     line-height: 14px;\"><b>  ". $data[4]."</b><i class=\"fas fa-arrow-up float-right\" style=\"transform: rotate(60deg);\"></i></a>";
		
		$array = array($hasil1, $hasil2, $hasil3, $hasil4, $hasil5);
		// $array = array($hasil1);
		echo json_encode($array);
	 }
	 
	public function tampungB()
	{
		$gejala  = $this->input->post('id') ? trim(strtolower($this->input->post('id'))) : '11';
		$db		 = $this->m_data->cariGejala('gejala', 'nm', $gejala);

		$i = 0;
		foreach ($db as $value) {
			$hasil2 	= $value['kunci'];
			$data2[$i]	= $hasil2;
			$i++;
		}
		$hasil1 = empty($data2[0]) ? ' ':$data2[0];
		$hasil2 = empty($data2[1]) ? ' ':$data2[1];  
		$hasil3 = empty($data2[2]) ? ' ':$data2[2]; 
		$hasil4 = empty($data2[3]) ? ' ':$data2[3]; 
		$hasil5 = empty($data2[4]) ? ' ':$data2[4];  

		$array = array($hasil1, $hasil2, $hasil3, $hasil4, $hasil5);
		// $array = array($hasil1);
		echo json_encode($array);
	
	 }
	public function tampungBB()
	{
		$gejala  = $this->input->post('id') ? trim(strtolower( $this->input->post('id'))) : 'xxx';
		$db		 = $this->m_data->cariGejala('gejala','nm', $gejala);
		// $db		 = $this->m_data->tampil_data('gejala');
		// var_dump($db);
		$i=0;
		foreach ($db as $value) {
			$hasil 		= $value['nm'];
			$data[$i] 	= $hasil;
			$hasil2 	= $value['kunci'];
			$data2[$i]	= $hasil2;
			$i++;
		}
				
			$hasil1= $data[0];
			$hasil2= $data[1];
			$hasil3= $data[2];
			$hasil4= $data[3];
			$hasil5= $data[4];

			$array = array($hasil1, $hasil2, $hasil3, $hasil4, $hasil5);
		// $array = array($hasil1);
		echo json_encode($array);
	
	 }
	public function tampungA()
	{
		$gejala  = $this->input->post('id');
	// $this->session->unset_userdata('number');
	// die();
		$benar = false;
		if($this->session->has_userdata('number')){

			$array2 = $this->session->userdata('number');
			$tampung = explode("-", $array2);
			$jml = count($tampung);

			for ($i = 0; $i < $jml; $i++) {
				if ($tampung[$i] == $gejala) {
				$benar = true;
				}
			}

			if (!$benar) {
				$tampung[$jml] = $gejala;
				$tampung3 = implode("-", $tampung);
				$data = [
					"number" => $tampung3
				];
				$this->session->set_userdata($data);
			}
			# code...
			$tampung3 = implode("-", $tampung);
			$array3 = array($tampung3);
			echo json_encode($array3);
			
		}else{
		
			$data = [
				"number" => $gejala
			];
			$this->session->set_userdata($data);
			$array3 = array($gejala);
			echo json_encode($array3);
		}
		
	 }
	public function deleteSession()
	{	
		$gejala 	= $this->input->post('id');

		$array2 	= $this->session->userdata('number');
		$tampung	= explode("-", $array2);
		$jml		= count($tampung);

			for ($i = 0; $i < $jml; $i++) {
				if ($tampung[$i] == $gejala) {
				$b=$i;
				}
			}
			unset($tampung[$b]);
				$tampung3 = implode("-", $tampung);
				$data = [
					"number" => $tampung3,
				];
				$this->session->set_userdata($data);
		$array3 = array($tampung3);
			echo json_encode($array3);
			
	 }


	public function gejala()
	{
		if ($this->session->has_userdata('pakar')) {
			$this->session->unset_userdata('pakar');
		}
		$this->session->unset_userdata('sistem_pakar');
		$this->session->unset_userdata('sistem_pakar2');

		$this->session->unset_userdata('check');
		$this->session->unset_userdata('check2');
// die();
// $this->session->unset_userdata('overview');
		$kunci	= $this->uri->segment('3');
		$no_ternak = $this->session->userdata('no_ternak');
		$back = base_url('M_sistem_pakar/cari_gejala');
		if ($this->session->has_userdata('overview')) {
			$back = base_url('M_sistem_pakar/cari_gejala/') . $no_ternak;
		}
	
		$data_A	=[
			'number'=>$kunci,
		];
		$this->session->set_userdata($data_A);
		

		$gejala = array($kunci);
		if ($this->session->has_userdata('cek_kesehatan_gejala')) {
			$back		= base_url('M_cek_kesehatan/hasil');
			$gejala 	= $this->session->userdata('cek_kesehatan_gejala');
			$hasil 		= explode("-",trim($gejala,"-"));
			$jml_hasil  = count($hasil);
			// $jml_hasil  = count($hasil)-1;
			$b= "";
			$c= "";
		
			for ($i=0; $i < $jml_hasil ; $i++) { 
				$dss = $this->m_pakar->pakarIF($hasil[$i]);
				$a   = implode("-", $dss);
				$b	 = $a."-";
				$c .= $b;
			}
			$dss = explode("-",$c);
			$dss =  array_unique($dss);

			$dss = array_diff($dss,$hasil);
			
			$dss = implode('-',$dss);
			$dss = trim($dss,'-');
			//Hasil output Dss
			$dss = explode('-',$dss);
			//Hasil output Gejala
			$hasil = $this->session->userdata('cek_kesehatan_gejala');
			$hasil = trim($hasil,"-");
			$hasil 	= explode("-", $hasil);
			$gejala = $hasil;
		
		
			$data_b 	= $this->session->userdata('cek_kesehatan_gejala');
			$data_A	= [
				'number' => trim($data_b,"-"),
			];
			$this->session->set_userdata($data_A);

		}else {
			$dss	= $this->m_pakar->pakarIF($kunci);
		}


		$o=0;
		$dss1 = array();
		$dss2 = array();
	
		foreach ($dss as $value) {
			$db=$this->m_data->get_id('gejala','kunci',$value);
			$dss1[$o]=$db['kunci'];
			$dss2[$o]=$db['nm'];
			$o++;
		}
		
		$o = 0;
		$gejala1 = array();
		$gejala2 = array();
		foreach ($gejala as $value) {
			$db=$this->m_data->get_id('gejala','kunci',$value);
			$gejala1[$o]=$db['kunci'];
			$gejala2[$o]=$db['nm'];
			$o++;
		}
		
		
		$data = [
			'back' 			=> $back,
			'judul_header'	=> "",
			'header_judul'	=> $this->header_judul,
			'value_button'	=> 'Cek Gejala',
			'link_form'		=> base_url('M_sistem_pakar/pakar/').$kunci,
			// 'link_form'		=> "",
			'informasi'		=> FALSE,
			'gejala_a'		=> $gejala1,
			'gejala_b'		=> $gejala2,
			'kunci'			=> $dss1,
			'gejala'		=> $dss2,
			'gejala_awal'	=> implode("-",$gejala1),
			// 'jml'			=> count($gejala_awal2),
			'page'			=> 1,
		];

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('design_latar/form/header_form');
		$this->load->view('sistem_pakar/gejala', $data);
		$this->load->view('design_latar/form/button_form');
		$this->load->view('design_latar/form/footer_form');
	 }


	public function pakar()
	{
	
		$kunci			= $this->session->userdata('number');
		$no_ternak		= $this->session->userdata('no_ternak');
		$gejala_awal 	= $this->uri->segment('3');
		$kunci2			= $gejala_awal;
		$gejala_awal	= explode("-",$gejala_awal);
		$gejala 		= explode("-", $kunci);
		$double_nilai_teringgi = "C";
		$double_nilai_teringgi2 = 0;
		$value_probabilitas = false;
		$value_dss			= false;
		
		if (!$this->session->has_userdata('cek_kesehatan_kondisi')) {
				
			$penyakit= $this->m_pakar->penyakit($gejala);
			$double_nilai_teringgi = "A";

			$tampung			= trim($penyakit[1], '-');
			$tampung 			= explode('-',$tampung);
			$jml_penyakit_dss   = count($tampung);
			$this->penyakit		= $tampung[0];
			$value_dss			= true;
			if ($jml_penyakit_dss != 1) {
			
				//Jika Nilai Dibawah 60%
			$value_probabilitas = true;
			$value_dss			= false;
			$tampung_penyakit	= $tampung;
			
			}

			if ($penyakit[1] == false) {
				$double_nilai_teringgi = "D";
			
			}

		}else{
			
			// Jika Nilai Teringgi Ditemukan
			$probabilitas	= $this->m_pakar->probabilitas($gejala);
			// die();
		
			if ($probabilitas[2] > 60) {
				$data_gejala = $probabilitas[0];
				$data_penyakit = $probabilitas[1];
				$jml_data_penyakit = count($probabilitas[0]);
				$tampung_penyakit =  array();
				for ($i = 1; $i <= $jml_data_penyakit; $i++) {
						$tampung_penyakit[$i] = $data_penyakit[$i];
				}
			
			if (count($tampung_penyakit) == 1) {
					$this->penyakit		= $tampung_penyakit[1];
					$value_dss			= true;
					$double_nilai_teringgi = "D";
				
				
			}else{
					$penyakit	= $this->m_pakar->probabilitas($gejala);
					$data_gejala = $penyakit[0];
					$data_gejala2 = $penyakit[0];
					$data_penyakit = $penyakit[1];
					//diurutkan Data dari terbesar ke Terkecil
					rsort($data_gejala2);
					$data_tampung 		= array();
					$data_penyakit_tampung 		= array();
					$data_persentase 	= array();

					$A = 0;
					for ($u = 0; $u < count($data_gejala2); $u++) {
						for ($i = 1; $i <= count($data_gejala); $i++) {
							if ($data_gejala2[$u] == $data_gejala[$i]) {
								$data_tampung[$A] = $data_penyakit[$i];
								$A++;
							}
						}
					}
					$A = 0;
					$data_tampung = array_unique($data_tampung);

					

					for ($i=0; $i < count($data_tampung) ; $i++) { 
						if ($data_gejala2[$i] > 60) {
							$data_penyakit_tampung[$A] = $data_tampung[$i];
							$data_persentase[$A] =	$data_gejala2[$i];
							$A++;
						}
					}
					if (count($data_penyakit_tampung) == 1) {
						$this->penyakit		= $data_penyakit_tampung;
						$value_dss			= true;
						$value_probabilitas = false;
						$double_nilai_teringgi = "D";
					}
					

					$value_probabilitas = false;
					$value_dss			= true;
					//Buntu
					
					$tampung_penyakit	= $data_penyakit_tampung;
					$tampung_percentase = $data_persentase;
				
			}
			}else{
				$double_nilai_teringgi = "D";
			}
		}


		if ($double_nilai_teringgi == "D") {
		
			$probabilitas	= $this->m_pakar->probabilitas($gejala);
			
			$A = 0;
			if ($probabilitas[2] > 60) {
				if ($probabilitas[2] > 60) {
					$data_gejala = $probabilitas[0];
					$data_penyakit = $probabilitas[1];
					$jml_data_penyakit = count($probabilitas[0]);
					$tampung_penyakit =  array();
					for ($i = 1; $i <= $jml_data_penyakit; $i++) {
							if ($data_gejala[$i] == $probabilitas[2]) {
								$tampung_penyakit[$A] = $data_penyakit[$i];
								$A++;
							}
					}
					// $double_nilai_teringgi = "B";
					
					$tampung			=	$tampung_penyakit;
					$jml_penyakit_dss   = count($tampung);
					// print_r($tampung);
					// die();
					if ($jml_penyakit_dss == 1) {
						$double_nilai_teringgi = "X";
						//Jika Nilai Dibawah 60%
						$value_probabilitas = true;
						$value_dss			= false;
						// $this->penyakit		= $tampung[1];
						$this->penyakit		= $tampung[0];
						$tampung_percentase[0]		=	$probabilitas[2];
					
					}
					// $double_nilai_teringgi2 = $probabilitas[2];
				}
			} else {
				//Jika Nilai Dibawah 60%
				$penyakit	= $this->m_pakar->probabilitas($gejala);
				$data_gejala = $penyakit[0];
				$data_gejala2 = $penyakit[0];
				$data_penyakit = $penyakit[1];
				//diurutkan Data dari terbesar ke Terkecil
				rsort($data_gejala2);
				$data_tampung = array();

				$A = 0;
				for ($u = 0; $u < count($data_gejala2); $u++) {
					for ($i = 1; $i <= count($data_gejala); $i++) {
						if ($data_gejala2[$u] == $data_gejala[$i]) {
							$data_tampung[$A] = $data_penyakit[$i];
							$A++;
						}
					}
				}
				$value_probabilitas = true;
				$value_dss			= false;
				//Buntu
				$data_tampung = array_unique($data_tampung);
				$tampung_penyakit	= $data_tampung;
				$tampung_percentase = $data_gejala2;
			}
			
		}

		$data_back = [
			'back' 			=> base_url('M_sistem_pakar/gejala/') . $kunci2,
			'judul_header'	=> "",
			'header_judul'	=> $this->header_judul,
			'value_button'	=> 'Cek Gejala',
			'link_form'		=> "",
			'header_judul'	=> $this->header_judul,
		];
		$data_button = [
			'link_form'		=> base_url('home/overview_kambing/') . $no_ternak,
			'hijau'			=> "btn-success",
			'value_button'	=> "Simpan",
		];

		$array = array(
			'check' => 'tambah',
			'check2' => 'penyakit',
		);
		
		$this->session->set_userdata( $array );
		

	if ($value_probabilitas == true) {
		$i=0;
		$data_tampung=array();
		foreach ($tampung_penyakit as $penyakit) {
			$penyakit		= $this->m_data->get_id('penyakit', 'kunci', $penyakit);
			$data_tampung[$i]= $penyakit['nm_penyakit'];
			$i++;
		}
			if ($double_nilai_teringgi == "A") {
				$percentase = false;
			} else {
				$percentase = $tampung_percentase;
			}

			$o = 0;
			foreach ($gejala as $value) {
				$db = $this->m_data->get_id('gejala', 'kunci', $value);
				$gejala2[$o] = $db['nm'];
				$o++;
			}
			$data_probabilitas = [
				'penyakit' => $data_tampung,
				'percentase' => $percentase,
				'gejala'		=> $gejala2,
			];

			$array = array(
				'sistem_pakar2' => $this->penyakit,
			);

			$this->session->set_userdata($array);
			
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data_back);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('sistem_pakar/probabilitas',$data_probabilitas);
			$this->load->view('design_latar/form/footer_form');
			$this->load->view('design_latar/form/button_round_tambah', $data_button);
	}
	if ($value_dss == true) {
			$penyakit		= $this->m_data->get_id('penyakit', 'kunci', $this->penyakit);
			$o = 0;

			//gk guna
			foreach ($gejala as $value) {
				$db = $this->m_data->get_id('gejala', 'kunci', $value);
				$gejala2[$o] = $db['nm'];
				$o++;
			}

			//Persiapan Data
			$data = [
				'penyakit'		=> $penyakit['nm_penyakit'],
				'gejala'		=> $gejala2,
			];

		
			$array = array(
				'sistem_pakar' => $this->penyakit,
			);

			$this->session->set_userdata($array);
			

			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data_back);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('sistem_pakar/penyakit', $data);
			$this->load->view('design_latar/form/footer_form');
			$this->load->view('design_latar/form/button_round_tambah', $data_button);
	}
	}

	

}
