<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_takaran_pakan extends CI_Controller
{
	protected $header_judul = "Takaran Pakar";
	public function __construct()
	{
		
		parent::__construct();

		if ($this->session->userdata('status') != 'login') {
			redirect(base_url('login/index'));
		}

		$this->load->model(array('m_data', 'm_c_pertumbuhan'));
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
		// $kunci 	 = $this->session->userdata('number');
		// $kunci	 = implode("-",$kunci);	 
		$data = [
			'back' 			=> base_url('home/index/'),
			'judul_header'	=> "",
			'header_judul'	=> $this->header_judul,
			'value_button'	=> 'Berikutnya',
			'link_form'		=> base_url('M_takaran_pakan/cek/'),
			'kambing'		=> $db,
		];
		$this->session->unset_userdata('number');

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('design_latar/form/header_form');
		$this->load->view('c_pertumbuhan/index', $data);
		$this->load->view('design_latar/form/button_form');
		$this->load->view('design_latar/form/footer_form');
	}

	public function cek()
	{

		$id_bulan 		= $this->uri->segment('3');
		$no_ternak 		= $this->uri->segment('4');

		// $no_ternak		= 
		$back = base_url('M_catatan_pertumbuhan/overview/');
		if (!empty($this->input->post('kambing'))) {
			$no_ternak 	= $this->input->post('kambing');
			$id_bulan 	= $this->m_data->tampil_data2('bulan','bulan_ke','no_ternak',$no_ternak);
			$id_bulan	= $id_bulan == true ? $id_bulan->bulan_ke : 'kosong';
			$back = base_url('M_takaran_pakan/index/');
		}else{
			$back = base_url('home/detail_informasi/').$id_bulan."/".$no_ternak;
		}

		
		$array = array(
			'id_bulan' => $id_bulan,
			'no_ternak'=> $no_ternak,
		);
		
		$this->session->set_userdata( $array );
		

		$kambing 		= $this->m_data->get_id('kambing', 'no_ternak', $no_ternak);
		$bulan 			= $this->m_data->get_id_2i('bulan', 'bulan_ke', $id_bulan, 'no_ternak', $no_ternak);
		$kambing 		= $this->m_data->get_id('kambing', 'no_ternak', $no_ternak);
		$jenis_kelamin 	= $kambing['jenis_kelamin'];
		$usia			= $bulan['bulan_ke']+1;
		// print_r($bulan);
		// echo $usia;
		// die();
		$bb_rata_rata	= $this->m_c_pertumbuhan->target($usia, $jenis_kelamin);
		$db_cek_target	= $this->m_data->get_id('bulan','bulan_ke',$id_bulan);
		
		
		$data = [
			'link_form'		=> 'KOSONG',
			'header_judul'	=> $this->header_judul,
			// 'back' 			=> base_url('M_catatan_pertumbuhan/overview/'),
			'back' 			=> $back,
			'judul_header'	=> "",
			'simpan'		=> base_url('M_catatan_pertumbuhan/takaran_pakan/'),
			'simpan2'		=> base_url('M_catatan_pertumbuhan/pembaharuan_gambar/'),
			'nilai_awal'	=> "",
		];
// print_r($bb_rata_rata['value1']);
// die();
		$data_kambing=[
			'no_ternak'		=> $no_ternak,
			'usia'			=> $usia,
			'bb_rata'		=> $bb_rata_rata['value1'],
			'value3'		=> $bb_rata_rata['value3'],
			'nilai_target_sebelumnya' => $target = $db_cek_target['nilai_target'] == 0 ? "Belum Tersedia" : $db_cek_target['nilai_target']." Kg",
		];

		$data_buttom=[
			'hijau'			 => 'btn-info',
			'value_button'	 => 'Catat Berat',
			'link_form'		 => base_url('M_catatan_pertumbuhan/overview/').$no_ternak,
		];
	if ($id_bulan == "kosong") {
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('takaran_pakan/index2', $data_kambing);
			$this->load->view('design_latar/form/footer_form');
			$this->load->view('design_latar/form/button_round_tambah', $data_buttom);
	} else {
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('takaran_pakan/index', $data_kambing);
			$this->load->view('design_latar/form/footer_form');
			$this->load->view('design_latar/form/button_takaran_pakan', $data_buttom);
	}
	


	}

	public function tambah()
	{
		$berat 		= $this->input->post('berat');
		$id_bulan   = $this->session->userdata('id_bulan');
		$no_ternak  = $this->session->userdata('$no_ternak');
		$data=[
			'nilai_target'=>$berat,
		];
		$this->m_data->u_data2('bulan','bulan_ke',$id_bulan,$data);

		
		$array = array('id_bulan','no_ternak');
		
		$this->session->set_userdata( $array );
		$array = array(
			'check' => 'tambah',
			'check2' => 'target',
		);

		$this->session->set_userdata($array);
		redirect('home/overview_kambing/'.$no_ternak);
		

	 }

	public function edit()
	{

	 }

	public function delete()
	{

	 }
}
