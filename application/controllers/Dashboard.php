<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != 'login') {
			redirect(base_url('login/index'));
		}

		$this->load->model(array('m_data', 'm_c_pertumbuhan'));
		// $this->load->library('form_validation');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->session->unset_userdata('dashboard');
		$this->session->unset_userdata('tgl_batas1');
		$this->session->unset_userdata('tgl_batas2');
	
		$id = [
				'status'=> 0,
			];

		$kambing = $this->m_data->tampil_dashboard2('kambing',$id);
	
		$A=0;
		foreach ($kambing as $value) {
			$data[$A] = $value->no_ternak; 
			$A++;
		}
		$B=0;
		$C = 0;
		$BD2= [];
		$BM2= [];
		$BH2= [];
		$P2=[];
		$BD= [];
		$BM= [];
		$BH= [];
		$P=[];
		$KM=[];
		foreach ($data as  $value) {
			$bulan2 	= $this->m_data->tampil_data2('bulan','bulan_ke', 'no_ternak', $value);
			
			$berat2	= $bulan2->nilai_awal;
			$bulan_ke =  $bulan2->bulan_ke -1 ;
			$tampung  = [
					'no_ternak' => $value,
					'bulan_ke'	=> $bulan_ke,
			];

			$bulan 	= $this->m_data->get_where('bulan', $tampung);
			$jml	= $bulan2->nilai_awal -  $bulan->nilai_awal ;
			$datetime1 = new DateTime($bulan2->tgl_pencatatan);
			$datetime2 = new DateTime($bulan->tgl_pencatatan);
			$difference = $datetime1->diff($datetime2); 
			$rentang_tgl = $difference->days;
			

			$kondisi =empty($bulan2->kondisi) ? '' :  $bulan2->kondisi;
			$kondisi =empty($bulan2->kondisi) ? '' :  $bulan2->kondisi;
			$tampung  = [
				'no_ternak' => $value,
			];
			$kelamin = $this->m_data->get_where('kambing', $tampung);
			$kelamin = $kelamin->jenis_kelamin;

			if ($kondisi == 'Betina Hamil') {
				$BH[$C] = $value;
				$BH2[$C] = $jml;
				$BH3[$C] = $bulan2->nilai_awal;
				$C++;
			}
			if ($kondisi == 'Betina Menyusui') {
				$BM[$C] = $value;
				$BM2[$C] = $jml;
				$BM3[$C] = $bulan2->nilai_awal;
				$C++;
			}
			if ($kelamin == 'B' AND $bulan2->bulan_ke > 12 AND $kondisi != 'Betina Menyusui' AND $kondisi != 'Betina Hamil') {
				$BD[$C] = $value;
				$BD2[$C] = $jml;
				$BD3[$C] = $bulan2->nilai_awal;
				$C++;
			}
			if ($kelamin == 'P' AND $bulan2->bulan_ke > 12) {
				$P[$C] = $value;
				$P2[$C] = $jml;
				$P3[$C] = $bulan2->nilai_awal;
				$C++;
			}
			if ( $bulan2->bulan_ke <= 12) {
				$KM[$C] = $value;
				$KM2[$C] = $jml;
				$KM3[$C] = $bulan2->nilai_awal;
				$C++;
			}
			$B++;
			
		}

	
		
		if (count($BH2) != 0) {
		$average_bh = (array_sum($BH2)/count($BH))/$rentang_tgl;
		$average_bh = number_format($average_bh,3);
		}
		if (count($BM2) != 0) {
		$average_bm = (array_sum($BM2)/count($BM))/$rentang_tgl;
		$average_bm = number_format($average_bm,3);
		}
		if (count($BD2) != 0) {
		$average_bd = (array_sum($BD2)/count($BD))/$rentang_tgl;
		$average_bd = number_format($average_bd,3);
		}
		if (count($P2) != 0) {
		$average_p = (array_sum($P2)/count($P))/$rentang_tgl;
		$average_p = number_format($average_p,3);
		}
		if (count($KM2) != 0) {
		$average_km = (array_sum($KM2)/count($KM))/$rentang_tgl;
		$average_km = number_format($average_km,3);
		}

		$data = [
			'back' => base_url('home/index'),
			"header_judul" => "Dashboard",
			'bh'=> $bh = empty($average_bh) ? '': $average_bh,
			'bm'=> $bm = empty($average_bm) ? '': $average_bm,
			'bd'=> $bd = empty($average_bd) ? '': $average_bd,
			'p' => $p  = empty($average_p)  ? '': $average_p,
			'km'=> $km = empty($average_km) ? '': $average_km,
			'reset'=>false,
			'tgl'=>"27-08-2018 -> 26-01-2020",
		];
	
		$total=$this->m_data->tampil_dashboard4('rekam_penyakit');
		$i=0;
		foreach ($total as $value) {
			$data2[$i] = $value->id_penyakit;
			$tgl_tahun = explode('-', $value->tgl_pencatatan);
			$tahun[$i] = $tgl_tahun[0];
			$i++;
		}

		$count = array_count_values($data2);
		$unik  = array_unique($data2);
		$tahun  = array_unique($tahun);

		$R=0;
		foreach ($tahun as $tahun ) {
			$tahun2[$R] = $tahun;
			$R++;
		}
	
		$D=0;
		$E=0;
		foreach ($count as $count) {
			$count2[$D]=$count;
			$D++;
		}
		foreach ($unik as $unik) {
		
			$id = [
				'kunci'=> $unik,
			];
			$unik 	  = $this->m_data->get_where('penyakit',$id);
			
			$unik2[$E]= $unik->nm_penyakit;
			$unik3[$E]= $unik->kunci;
			$E++;
		}
		
		for ($i=0; $i < count($unik2) ; $i++) { 
			$data3[$i][0] = $unik2[$i];
			$data3[$i][1] = $count2[$i];
		}
		$F = 0;
		arsort($count2);
		array_multisort(array_column($data3, 1), SORT_DESC, $data3);
		$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	
		$data['count'] = $data3;
		$data['tahun'] = $tahun2;
		$data['bulan'] = $bulan;



		$data3=implode("-", $unik2);
		$data2=implode("-", $unik3);
		$array = array(
			'gejala' => $data3,
			'id_penyakit' => $data2,
		);
	
		$this->session->set_userdata( $array );
		

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('design_latar/form/footer_form');

		if (count($BH) != 0) {
			
			$BH_session=implode("-",$BH);
			$BH2_session=implode("-",$BH2);
			$BH3_session=implode("-",$BH3);
				$array = array(
				'BH' => $BH_session,
				'BH2' => $BH2_session,
				'BH3' => $BH3_session,
			);
			
			$this->session->set_userdata( $array );
			
		}
		if (count($BM) != 0) {
			$BM_session=implode("-",$BM);
			$BM2_session=implode("-",$BM2);
			$BM3_session=implode("-",$BM3);
				$array = array(
				'BM' => $BM_session,
				'BM2' => $BM2_session,
				'BM3' => $BM3_session,
			);
			$this->session->set_userdata( $array );
		}
		if (count($BD) != 0) {
			$BD_session=implode("-",$BD);
			$BD2_session=implode("-",$BD2);
			$BD3_session=implode("-",$BD3);
				$array = array(
				'BD' => $BD_session,
				'BD2' => $BD2_session,
				'BD3' => $BD3_session,
			);
			
			$this->session->set_userdata( $array );
		}
		if (count($P) != 0) {
			$P_session=implode("-",$P);
			$P2_session=implode("-",$P2);
			$P3_session=implode("-",$P3);
				$array = array(
				'P' => $P_session,
				'P2' => $P2_session,
				'P3' => $P3_session,
			);
			$this->session->set_userdata( $array );
		}
		
		if (count($KM)  != 0) {
			$KM_session=implode("-",$KM);
			$KM2_session=implode("-",$KM2);
			$KM3_session=implode("-",$KM3);
				$array = array(
				'KM' => $KM_session,
				'KM2' => $KM2_session,
				'KM3' => $KM3_session,
			);
			
			$this->session->set_userdata( $array );
		}
	
	}


public function detail_analisa_pertumbuhan()
	{
		$BH = $this->session->has_userdata('BH') ? explode('-',$this->session->userdata('BH')) : "";
		$BM = $this->session->has_userdata('BM') ? explode('-',$this->session->userdata('BM')) : "";
		$BD = $this->session->has_userdata('BD') ? explode('-',$this->session->userdata('BD')) : "";
		$P  = $this->session->has_userdata('P')  ? explode('-',$this->session->userdata('P')) : "";
		$KM = $this->session->has_userdata('KM') ? explode('-',$this->session->userdata('KM')) : "";
		$BH2 = $this->session->has_userdata('BH2') ? explode('-',$this->session->userdata('BH2')) : "";
		$BM2 = $this->session->has_userdata('BM2') ? explode('-',$this->session->userdata('BM2')) : "";
		$BD2 = $this->session->has_userdata('BD2') ? explode('-',$this->session->userdata('BD2')) : "";
		$P2  = $this->session->has_userdata('P2')  ? explode('-',$this->session->userdata('P2')) : "";
		$KM2 = $this->session->has_userdata('KM2') ? explode('-',$this->session->userdata('KM2')) : "";
		$BH3 = $this->session->has_userdata('BH3') ? explode('-',$this->session->userdata('BH3')) : "";
		$BM3 = $this->session->has_userdata('BM3') ? explode('-',$this->session->userdata('BM3')) : "";
		$BD3 = $this->session->has_userdata('BD3') ? explode('-',$this->session->userdata('BD3')) : "";
		$P3  = $this->session->has_userdata('P3')  ? explode('-',$this->session->userdata('P3')) : "";
		$KM3 = $this->session->has_userdata('KM3') ? explode('-',$this->session->userdata('KM3')) : "";

		$data = [
			'back' => base_url('dashboard/index'),
			"header_judul" => "Analisa Pertumbuhan",
			'BH'=> $BH ,
			'BM'=> $BM ,
			'BD'=> $BD ,
			'P' => $P  ,
			'KM'=> $KM,
			'BH2'=> $BH2 ,
			'BM2'=> $BM2 ,
			'BD2'=> $BD2 ,
			'P2' => $P2  ,
			'KM2'=> $KM2,
			'BH3'=> $BH3 ,
			'BM3'=> $BM3 ,
			'BD3'=> $BD3 ,
			'P3' => $P3  ,
			'KM3'=> $KM3,
		];

$array = array(
	'dashboard' => 'value'
);

$this->session->set_userdata( $array );

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('dashboard/detail_analisa_pertumbuhan', $data);
		$this->load->view('design_latar/form/footer_form');
		
	}


	public function detail_penyakit()
	{
		
$pilih = $this->input->post('pilih');
		$gejala = $this->session->userdata('gejala');
		$id_penyakit = $this->session->userdata('id_penyakit');
		// $gejala = trim("-", $gejala);
		$tahunx = $this->session->userdata('tgl_batas1');
			$tahun1 = $this->session->userdata('tgl_batas2');
$array = array(
		'tahunx' => $tahunx,
		'tahun1' => $tahun1,
	);
		$this->session->set_userdata( $array );
		$gejala = explode("-", $gejala);
		$id_penyakit = explode("-", $id_penyakit);



		$total=$this->m_data->tampil_dashboard4('rekam_penyakit');
			
		if ($tahunx AND $tahun1) {
			$data_penyakit = [
				// 'id_penyakit'=> $pilih,
				'status'=> 0,
			];
			
			$total = $this->m_data->tampil_dari('rekam_penyakit', 'tgl_pencatatan', $tahunx, $tahun1, $data_penyakit);
	
		}
		
		if(!empty($pilih)){
			
			$data_penyakit = [
				'id_penyakit'=> $pilih,
				'status'=> 0,
				
			];
			if ($tahunx AND $tahun1 AND $pilih == "all") {
					$data_penyakit = [
				// 'id_penyakit'=> $pilih,
				'status'=> 0,
			];
			$total = $this->m_data->tampil_dari('rekam_penyakit', 'tgl_pencatatan', $tahunx, $tahun1, $data_penyakit);
		
	}elseif($tahunx AND $tahun1  ){
$total = $this->m_data->tampil_dari2('rekam_penyakit', 'tgl_pencatatan', $tahunx, $tahun1,$data_penyakit);
	}
	else{
			$total = $this->m_data->tampil_dashboard5('rekam_penyakit', $data_penyakit);
			
	}
		}
// 
		$i=0;
		foreach ($total as $value) {
			$data2[$i] = $value->tgl_pencatatan;
			$array = [
				'kunci'=>  $value->id_penyakit,
			];
			$tampung = $this->m_data->get_where('penyakit',$array);
			$data3[$i] = $tampung->nm_penyakit;
			$data4[$i] = $value->no_ternak;
			$i++;
		}
		
		$data = [
			'back' => base_url('dashboard/index'),
			"header_judul" => "Analisa Penyakit",
		
		];
		if ($tahunx AND $tahun1) {
			$data['back']= base_url('dashboard/tentukan_batas');
		}
// $gejala = array_unique($data3);
// $M=0;
// foreach ($gejala as $key => $value) {
// 	$array = [
// 		'nm_penyakit'=>$value,
// 	];
// 	$gejala2=$this->m_data->get_where('penyakit',$array);
// 	$gejala4[$M]=$gejala2->kunci;
// 	$gejala3[$M]=$gejala2->nm_penyakit;
// 	$M++;
// }
		$kirim = [
			'count'=>$data2,
			'count2'=>$data3,
			'count3'=>$data4,
			'gejala2'=>$id_penyakit,
			'gejala'=>$gejala,
			
		];
// print_r($count);
		// die();
		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('dashboard/detail_penyakit', $kirim);
		// $this->load->view('design_latar/footer_home');
	}

	public function tentukan_batas()
	{
		$tahun	= $this->input->post('tahun');
		$tahun1	= $this->input->post('tahun1');
		$bulan	= $this->input->post('bulan');
		$bulan1	= $this->input->post('bulan1');
		$tgl	= $this->input->post('tgl');
		$tgl1	= $this->input->post('tgl1');

		
		$tahunx	= empty($tahun)   ?	$this->session->userdata('tgl_batas1') : $tahun.'-'.$bulan.'-'.$tgl; 
		$tahun1	= empty($tahun1)  ? $this->session->userdata('tgl_batas2') : $tahun1.'-'.$bulan1.'-'.$tgl1; 
		
		$id = [
				'status'=> 0,
			];

		$kambing = $this->m_data->tampil_dashboard2('kambing',$id);

		$A = 0;
		foreach ($kambing as $value) {
			$data[$A] = $value->no_ternak;
			
			$A++;
		}
		$B = 0;
		$C = 0;
		$BD2 = [];
		$BM2 = [];
		$BH2 = [];
		$P2 = [];
		$KM = [];
		$KM2 = [];
		$data = [];
		$data2 = [];
		$unik = [];
		$unik2 = [];
		$unik3 = [];
		$data3 = [];
		$count2 = [];
		foreach ($data as  $value) {
			$bulan2 	= $this->m_data->tampil_data2('bulan', 'bulan_ke', 'no_ternak', $value);

			$berat2	= $bulan2->nilai_awal;
			$bulan_ke =  $bulan2->bulan_ke - 1;
			$tampung  = [
				'no_ternak' => $value,
				'bulan_ke'	=> $bulan_ke,
			];

			$bulan 	= $this->m_data->get_where('bulan', $tampung);
			$jml	= $bulan2->nilai_awal -  $bulan->nilai_awal;
			// print_r($jml);
			// die();
			$kondisi = empty($bulan2->kondisi) ? '' :  $bulan2->kondisi;
			$kondisi = empty($bulan2->kondisi) ? '' :  $bulan2->kondisi;
			$tampung  = [
				'no_ternak' => $value,
			];
			$kelamin = $this->m_data->get_where('kambing', $tampung);
			$kelamin = $kelamin->jenis_kelamin;


			if ($kondisi == 'Betina Hamil') {
				$BH[$C] = $value;
				$BH2[$C] = $jml;
				$C++;
			}
			if ($kondisi == 'Betina Menyusui') {
				$BM[$C] = $value;
				$BM2[$C] = $jml;
				$C++;
			}
			if ($kelamin == 'B' and $bulan2->bulan_ke > 12 and $kondisi != 'Betina Menyusui' and $kondisi != 'Betina Hamil') {
				$BD[$C] = $value;
				$BD2[$C] = $jml;
				$C++;
			}
			if ($kelamin == 'P' and $bulan2->bulan_ke > 12) {
				$P[$C] = $value;
				$P2[$C] = $jml;
				$C++;
			}
			if ($bulan2->bulan_ke <= 12) {
				$KM[$C] = $value;
				$KM2[$C] = $jml;
				$C++;
			}
			$B++;
		}

		if (count($BH2) != 0) {
			$average_bh = (array_sum($BH2) / count($BH)) / 30;
			$average_bh = number_format($average_bh, 3);
		}
		if (count($BM2) != 0) {
			$average_bm = (array_sum($BM2) / count($BM)) / 30;
			$average_bm = number_format($average_bm, 3);
		}
		if (count($BD2) != 0) {
			$average_bd = (array_sum($BD2) / count($BD)) / 30;
			$average_bd = number_format($average_bd, 3);
		}
		if (count($P2) != 0) {
			$average_p = (array_sum($P2) / count($P)) / 30;
			$average_p = number_format($average_p, 3);
		}
		if (count($KM2) != 0) {
			$average_km = (array_sum($KM2) / count($KM)) / 30;
			$average_km = number_format($average_km, 3);
		}

		$data = [
			'back' => base_url('home/index'),
			"header_judul" => "Dashboard",
			'bh' => $bh = empty($average_bh) ? '' : $average_bh,
			'bm' => $bm = empty($average_bm) ? '' : $average_bm,
			'bd' => $bd = empty($average_bd) ? '' : $average_bd,
			'p' => $p  = empty($average_p)  ? '' : $average_p,
			'km' => $km = empty($average_km) ? '' : $average_km,
			'reset' => true,
			
		];
		
		$AA=[
			'status'=>0,
		];
		$total = $this->m_data->tampil_dari('rekam_penyakit', 'tgl_pencatatan', $tahunx, $tahun1, $AA);
	
		$array = array(
			'tgl_batas1' => $tahunx,
			'tgl_batas2' => $tahun1,
		);
		
		$this->session->set_userdata( $array );
		$rekam_penyakit = $this->m_data->tampil_dashboard4('rekam_penyakit');
		$i = 0;
		$T = 0;
		foreach ($total as $value) {
			$data2[$i] = $value->id_penyakit;
			$i++;
		}

		foreach ($rekam_penyakit as $key ){
			$tgl_tahun = explode('-', $key->tgl_pencatatan);
			$tgl[$T] = $key->tgl_pencatatan;
			$tahu[$T] = $tgl_tahun[0];
			// die($tahu[$T]);
			$T++;
		}

		$count = array_count_values($data2);
		$unik  = array_unique($data2);
		$tahun  = array_unique($tahu);

		$R = 0;
		foreach ($tahun as $tahun) {
			$tahun2[$R] = $tahun;
			$R++;
		}
		$D = 0;
		$E = 0;
		foreach ($count as $count) {
			$count2[$D] = $count;
			$D++;
		}
		foreach ($unik as $unik) {

			$id = [
				'kunci' => $unik,
			];
			$unik 	  = $this->m_data->get_where('penyakit', $id);

			$unik2[$E] = $unik->nm_penyakit;
			$unik3[$E] = $unik->kunci;
			$E++;
		}

		for ($i = 0; $i < count($unik2); $i++) {
			$data3[$i][0] = $unik2[$i];
			$data3[$i][1] = $count2[$i];
		}
		$F = 0;
		if (count($count2) != 0) {
			arsort($count2);
		}
		array_multisort(array_column($data3, 1), SORT_DESC, $data3);

		$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");


		$data['count'] = $data3;
		$data['tahun'] = $tahun2;
		$data['bulan'] = $bulan;
		$a1 = explode("-", trim($tahunx));
		$a1 = $a1[2]."-".$a1[1]."-".$a1[0];
		$a2 = explode("-", trim($tahun1));
		$a2 = $a2[2]."-".$a2[1]."-".$a2[0];
		$data['tgl'] = $a1." -> ".$a2;

// 'tgl'=>"27-08-2018 - 26-01-2020",

	$data3=implode("-", $unik2);
		$data2=implode("-", $unik3);
		$array = array(
			'gejala' => $data3,
			'id_penyakit' => $data2,
		);

$this->session->set_userdata( $array );

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('design_latar/form/footer_form');
	}
	}
