<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	protected $header_judul = "Informasi Kambing";
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != 'login') {
			redirect(base_url('login/index'));
		}

		$this->load->model(array('m_data','m_c_pertumbuhan'));
		// $this->load->library('form_validation');
		$this->load->helper(array('form'));
	}

	public function index()
	{
	
		$no_ternak2 = $this->session->userdata("no_ternak2") ? $no_ternak2 = $this->session->userdata('no_ternak2') : " ";
		$no_ternak 	= $this->session->userdata("no_ternak") ? $no_ternak = $this->session->userdata('no_ternak') : " ";
		$data_tampil = [
			'id_user' => $this->session->userdata('id_user'),
		];
		$data_tampil2 = [
			'id_user' => $this->session->userdata('id_user'),
			'status'  => 0,
		];
		$db 	=  $this->m_data->tampil_data_berdasarkan('kambing',$data_tampil2,13,0);
		$user 	=  $this->m_data->get_where('user',$data_tampil);
		$o=1;
		$no_ternak3 = array();
		$gambar= array();
		foreach ($db as $value) {
			$no_ternak3[$o] = $value->no_ternak;
			$gambar[$o]    = $value->gambar_kambing;
			$o++;
		}
		$check		= $this->session->has_userdata('check') ? $this->session->userdata('check') : " ";
		$check2		= $this->session->has_userdata('check2') ? $this->session->userdata('check2') : " ";

		$this->session->unset_userdata('check');
		$this->session->unset_userdata('check2');
		$data = [
			'kambing' 		=> $no_ternak3,
			'gambar'		=> $gambar,
			'no_ternak2'	=> $no_ternak2,
			'no_ternak'		=> $no_ternak,
			'header_judul'	=> $this->header_judul,
			'user'			=> $user,
			// 'check'			=> 'delete',
			// 'check2'		=> 'kambing',	
			'check'			=> $check,
			'check2'		=> $check2,	
		];
	

		$this->load->view('design_latar/home/header_home');
		$this->load->view('home/index', $data);
		$this->load->view('design_latar/home/footer_home');
		$data_session = ['no_ternak2','no_ternak','nilai_target','nilai_awal','nilai_akhir','kategori','nilai_tengah_kesehatan','nilai_kesehatan'];
		$this->session->unset_userdata($data_session);
	}

	public function history()
	{

$history = $this->m_data->get_where_objek_not_in('kambing');

$data = [

'back'			=> base_url('home/index'),
"header_judul" 	=> "History Kambing",
'all'			=> $history,
];

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back',$data);
		$this->load->view('design_latar/home/history_button_up');
		$this->load->view('home/history', $data);


	 }
	public function history_all()
	{
$s = $this->uri->segment(3);

if ($s == "terjual") {
$cari = [
	'status'=> 1,
];
}

if ($s == "all") {
	redirect('home/history');
}

if ($s == "meninggal") {
$cari = [
	'status'=> 2,
];

}

$history = $this->m_data->get_where_objek('kambing', $cari);

$data = [

'back'			=> base_url('home/index'),
"header_judul" 	=> "History Kambing",
'all'			=> $history,
];

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back',$data);
		$this->load->view('design_latar/home/history_button_up');
		$this->load->view('home/history', $data);


	 }

	public function informasi()
	{
		$data = [
			'back'			=> base_url('home/index'),
			"header_judul" 	=> "Informasi",
			'link_form'		=> '',
			'juduL_haeder'	=> '',
		];

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back',$data);
		// $this->load->view('design_latar/form/header_form');
		$this->load->view('home/informasi');
		// $this->load->view('design_latar/home/footer');
	 }

	public function detail_informasi(){
		$id_bulan 		= $this->uri->segment('3');
		$no_ternak 		= $this->uri->segment('4');
		$kambing 		= $this->m_data->get_id('kambing', 'no_ternak', $no_ternak);
		// $bulan 			= $this->m_data->get_id('bulan', 'no_ternak', $no_ternak);
		$bulan 			= $this->m_data->get_id_2i('bulan', 'bulan_ke', $id_bulan,'no_ternak',$no_ternak);
		

		$no_ternak 		= $kambing['no_ternak'];
		$jenis_kelamin 	= $kambing['jenis_kelamin'];
		$tgl_lahir 		= $kambing['tgl_lahir'];
		$telinga 		= $kambing['telinga'];
		$warna 			= $kambing['pola_warna'];
		$gambar 		= $kambing['gambar_kambing'];
		$kondisi 		= $bulan['kondisi'];
		$usia			= $bulan['bulan_ke'];
		$berat			= $bulan['nilai_awal'];
		$target			= $bulan['nilai_target'];

		$bb_rata_rata	= $this->m_c_pertumbuhan->target($usia, $jenis_kelamin);
		$value3			= $bb_rata_rata['value3'];
		$kategori 		= '';
		if ($jenis_kelamin == 'B') {
			if ($usia >= 12) {
				$kategori = 'Betina Dewasa';
			} else {
				$kategori = 'Kambing Muda';
			}
		} else {
			if ($usia >= 12) {
				$kategori = 'Pejantan';
			} else {
				$kategori = 'Kambing Muda';
			}
		}
		if ($kategori == 'Kambing Muda') {
			$niali_value1	= ((int) $berat * 10 / 100) * 2;
			$value1_1	 	= $niali_value1 * 60 / 100;
			$value1_2 		= $niali_value1 * 40 / 100;
		} else {
			$niali_value1 	= ((int) $berat * 10 / 100) * 2;
			$value1_1 		= $niali_value1 * 75 / 100;
			$value1_2 		= $niali_value1 * 25 / 100;
		}

		// var_dump($kambing);
		$data = [
			'back' 			=> base_url('home/overview_kambing/').$no_ternak,		
			'judul_header' 	=> "",
			'tingkatkan'	=> false,						'hijau' 		=> "hijau",
			'link_form'		=>	"",							'simpan'		=> base_url('Crud_kambing/tambah'),
			'value_button'	=> 'Simpan',
			'header_judul'	=> $this->header_judul,			
			// 'informasi'		=> $informasi,
		];
		$data_kambing = [
			"no_ternak" 	=> $no_ternak,
			"jenis_kelamin" => $jenis_kelamin,		"tgl_lahir"		=> $tgl_lahir,
			"telinga" 		=> $telinga,			"warna" 		=> $warna,
			"nama_gambar" 	=> $gambar,				"kondisi"		=> $kondisi,
			"berat"			=> $berat,				"usia"			=> $usia,
			"kondisi"		=> $kondisi,			'value3'		=> $value3,
			'value1_1'		=> $value1_1,			'value1_2'		=> $value1_2,
			'target'		=> $target,	
		];
		$data_tgl_pencatatan=[
			'tgl_pencatatan' => $bulan['tgl_pencatatan']
		];

		if ($target == 0) {
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('home/detail_informasi_header', $data_tgl_pencatatan);
			$this->load->view('design_latar/form/header_form', $data);
			$this->load->view('home/detail_informasi', $data_kambing);
			$this->load->view('design_latar/form/footer_form');
			$this->load->view('design_latar/form/button');
			// die();
		}else{
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('home/detail_informasi_header', $data_tgl_pencatatan);
			$this->load->view('design_latar/form/header_form', $data);
			$this->load->view('home/detail_informasi', $data_kambing);
			$this->load->view('design_latar/form/footer_form');
		}
		
	}

	public function overview_kambing()
	{
		$this->session->unset_userdata('kondisi');
		
		$no_ternak 		= $this->uri->segment('3') ? $this->uri->segment('3'): $this->session->userdata('no_ternak');;
		$kambing 		= $this->m_data->get_id('kambing','no_ternak',$no_ternak);
	


		$no_pejantan 	= $kambing['no_pejantan'];
		$no_induk 		= $kambing['no_induk'];			$no_ternak 		= $kambing['no_ternak'];
		$jenis_kelamin 	= $kambing['jenis_kelamin'];	$tgl_lahir 		= $kambing['tgl_lahir'];
		$telinga 		= $kambing['telinga'];			$warna 			= $kambing['pola_warna'];
		$gambar 		= $kambing['gambar_kambing'];	
		$pakar 			= false;
		$check		= $this->session->has_userdata('check') ? $this->session->userdata('check') : " ";
		$check2		= $this->session->has_userdata('check2') ? $this->session->userdata('check2') : " ";

		$this->session->unset_userdata('check');
		$this->session->unset_userdata('check2 ');

			
	
		if ($this->session->has_userdata('sistem_pakar')) {
		$tgl 		= $this->m_data->get_id('tgl', 'id_tgl', 1);
		$sistem_pakar		= $this->session->userdata('sistem_pakar');
	
		$a = explode('-' ,trim($tgl['tgl']));
		$b = $a[2].'-'.$a[1].'-'.$a[0];
		$penyakit 	= $sistem_pakar;
		$rekam_penyakit = [
			"id_kambing"	=> $no_ternak,
			'id_penyakit'	=> $penyakit,
			'tgl_pencatatan'=> $b,
			'id_user'		=> $this->session->userdata('id_user'),
		];
		 $this->m_data->insert_data('rekam_penyakit', $rekam_penyakit);
    	 $this->session->unset_userdata('sistem_pakar');
    	 $this->session->unset_userdata('no_ternak');
		}
		if ($this->session->has_userdata('sistem_pakar2')) {
			$tgl 			= $this->m_data->get_id('tgl', 'id_tgl', 1);
			$a 				= explode('-' ,trim($tgl['tgl']));
			$b 				= $a[2].'-'.$a[1].'-'.$a[0];
			
			$rekam_penyakit = [
				"id_kambing"	=> $no_ternak,
				'id_penyakit'	=> "P26",
				'tgl_pencatatan'=> $b,
				'id_user'		=> $this->session->userdata('id_user'),
				// 'id_hubungi_dokter'		=> 1,
			];
			$this->m_data->insert_data('rekam_penyakit', $rekam_penyakit);
			$this->session->unset_userdata('sistem_pakar2');
			$this->session->unset_userdata('no_ternak');
		}
		$pakar = [
			'rekam_penyakit.id_kambing'	=> $no_ternak,
			'rekam_penyakit.id_user'	=> $this->session->userdata('id_user'),
		];

		$catat_berat = [
			"no_ternak"		=> $no_ternak,
			'id_user'		=> $this->session->userdata('id_user'),
		];
		$informasi 		= $this->m_data->get_list_berat('bulan', 'no_ternak', $no_ternak, 'id_user', $this->session->userdata('id_user'), 4, 0, 'bulan_ke', 'DESC');

		$cek = $this->m_data->get_kambing('bulan', $catat_berat);
		$jumlah_berat = ceil(count($cek) / 3);

		$pakar = $this->m_data->join2('rekam_penyakit', 'kambing', 'kambing.no_ternak=rekam_penyakit.id_kambing', 
		$pakar, 'penyakit', 'penyakit.kunci=rekam_penyakit.id_penyakit','rekam_penyakit.tgl_pencatatan'
		,'DESC',3, 0);
		// print_r($pakar);
		// die();
		$pakar_sistem = [
			"id_kambing"	=> $no_ternak,
			'id_user'		=> $this->session->userdata('id_user '),
		];
		$cek = $this->m_data->get_kambing3('rekam_penyakit', $pakar_sistem);
		$jumlah_pakar = ceil(count($cek) / 3);

		$kesehatan = [
			"no_ternak"	=> $no_ternak,
			'id_user'	=> $this->session->userdata('id_user'),
		];


		$pagination_kesehatan 	=  0;
		$pagination_tengah_kesehatan 	= 1;
		
		$cek_kesehatan = $this->m_data->get_kesehatan('kesehatan', $kesehatan, 3,$pagination_kesehatan, 'tgl_cek_kesehatan', 'DESC');
		$cek = $this->m_data->get_kambing('kesehatan ', $kesehatan);
		$jumlah_kesehatan = ceil(count($cek) / 3);
		$data_kambing = [
			"no_pejantan" 	=> $no_pejantan,
			"no_induk"		=> $no_induk,			"no_ternak" 	=> $no_ternak,
			"jenis_kelamin" => $jenis_kelamin,		"tgl_lahir"		=> $tgl_lahir,
			"telinga" 		=> $telinga,			"warna" 		=> $warna,
			"nama_gambar" 	=> $gambar,				'check'			=> $check,
			'check2'	=> $check2,	
			'id_user' => $this->session->userdata('id_user'),
		];

		$data = [
			'back' 			=> base_url('home/index'),		'judul_header' 	=> "",
			'tingkatkan'	=> false,						'hijau' 		=> "hijau",
			'link_form'		=>	"",							'simpan'		=> base_url('Crud_kambing/tambah'),
			'value_button'	=> 'Simpan',					'informasi'		=> $informasi,
			'header_judul'	=> $this->header_judul,			'pakar'			=> $pakar,
			'cek_kesehatan'	=> $cek_kesehatan,	
			'nilai_tengah_kesehatan'	=> $pagination_tengah_kesehatan,	
			'nilai_kesehatan'	=> $pagination_kesehatan,	
			'jumlah_catat_berat'	=> $jumlah_berat,	
			'jumlah_kesehatan'		=> $jumlah_kesehatan,	
			'jumlah_pakar'		=> $jumlah_pakar,	
			
		];

		if ($this->session->has_userdata('dashboard')) {
			$data['back'] =  base_url('dashboard/detail_analisa_pertumbuhan');	
		}

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('design_latar/form/header_form', $data);
		$this->load->view('home/overview_kambing', $data_kambing);
		$this->load->view('design_latar/form/footer_form');
		$this->load->view('home/overview_tabel_kambing',$informasi);
		// $this->load->view('design_latar/home/footer');
	 }

	 function overview_sistem_pakar(){

		$no_ternak 			= $this->uri->segment('4');
		
		$data_back	= [
			'header_judul'	=> 'Informasi Penyakit', 'link_form' 	=> "",
			'back' 			=> base_url('home/overview_kambing/').$no_ternak,		'judul_header' 	=> "",
		];

		$hubungi_dokter =  $this->uri->segment('5') ? $this->uri->segment('5') : false;
		$penyakit 			= $this->uri->segment('3');

		if ($hubungi_dokter) {
			$penyakit			= [
				'id_hubungi_dokter'	=> $penyakit,
			];
			$penyakit =	$this->m_data->get_where('hubungi_dokter', $penyakit);

			$data		= [
				'penyakit' 	=> $penyakit->diagnosis,
				'catatan' 	=> $penyakit->catatan,
			];
			$this->load->view('design_latar/home/header_home', $data_back);
			$this->load->view('design_latar/home/navigasi_back', $data_back);
			// $this->load->view('design_latar/form/header_form');
			$this->load->view('home/hubungi_dokter', $data);
			// $this->load->view('design_latar/form/footer_form');
		} else {

			$penyakit			= [
				'kunci'	=> $penyakit,
			];
			$penyakit =	$this->m_data->get_where('penyakit', $penyakit);

			$data		= [
				'penyakit' 	=> $penyakit->nm_penyakit,
			];
			$this->load->view('design_latar/home/header_home', $data_back);
			$this->load->view('design_latar/home/navigasi_back', $data_back);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('sistem_pakar/overview_penyakit', $data);
			$this->load->view('design_latar/form/footer_form');
		}
	 }

		function tambah_hubungi_dokter(){
				$no_ternak 		= $this->uri->segment('3');
				$hubungi_dokter = [
						'diagnosis' =>  $this->input->post("penyakit"),
						'catatan'  	=>  $this->input->post("catatan"),
				];
			
			
				$id_user = [
					"id_penyakit" => $this->uri->segment('4'),
					"id_user"	  => $this->uri->segment('5'),
				];

				$id_user = [
					"id_penyakit" => $this->uri->segment('4'),
					"id_user"	  => $this->uri->segment('5'),
					"id_kambing"  =>$no_ternak,
				];


				$this->m_data->insert_data('hubungi_dokter', $hubungi_dokter);
				$id=$this->m_data->get_where_filter('hubungi_dokter', $hubungi_dokter,'id_hubungi_dokter','DESC');
				$data_dokter = [
					"id_hubungi_dokter" => $id->id_hubungi_dokter,
				];

				$this->m_data->update_data('rekam_penyakit', $id_user, $data_dokter);

			
			
				redirect("home/overview_kambing/$no_ternak");
			}

	 function delete(){
		$no_ternak 		= $this->uri->segment('3');
	
		$data_kambing = [
			"no_ternak2" 	=> $no_ternak,
		];
		$this->session->set_userdata($data_kambing);
		$this->m_data->get_delete('kambing','no_ternak',$no_ternak);
		$array = array(
			'check' => 'delete',
			'check2' => 'kambing',
		);

		$this->session->set_userdata($array);
		redirect('home/index');
	 }


	function print()
	{
		// redirect('laporan_kambing/index');
		header("Location: ". base_url('laporan_kambing/'));
	}
	//  PAGINATION
	// function pagination_kesehatan()
	// {
	// 	$arah 				= $this->uri->segment('3');
	// 	$nilai_kesehatan	= $this->uri->segment('4');
	// 	$nilai_tengah_kesehatan	= $this->uri->segment('5');
	// 	$no_ternak	= $this->uri->segment('6');
		
	// 	if ($arah == "kanan") {
	// 		$nilai_kesehatan = $nilai_kesehatan+1;
	// 		$array = array(
	// 			'nilai_kesehatan' => $nilai_kesehatan+3,
	// 			'nilai_tengah_kesehatan' => $nilai_tengah_kesehatan+1,
	// 		);
			
	// 		$this->session->set_userdata( $array );
			
	// 	}else {
			
	// 	}

	// 	redirect("home/overview_kambing/$no_ternak");
	// }

	public function paginationKesehatan()
	{
		$id  	= $this->input->post('id');
		$id 	= explode("-", $id);
		
		$no_ternak				= $id[0];
		$nilai_kesehatan  		= $id[1];
		$nilai_tengah_kesehatan = $id[2];
	
		$nilai_kesehatan  		= $nilai_kesehatan+3;
		$nilai_tengah_kesehatan = $nilai_tengah_kesehatan+1;

		$kesehatan = [
			"no_ternak"	=> $no_ternak,
			'id_user'	=> $this->session->userdata('id_user'),
		];
		$cek_kesehatan = $this->m_data->get_kesehatan('kesehatan', $kesehatan, 3, $nilai_kesehatan, 'tgl_cek_kesehatan', 'DESC');

		$i = 0;
		foreach ($cek_kesehatan as $value) {
			$hasil 		= $value->kesehatan;
			$data[$i] 	= $hasil;

			$a = $value->tgl_cek_kesehatan;
			$a = explode("-", $a);
			$b = $a[2] . '/' . $a[1] . '/' . $a[0];
			$data2[$i] 	= $b;
			
			$i++;
		}
	
		if (!empty($data[0])) {
			$B1 = $data[0] == "Sehat" ? "<i class=\"fas fa-check\" style=\"color: #007bff; font-size: 14px;\"></i>" : "<i class=\"fas fa-times\" style=\"color: red; font-size: 14px;\"></i>";
		}
		if (!empty($data[1])) {
			$B2 = $data[1] == "Sehat" ? "<i class=\"fas fa-check\" style=\"color: #007bff; font-size: 14px;\"></i>" : "<i class=\"fas fa-times\" style=\"color: red; font-size: 14px;\"></i>";
		}
		if (!empty($data[2])) {
			$B3 = $data[2] == "Sehat" ? "<i class=\"fas fa-check\" style=\"color: #007bff; font-size: 14px;\"></i>" : "<i class=\"fas fa-times\" style=\"color: red; font-size: 14px;\"></i>";
		}
	

		$hasil1 = empty($data[0]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pKes1\"><td class=\"pl-0 pr-0\">$data2[0]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[0]</td><td class=\"pl-0 pr-0\">$B1</td></tr>";
		$hasil2 = empty($data[1]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pKes2\"><td class=\"pl-0 pr-0\">$data2[1]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[1]</td><td class=\"pl-0 pr-0\">$B2</td></tr>";
		$hasil3 = empty($data[2]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pKes3\"><td class=\"pl-0 pr-0\">$data2[2]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[2]</td><td class=\"pl-0 pr-0\">$B3</td></tr>";
		$hasil4 = $nilai_kesehatan;
		$hasil5 = $nilai_tengah_kesehatan;

		$array = array($hasil1, $hasil2, $hasil3, $hasil4, $hasil5);
	
		echo json_encode($array);
	}

	public function paginationKiriKesehatan()
	{
		$id  	= $this->input->post('id');
		$id 	= explode("-", $id);
		
		$no_ternak				= $id[0];
		$nilai_kesehatan  		= $id[1];
		$nilai_tengah_kesehatan = $id[2];
	
		$nilai_kesehatan  		= $nilai_kesehatan-3;
		$nilai_tengah_kesehatan = $nilai_tengah_kesehatan-1;

		$kesehatan = [
			"no_ternak"	=> $no_ternak,
			'id_user'	=> $this->session->userdata('id_user'),
		];
		$cek_kesehatan = $this->m_data->get_kesehatan('kesehatan', $kesehatan, 3, $nilai_kesehatan, 'tgl_cek_kesehatan', 'DESC');
		
		$i = 0;
		foreach ($cek_kesehatan as $value) {
			$hasil 		= $value->kesehatan;
			$data[$i] 	= $hasil;
			
			
			$a = $value->tgl_cek_kesehatan;
			$a = explode("-", $a);
			$b = $a[2] . '/' . $a[1] . '/' . $a[0];
			$data2[$i] 	= $b;
			
			$i++;
		}

		if (!empty($data[0])) {
			$A1 = $data[0] == "Sehat" ? "<i class=\"fas fa-check\" style=\"color: #007bff; font-size: 14px;\"></i>" : "<i class=\"fas fa-times\" style=\"color: red; font-size: 14px;\"></i>";
		}
		if (!empty($data[1])) {
			$A2 = $data[1] == "Sehat" ? "<i class=\"fas fa-check\" style=\"color: #007bff; font-size: 14px;\"></i>" : "<i class=\"fas fa-times\" style=\"color: red; font-size: 14px;\"></i>";
		}
		if (!empty($data[2])) {
			$A3 = $data[2] == "Sehat" ? "<i class=\"fas fa-check\" style=\"color: #007bff; font-size: 14px;\"></i>" : "<i class=\"fas fa-times\" style=\"color: red; font-size: 14px;\"></i>";
		}
	
		
		$hasil1 = empty($data[0]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pKes1\"><td class=\"pl-0 pr-0\">$data2[0]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[0]</td><td class=\"pl-0 pr-0\">$A1</td></tr>";
		$hasil2 = empty($data[1]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pKes2\"><td class=\"pl-0 pr-0\">$data2[1]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[1]</td><td class=\"pl-0 pr-0\">$A2</td></tr>";
		$hasil3 = empty($data[2]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pKes3\"><td class=\"pl-0 pr-0\">$data2[2]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[2]</td><td class=\"pl-0 pr-0\">$A3</td></tr>";
		$hasil4 = $nilai_kesehatan;
		$hasil5 = $nilai_tengah_kesehatan;

		$array = array($hasil1, $hasil2, $hasil3, $hasil4, $hasil5);
	
		echo json_encode($array);
	}


	public function paginationSistemPakar()
	{
		$id  	= $this->input->post('id');
		$id 	= explode("-", $id);

		$no_ternak				= $id[0];
		$nilai_kesehatan  		= $id[1];
		$nilai_tengah_kesehatan = $id[2];

		$nilai_kesehatan  		= (int)$nilai_kesehatan+3;
		$nilai_tengah_kesehatan = (int)$nilai_tengah_kesehatan+1;

		$pakar = [
			'rekam_penyakit.id_kambing'	=> $no_ternak,
			'rekam_penyakit.id_user'	=> $this->session->userdata('id_user'),
		];

		$pakar = $this->m_data->join2(
			'rekam_penyakit',
			'kambing',
			'kambing.no_ternak=rekam_penyakit.id_kambing',
			$pakar,
			'penyakit',
			'penyakit.kunci=rekam_penyakit.id_penyakit',
			'rekam_penyakit.tgl_pencatatan',
			'DESC',
			3,
			$nilai_kesehatan
		);

		$data3 = [];
		$i = 0;
		foreach ($pakar as $value) {
			$hasil 		= $value['nm_penyakit'];
			$data[$i] 	= $hasil;

			$a = $value['tgl_pencatatan'];
			$a = explode("-", $a);
			$b = $a[2] . '/' . $a[1] . '/' . $a[0];
			$data2[$i] 	= $b;

			if ($value['nm_penyakit'] == 'Hubungi Dokter') {
				if ($value['id_hubungi_dokter'] != 0) {
					$link =  base_url('home/overview_sistem_pakar/') . $value['id_hubungi_dokter'] . "/" . $no_ternak . "/hb";
					$data3[$i] = "<a href=\"$link\" style=\" font-size: 10px;\">Review</a>";
				} else {
					$data3[$i] = "<button class=\"btn btn-sm-block btn-info pr-1 pl-1 pt-1 pb-1\" style=\"font-size: 10px;\" data-toggle=\"modal\" data-target=\"#exampleModalTambah\">Tambah</button>";
				}
			} else {
				$link =  base_url('home/overview_sistem_pakar/') . $value['kunci'] . "/" . $no_ternak;
				$data3[$i] = "<a href=\"$link\" style=\" font-size: 10px;\">Review</a>";
			}



			$i++;
		}

		$hasil1 = empty($data[0]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pPakar1\"><td class=\"pl-0 pr-0\">$data2[0]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[0]</td><td class=\"pl-0 pr-0\">$data3[0]</td></tr>";
		$hasil2 = empty($data[1]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pPakar2\"><td class=\"pl-0 pr-0\">$data2[1]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[1]</td><td class=\"pl-0 pr-0\">$data3[1]</td></tr>";
		$hasil3 = empty($data[2]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pPakar3\"><td class=\"pl-0 pr-0\">$data2[2]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[2]</td><td class=\"pl-0 pr-0\">$data3[2]</td></tr>";
		$hasil4 = $nilai_kesehatan;
		$hasil5 = $nilai_tengah_kesehatan;
		$array = array($hasil1, $hasil2, $hasil3, $hasil4, $hasil5);

		echo json_encode($array);
	}
	
	public function paginationKiriSistemPakar()
	{
		$id  	= $this->input->post('id');
		$id 	= explode("-", $id);

		$no_ternak				= $id[0];
		$nilai_kesehatan  		= $id[1];
		$nilai_tengah_kesehatan = $id[2];

		$nilai_kesehatan  		= $nilai_kesehatan - 3;
		$nilai_tengah_kesehatan = $nilai_tengah_kesehatan - 1;

		$pakar = [
			'rekam_penyakit.id_kambing'	=> $no_ternak,
			'rekam_penyakit.id_user'	=> $this->session->userdata('id_user'),
		];

		$pakar = $this->m_data->join2(
			'rekam_penyakit',
			'kambing',
			'kambing.no_ternak=rekam_penyakit.id_kambing',
			$pakar,
			'penyakit',
			'penyakit.kunci=rekam_penyakit.id_penyakit',
			'rekam_penyakit.tgl_pencatatan',
			'DESC',
			3,
			$nilai_kesehatan
		);

$data3 = [];
		$i = 0;
		foreach ($pakar as $value) {
			$hasil 		= $value['nm_penyakit'];
			$data[$i] 	= $hasil;

			$a = $value['tgl_pencatatan'];
			$a = explode("-", $a);
			$b = $a[2] . '/' . $a[1] . '/' . $a[0];
			$data2[$i] 	= $b;
			
			if ($value['nm_penyakit'] == 'Hubungi Dokter') {
				if ($value['id_hubungi_dokter'] != 0) {
					 $link =  base_url('home/overview_sistem_pakar/') . $value['id_hubungi_dokter'] . "/" . $no_ternak . "/hb";
					$data3[$i] = "<a href=\"$link\" style=\" font-size: 10px;\">Review</a>";
				} else {
					$data3[$i] = "<button class=\"btn btn-sm-block btn-info pr-1 pl-1 pt-1 pb-1\" style=\"font-size: 10px;\" data-toggle=\"modal\" data-target=\"#exampleModalTambah\">Tambah</button>";
				}
				
			}else{
				$link = base_url('home/overview_sistem_pakar/') . $value['kunci'] . "/" . $no_ternak;
				$data3[$i] = "<a href=\"$link\" style=\" font-size: 10px;\">Review</a>";
			}

							
	
			$i++;
		}
	
		$hasil1 = empty($data[0]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pPakar1\"><td class=\"pl-0 pr-0\">$data2[0]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[0]</td><td class=\"pl-0 pr-0\">$data3[0]</td></tr>";
		$hasil2 = empty($data[1]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pPakar2\"><td class=\"pl-0 pr-0\">$data2[1]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[1]</td><td class=\"pl-0 pr-0\">$data3[1]</td></tr>";
		$hasil3 = empty($data[2]) ? ' ' : "<tr style=\"font-size: 12px; text-align: center; font-family: monospace; \" id=\"pPakar3\"><td class=\"pl-0 pr-0\">$data2[2]</td><td class=\"pl-0 pr-0\" colspan=\"2\">$data[2]</td><td class=\"pl-0 pr-0\">$data3[2]</td></tr>";
		$hasil4 = $nilai_kesehatan;
		$hasil5 = $nilai_tengah_kesehatan;

		$array = array($hasil1, $hasil2, $hasil3, $hasil4, $hasil5);

		echo json_encode($array);
	}

	public function paginationCatatBerat()
	{
		$id  	= $this->input->post('id');
		$id 	= explode("-", $id);

		$no_ternak				= $id[0];
		$nilai_kesehatan  		= $id[1];
		$nilai_tengah_kesehatan = $id[2];

		$nilai_kesehatan  		= $nilai_kesehatan + 4;
		$nilai_tengah_kesehatan = $nilai_tengah_kesehatan + 1;

	
		$catat_berat = $this->m_data->get_list_berat('bulan', 'no_ternak', $no_ternak, 'id_user', $this->session->userdata('id_user'), 4, $nilai_kesehatan, 'bulan_ke', 'DESC');

		$i = 0;
		foreach ($catat_berat as $value) {
			$data[$i] 	= $value->bulan_ke;
			$data2[$i] 	= $value->nilai_awal;
			$data3[$i] 	= $value->nilai_target != 0 ? $value->nilai_target ." Kg" : "<i class='fas fa-minus'></i>";
			$i++;
		}


		$hasil1 = empty($data[0]) ? '' : "<tr style=\"font-size: 11px; text-align: center;\" id=\"hBerat1\">
						<td>" . $data[0] . "</td>
						<td>" . $data2[0] . "Kg</td>
						<td>" . $data3[0] . "</td>
						<td><a href='" . base_url("home/detail_informasi/") . $data[0] . "/" . $no_ternak . "'>
								Detail
							</a></td>
					</tr>";
		$hasil2 = empty($data[1]) ? ' ' : "<tr style=\"font-size: 11px; text-align: center;\" id=\"hBerat2\">
						<td>" . $data[1] . "</td>
						<td>" . $data2[1] . "Kg</td>
						<td>" . $data3[1] . "</td>
						<td><a href='" . base_url("home/detail_informasi/") . $data[1] . "/" . $no_ternak . "'>
								Detail
							</a></td>
					</tr>";
		$hasil3 = empty($data[2]) ? ' ' : "<tr style=\"font-size: 11px; text-align: center;\" id=\"hBerat3\">
						<td>" . $data[0] . "</td>
						<td>" . $data2[2] . "Kg</td>
						<td>" . $data3[2] . "</td>
						<td><a href='" . base_url("home/detail_informasi/") . $data[2] . "/" . $no_ternak . "'>
								Detail
							</a></td>
					</tr>";
		$hasil4 = empty($data[3]) ? ' ' : "<tr style=\"font-size: 11px; text-align: center;\" id=\"hBerat4\">
						<td>" . $data[3] . "</td>
						<td>" . $data2[3] . "Kg</td>
						<td>" . $data3[3] . "</td>
						<td><a href='" . base_url("home/detail_informasi/") . $data[3] . "/" . $no_ternak . "'>
								Detail
							</a></td>
					</tr>";

		$hasil5 = $nilai_kesehatan;
		$hasil6 = $nilai_tengah_kesehatan;

		$array = array($hasil1, $hasil2, $hasil3, $hasil4, $hasil5, $hasil6);

		echo json_encode($array);
	}

	public function paginationKiriCatatBerat()
	{
		$id  	= $this->input->post('id');
		$id 	= explode("-", $id);

		$no_ternak				= $id[0];
		$nilai_kesehatan  		= $id[1];
		$nilai_tengah_kesehatan = $id[2];

		$nilai_kesehatan  		= $nilai_kesehatan - 4;
		$nilai_tengah_kesehatan = $nilai_tengah_kesehatan - 1;


		$catat_berat = $this->m_data->get_list_berat('bulan', 'no_ternak', $no_ternak, 'id_user', $this->session->userdata('id_user'), 4, $nilai_kesehatan, 'bulan_ke', 'DESC');

		$i = 0;
		foreach ($catat_berat as $value) {
			$data[$i] 	= $value->bulan_ke;
			$data2[$i] 	= $value->nilai_awal;
			$data3[$i] 	= $value->nilai_target != 0 ? $value->nilai_target . " Kg" : "<i class=\"fas fa-minus\"></i>";
			$i++;
		}


		$hasil1 = empty($data[0]) ? '' : "<tr style=\"font-size: 11px; text-align: center;\" id=\"hBerat1\">
						<td>" . $data[0] . "</td>
						<td>" . $data2[0] . "Kg</td>
						<td>" . $data3[0] . "</td>
						<td><a href='" . base_url("home/detail_informasi/") . $data[0] . "/" . $no_ternak . "'>
								Detail
							</a></td>
					</tr>";
		$hasil2 = empty($data[1]) ? ' ' : "<tr style=\"font-size: 11px; text-align: center;\" id=\"hBerat2\">
						<td>" . $data[1] . "</td>
						<td>" . $data2[1] . "Kg</td>
						<td>" . $data3[1] . "</td>
						<td><a href='" . base_url("home/detail_informasi/") . $data[1] . "/" . $no_ternak . "'>
								Detail
							</a></td>
					</tr>";
		$hasil3 = empty($data[2]) ? ' ' : "<tr style=\"font-size: 11px; text-align: center;\" id=\"hBerat3\">
						<td>" . $data[2] . "</td>
						<td>" . $data2[2] . "Kg</td>
						<td>" . $data3[2] . "</td>
						<td><a href='" . base_url("home/detail_informasi/") . $data[2] . "/" . $no_ternak . "'>
								Detail
							</a></td>
					</tr>";
		$hasil4 = empty($data[3]) ? ' ' : "<tr style=\"font-size: 11px; text-align: center;\" id=\"hBerat4\">
						<td>" . $data[3] . "</td>
						<td>" . $data2[3] . "Kg</td>
						<td>" . $data3[3] . "</td>
						<td><a href='" . base_url("home/detail_informasi/") . $data[3] . "/" . $no_ternak . "'>
								Detail
							</a></td>
					</tr>";

		$hasil5 = $nilai_kesehatan;
		$hasil6 = $nilai_tengah_kesehatan;

		$array = array($hasil1, $hasil2, $hasil3, $hasil4, $hasil5, $hasil6);

		echo json_encode($array);
	}
	
public function akhir()
{

	$link	   = $this->uri->segment(3);
	$no_ternak = $this->uri->segment(4);
	$id_user   = $this->uri->segment(5);


	$data=[
'back'=>base_url("home/overview_kambing/$no_ternak"),
"header_judul" => "History Kambing",
'akhir' => "Terjual",
'id_user'=>$id_user,
'no_ternak'=> $no_ternak,
	];

if ($link == "Meninggal") {
	$data['akhir'] = "Meninggal";
}
		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back',$data);
		$this->load->view('home/terjual', $data);

}


public function kambing()
{
	$link	   = $this->uri->segment(3);
	$no_ternak = $this->uri->segment(4);
	$id_user   = $this->uri->segment(5);
	$ket 	   = $this->input->post('ket');

	$user = [
		'no_ternak'=>$no_ternak,
		'id_user'  => $id_user,
	];
	
	if ($link == "Terjual") {
		$data = [
		'status'  => 1,
		'ket'  => $ket,
	];
	$this->m_data->update_data('kambing',$user,$data);
}

if ($link == "Meninggal") {
		$data = [
		'status'  => 2,
		'ket'  => $ket,
	];
	
		$this->m_data->update_data('kambing',$user,$data);
	}
	redirect("home/index");
}
}

	
