<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_cek_kesehatan extends CI_Controller
{
	protected $header_judul = "Cek Kesehatan";
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != 'login') {
			redirect(base_url('login/index'));
		}
		
		$this->load->model(array('m_data'));
		$this->load->helper(array('form'));
	}
	public function index()
	{
		$this->session->unset_userdata('no_ternak');
		$cari_kambing = [
			'id_user'	=> 	$this->session->userdata('id_user'),

		];
		$db		 = $this->m_data->get_kambing('kambing', $cari_kambing);

		$data = [
			'back' 			=> base_url('home/index'),
			'judul_header'	=> "",
			'header_judul'	=> $this->header_judul,
			'value_button'	=> 'Berikutnya',
			'link_form'		=> base_url('M_cek_kesehatan/cek'),
			'kambing'		=> $db,
			'informasi'		=> FALSE,
		];
		$this->session->unset_userdata('no_ternak');

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('design_latar/form/header_form');
		$this->load->view('c_pertumbuhan/index', $data);
		$this->load->view('design_latar/form/button_form');
		$this->load->view('design_latar/form/footer_form');
	}

	public function cek()
	{
		//bagian Unset 
		$this->session->unset_userdata('cek_kesehatan_kondisi');

		$no_ternak = $this->input->post('kambing');

		$back = base_url('M_cek_kesehatan/index');

		if ($this->uri->segment('3') == true) {
			$no_ternak  = $this->uri->segment('3');
			$back 		= base_url('home/overview_kambing/').$no_ternak;
		}

		$data_navigasi =[
			'back' 			=> $back,
			'judul_header'	=> "",
			'header_judul'	=> $this->header_judul,
		];
		$data = [
			// 'value_button'	=> 'Berikutnya',
			// 'link_form'		=> base_url('M_cek_kesehatan/cek'),
			// 'informasi'		=> FALSE,
			'no_ternak'			=> $no_ternak,
		];

		$data_session = [
				'no_ternak'=> $no_ternak,
			];
		$this->session->set_userdata($data_session);

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data_navigasi);
		// $this->load->view('design_latar/form/header_form');
		$this->load->view('cek_kesehatan/cek', $data);
		// $this->load->view('design_latar/form/footer_form');
	 }

	public function hasil()
	{
		// $no_ternak = $this->uri->segment('3');

		$check 		= $this->input->post('pilihan1');
		$check2 	= $this->input->post('pilihan2');
		// $check3 	= $this->input->post('pilihan3');
		$check4 	= $this->input->post('pilihan4');
		$check5		= $this->input->post('pilihan5');
		// $check6 	= $this->input->post('pilihan6');
		$check7 	= $this->input->post('pilihan7');
		// $hasil = $check . "-" . $check2 . "-" . $check4 . "-" . $check5 . "-" . $check7;
		$check 	= $check  != 'ya' ? "G24" : 'kosong';
		$check2 = $check2 != 'ya' ? "G11" : 'kosong';
		// $check3 = $check3 != 'ya' ? "G23" : FALSE;
		$check4 = $check4 != 'ya' ? "G31" : 'kosong';
		$check5 = $check5 != 'ya' ? "G37" : 'kosong';
		$check7 = $check7 != 'ya' ? "G25" : 'kosong';

		// $hasil = $check."-" . $check2 . "-" . $check3 . "-" . $check4 . "-" . $check5 . "-" . $check7;
		$hasil = $check."-" . $check2 . "-" . $check4 . "-" . $check5 . "-" . $check7;
		
		$hasil = explode("-",$hasil);
	
		$i=0;
		$jml = count($hasil);
		for ($i=0; $i < $jml; $i++) { 
			if ($hasil[$i] == 'kosong') {
				unset($hasil[$i]);
			}
		}
	
		$hasil = implode("-",$hasil);
		
		$no_ternak 	= $this->session->userdata('no_ternak');
		$id_user 	= $this->session->userdata('id_user');
		$data_where = [
			'no_ternak' 	=> $no_ternak,
			'id_user'		=> $id_user,
		];
		$kambing 		= $this->m_data->get_where('kambing', $data_where);
		$usia 		= $this->m_data->tampil_data2('bulan', 'bulan_ke', 'no_ternak', $no_ternak);
		// print_r($db1);
		// die();
		$data_button = [
			'back' 			=> base_url('M_cek_kesehatan/cek/') . $no_ternak,
			'judul_header' 	=> "",
			'tingkatkan'	=> false,						'hijau' 		=> "hijau",
			'link_form'		=>	"",							'simpan'		=> base_url('Crud_kambing/tambah'),
			'value_button'	=> 'Simpan',
			'header_judul'	=> $this->header_judul,
			// 'informasi'		=> $informasi,
		];
		$data = [
			'back' 			=> base_url('M_cek_kesehatan/cek/') . $no_ternak,
			'judul_header' 	=> "",
			'tingkatkan'	=> false,						
			'link_form'		=>	"",							'simpan'		=> base_url('Crud_kambing/tambah'),
			'value_button'	=> 'Simpan',
			'header_judul'	=> $this->header_judul,
			// 'informasi'		=> $informasi,
		];
		$data_kambing = [
			"no_ternak" 	=> $no_ternak,
			"jenis_kelamin" => $kambing->jenis_kelamin,
			"nama_gambar" 	=> $kambing->gambar_kambing,
			"usia"			=> $usia->bulan_ke,
		];
		
		// if ($check == false && $check2 == false && $check3 == false && $check4 == false && $check5 == false && $check7 == false) {
		if ($check == 'kosong' && $check2 == 'kosong' && $check4 == 'kosong' && $check5 == 'kosong' && $check7 == 'kosong') {
			$data_kambing["kondisi"] 		= "Sehat";
			$data_button['hijau'] 			= "btn-success";
			$data_button['value_button']	= "Simpan";
			$data_button['link_form']		= base_url('M_cek_kesehatan/hasil_kirim/').$hasil;
				
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form', $data);
			$this->load->view('cek_kesehatan/laporan_kesehatan', $data_kambing);
			$this->load->view('design_latar/form/footer_form');
			$this->load->view('design_latar/form/button_round_tambah', $data_button);
				
		}else{
			$data_button['hijau'] 			= "btn-danger";
			$data_button['value_button']	= "Diagnosa Penyakit";
			$data_button['link_form']		= base_url('M_cek_kesehatan/hasil_kirim/').$hasil;
			$data_kambing["kondisi"] 		= "Tidak Sehat";
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form', $data);
			$this->load->view('cek_kesehatan/laporan_kesehatan', $data_kambing);
			$this->load->view('design_latar/form/footer_form');
			$this->load->view('design_latar/form/button_round_tambah',$data_button);
		}
	 }

	public function hasil_kirim()
	{
		$button = $this->input->post('submit');
		$hasil  = $this->uri->segment('3');
		if ($button != "Simpan" ) {
			$no_ternak 	= $this->session->userdata('no_ternak');
			$data_session = [
				'cek_kesehatan_gejala'	=> $hasil,
				'cek_kesehatan_kondisi' => "Tidak Sehat",
			];
		
			$this->session->set_userdata( $data_session );
			
			redirect('M_sistem_pakar/gejala/');
		}else {
			$no_ternak 	= $this->session->userdata('no_ternak');
			$this->session->unset_userdata('no_ternak');

			$tgl 		= $this->m_data->get_id('tgl', 'id_tgl', 1);
			$a = explode('-', $tgl['tgl']);
			$b = $a[2] . '-' . $a[1] . '-' . $a[0];

			$data_db = [
				'no_ternak' 		=> $no_ternak,
				'kesehatan' 		=> "Sehat",
				"tgl_cek_kesehatan" => $b,
				'id_user'		=> $this->session->userdata('id_user'),
			];

			
			$array = array(
				'check' => 'tambah',
				'check2' => 'kesehatan',
			);
			
			$this->session->set_userdata( $array );
			
			// die($no_ternak);
			$this->m_data->insert_data('kesehatan', $data_db);
			redirect('home/overview_kambing/' . $no_ternak);
		}
		
//Batas
	 }
}
