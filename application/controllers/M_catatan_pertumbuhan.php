<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_catatan_pertumbuhan extends CI_Controller
{
	protected $header_judul = "Catat Berat";
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
				'link_form'		=> base_url('M_catatan_pertumbuhan/overview'),
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

	public function overview()
	{
		$this->session->unset_userdata('kondisi');
		$this->session->unset_userdata('berat');

		$kosong = $this->session->userdata('kosong') ? $this->session->userdata('kosong') : ' ';
		$this->session->unset_userdata('kosong');

		// $kambing= $this->input->post("kambing") ? $this->input->post("kambing") : $this->session->userdata('no_ternak');
		if ($this->input->post("kambing")) {
			$kambing 	= $this->input->post("kambing");
			$back		= base_url('M_catatan_pertumbuhan/index');
			$array = array(
				'no_ternak' => $kambing
			);

			$this->session->set_userdata($array);
		}elseif($this->uri->segment('3')){
			$kambing = $this->uri->segment('3');
			$back    = base_url('home/overview_kambing/').$kambing; 
		}elseif($this->session->has_userdata('no_ternak')){
			$kambing 	= $this->session->userdata('no_ternak');
			$back		= base_url('M_catatan_pertumbuhan/index');
		}else{
			$kambing = $this->session->userdata('no_ternak');
			$back		= base_url('M_catatan_pertumbuhan/index');
		}
		// die($kambing);
	
		
		// die($kambing);
		$usia			= $this->m_c_pertumbuhan->tgl($kambing);
		$array			= [
			'id_user'	 => $this->session->userdata('id_user'),
			'no_ternak'  => $kambing,
			
		];
		$db				= $this->m_data->get_kambing2('kambing', $array);
		$usia			= $this->m_c_pertumbuhan->tgl($kambing);
		$setAwal		= $this->m_c_pertumbuhan->setAwal($usia);
		$nilai_awal 	= $setAwal['nilai_awal'];
		$value3			= $this->m_c_pertumbuhan->target($nilai_awal, $db['jenis_kelamin']);
		$value3			= $value3['value3'];
		$data = [
			'back' 			=> $back,
			'judul_header'	=> "",
			'header_judul'	=> $this->header_judul,
			'value_button'	=> 'Berikutnya',
			'link_form'		=> base_url('M_catatan_pertumbuhan/informasi/').$db['no_ternak'],
			'kambing'		=> $db,
			'usia'			=> $usia,
			'nilai_awal'	=> $nilai_awal,
			'kosong'		=> $kosong,
		];

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('design_latar/form/header_form');
		$this->load->view('c_pertumbuhan/c_produksi');
		$this->load->view('design_latar/form/button_form');
		$this->load->view('design_latar/form/footer_form');
		
	 }

	public function informasi($kambing)
	{
		
		$this->form_validation->set_rules('berat', 'berat', 'required|regex_match[/^[0-9]{1,2}[.][0-9]{1,2}$/]',  array('required' => ' *Wajib terisi',
																														'regex_match' => ' *Wajib Gunakan bilangan decimal xx.xx'));

		if ($this->form_validation->run() == false) {
			
			$array = array(
				'kosong' => form_error('berat'),
			);
			
			$this->session->set_userdata( $array );
			// 	$kambing = $kambing ? $kambing : $this->session->userdata('no_ternak');
				redirect("M_catatan_pertumbuhan/overview/$kambing");
		}
		
		$berat 		= trim($this->input->post("berat"));
		if ($this->session->has_userdata('no_ternak')) {
			$back = base_url('M_catatan_pertumbuhan/overview/');
		} else {
			$back = base_url('M_catatan_pertumbuhan/overview/') . $kambing;
		}

		if ($this->session->has_userdata('kondisi')) {
			$khusus = $this->session->userdata('kondisi');
		}elseif ($this->input->post("khusus")) {
			$khusus = $this->input->post("khusus");
		}else {
			$khusus = "kosong";
		}
	
		if ($berat) {
			$berat 		= trim($this->input->post("berat"));
		}else{
			$berat 		= $this->session->userdata("berat");
		}

		$db				= $this->m_data->get_id('kambing', 'no_ternak', $kambing);
		$usia			= $this->m_c_pertumbuhan->tgl($kambing);
		$setAwal		= $this->m_c_pertumbuhan->setAwal($usia);
		$nilai_awal 	= $setAwal['nilai_awal'];
		$nilai_akhir 	= $setAwal['nilai_akhir'];
		$bb_rata_rata	= $this->m_c_pertumbuhan->target($nilai_awal,$db['jenis_kelamin']);
		$value3			= $bb_rata_rata['value3'];

		$tgl_sekarang	= $this->m_data->get_id('tgl', 'id_tgl', 1);
	
		$jenis_kelamin		= $db['jenis_kelamin'];
		$cek_kesehatan		= $this->m_c_pertumbuhan->cek_kesehatan($jenis_kelamin,$nilai_awal,$berat);
		$kondisi			= $khusus == 'kosong' ? $cek_kesehatan['kondisi'] : $khusus;
		$font_tingkatkan	=  $cek_kesehatan['tingkatkan'];

	$data_session = [
			'no_ternak'		=> $db['no_ternak'],
			'berat' 		=> $berat,
			'nilai_awal'	=> $nilai_awal,
			'nilai_akhir'	=> $nilai_akhir,
			'kondisi'		=> $kondisi,
			'tgl_pencatatan'=> $tgl_sekarang['tgl'],
		];

		$this->session->set_userdata($data_session);

		$data = [
			'link_form'		=> 'KOSONG',

			'back' 			=> $back,
			'judul_header'	=> "",
			'header_judul'	=> $this->header_judul,
			'simpan'		=> base_url('M_catatan_pertumbuhan/takaran_pakan/') . $kambing,
			'simpan2'		=> base_url('M_catatan_pertumbuhan/pembaharuan_gambar/'),
			
			'usia'			=> $usia,
			'nilai_awal'	=> $nilai_awal,
			'nilai_akhir'	=> $nilai_akhir,
			'value3'		=> $value3,

			'berat'			=> $berat,
			'kambing'		=> $db,
			'khusus'		=> '',
			'kondisi'		=> $kondisi
		];

		if ($kondisi == 'Sehat' ) {
			//Data
			$font_tingkatkan="Simpan";
			$data['tingkatkan']			= false;			
			$data['hijau']				= "hijau";			
			$data['font_tingkatkan']	= $font_tingkatkan;
			$this->session->set_userdata($data);

			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('c_pertumbuhan/informasi_kambing');
			$this->load->view('design_latar/form/footer_form');
			$this->load->view('design_latar/form/button_round_form', $data);
		}elseif($kondisi == 'Betina Menyusui' or $kondisi == 'Betina Hamil'){
			$font_tingkatkan = "Simpan";
			$data['value_button']	 = $font_tingkatkan;
			$data['hijau']			 = "hijau";
			$data['khusus']			 = "khusus";
			$data['link_form']		 = base_url('M_catatan_pertumbuhan/pembaharuan_gambar/');
			$this->session->set_userdata($data);

			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('c_pertumbuhan/informasi_kambing');
			$this->load->view('design_latar/form/footer_form');
			$this->load->view('design_latar/form/button_round_tambah');
		} else {
			$this->session->set_userdata($data);
			$data['tingkatkan']	= true;
			$data['hijau']		= "merah";
			// $data['link_tingkatkan']	= base_url('M_catatan_pertumbuhan/takaran_pakan/').$kambing;
			$data['font_tingkatkan']	= $font_tingkatkan;
			
		
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('c_pertumbuhan/informasi_kambing');
			$this->load->view('design_latar/form/footer_form');
			$this->load->view('design_latar/form/button_round_form', $data);
		}
	 }

	public function takaran_pakan($no_ternak)
	{

		$db			= $this->m_data->get_id('kambing', 'no_ternak', $no_ternak);
		$usia		= $this->m_c_pertumbuhan->tgl($no_ternak);
		$setAwal	= $this->m_c_pertumbuhan->setAwal($usia);
	
		$berat   		= $this->session->userdata('berat');
		$nilai_awal 	= $this->session->userdata('nilai_awal');
		$nilai_akhir 	= $this->session->userdata('nilai_akhir');
		$font_tingkatkan= "Simpan";
		$value			= $this->m_c_pertumbuhan->target($nilai_akhir,$db['jenis_kelamin']);
		$value1			= $value['value1'];
		$value2			= $value['value2'];
		$jenis_kelamin	= $db['jenis_kelamin'];
		$kategori 		= '';
		if($jenis_kelamin == 'B'){
			if ($nilai_awal >= 12) {
				$kategori = 'Betina Dewasa';
			} else {
				$kategori = 'Kambing Muda';
			}
		}else{
			if ($nilai_awal >= 12) {
				$kategori = 'Pejantan';
			} else {
				$kategori = 'Kambing Muda';
			}
		}
		$data_session = [
			'kategori'=>$kategori,
		];
		$this->session->set_userdata($data_session);

		if($kategori == 'Kambing Muda'){
			$niali_value1	= ((float) $value1 * 10 /100) * 2 ;
			$value1_1	 	= number_format($niali_value1 * 60/100, 2,'.','');
			$value1_2 		= number_format($niali_value1 * 40/100, 2,'.','');
		}else{
			$niali_value1 	= ((float) $value1 * 10 / 100) * 2;
			$value1_1 		= number_format($niali_value1 * 75 / 100, 2, '.','');
			$value1_2 		= number_format($niali_value1 * 25 / 100, 2, '.','');
		}

		if($kategori == 'Kambing Muda'){
			$niali_value2	= ((float) $value2 * 10 /100) * 2 ;
			$value2_1 		= number_format($niali_value2 * 60/100, 2, '.','');
			$value2_2 		= number_format($niali_value2 * 40/100, 2, '.','');
		}else{
			$niali_value2 	= ((float) $value2 * 10 / 100) * 2;
			$value2_1 		= number_format($niali_value2 * 75 / 100, 2, '.','');
			$value2_2 		= number_format($niali_value2 * 25 / 100, 2, '.','');
		}

		$data = [
			'value1_1'			=> $value1_1,
			'value1_2'			=> $value1_2,
			'value2_1'			=> $value2_1,
			'value2_2'			=> $value2_2,
			'font_tingkatkan'	=> $font_tingkatkan,
			'kategori'			=> $kategori,		
			'value1'			=> $value1,
			'value2'			=> $value2,
			'nilai_awal' 		=> $nilai_awal,
			'nilai_akhir'		=> $nilai_akhir,
			'kambing'			=> $db,
			'usia'				=> $usia,
			'berat'				=> $berat,
			'back' 				=> base_url('M_catatan_pertumbuhan/informasi/').$no_ternak,
			'judul_header'		=> "",
			'header_judul'	    => $this->header_judul,
			'tingkatkan' 		=> false,
			'link_form'			=> base_url('M_catatan_pertumbuhan/overview'),
			'hijau' 			=> "hijau",
			'simpan'			=> base_url('M_catatan_pertumbuhan/overview_takaran_pakan'),
			'link_button_round'	=> base_url('M_catatan_pertumbuhan/overview_takaran_pakan/'),
		];

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		$this->load->view('design_latar/form/header_form');
		$this->load->view('c_pertumbuhan/takaran_pakan',$data);
		$this->load->view('design_latar/form/footer_form');
		$this->load->view('design_latar/form/button_round', $data);
	 }

	public function overview_takaran_pakan()
	{
		$nilai_target	= $this->uri->segment('3');
		$kategori		= $this->session->userdata('kategori');
		$nilai_akhir	= $this->session->userdata('nilai_akhir');
		$no_ternak		= $this->session->userdata('no_ternak');
		if ($kategori == 'Kambing Muda') {
			$nilai_value1	= ((int) $nilai_target * 10 / 100) * 2;
			$value1_1	 	= $nilai_value1 * 60 / 100;
			$value1_2 		= $nilai_value1 * 40 / 100;
		} else {
			$nilai_value1 	= ((int) $nilai_target * 10 / 100) * 2;
			$value1_1 		= $nilai_value1 * 75 / 100;
			$value1_2 		= $nilai_value1 * 25 / 100;
		}

		$data_session=[
			'nilai_target'	=> $nilai_target,
		];
		$this->session->set_userdata($data_session);
		
		$data = [
			'value1_1'		=> $value1_1,
			'value1_2'		=> $value1_2,
			'judul_header'	=> "#Ubah takaran pakan",
			'nilai_target'  => $nilai_target,
			'nilai_akhir'  	=> $nilai_akhir,
			'no_ternak'  	=> $no_ternak,
			'header_judul'	=> $this->header_judul,
			//batas
			'link_form'		=> '',
		];

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/form/header_form',$data);
		$this->load->view('c_pertumbuhan/overview_takaran_pakan',$data);
		$this->load->view('design_latar/form/footer_form');
	 }

	public function pembaharuan_gambar()
	{

		// $config['upload_path']     = './Asset/upload/kambing/';
		// $config['allowed_types']   = 'gif|jpg|png';
	
		// $this->load->library('upload', $config);

		// $simpan 		= $this->input->post('submit') ? $this->input->post('submit') : false;
// die();
		$kambing 		= $this->session->userdata('no_ternak');
		$berat 			= $this->session->userdata('berat');
		$nilai_target 	= $this->session->userdata('nilai_target') ?  $this->session->userdata('nilai_target') : 0;
		$kondisi 		= $this->session->userdata('kondisi');
		$tgl_pencatatan	= explode("-",trim($this->session->userdata('tgl_pencatatan')));
		$usia			= $this->m_c_pertumbuhan->tgl($kambing);
		$setAwal		= $this->m_c_pertumbuhan->setAwal($usia);
		$nilai_awal 	= $setAwal['nilai_awal'];
		$tgl = $tgl_pencatatan[2]."-".$tgl_pencatatan[1]."-".$tgl_pencatatan[0];
		// if ($this->upload->do_upload('userfile')) {
			$data_kambing = [
				'no_ternak'		=> $kambing,
				'bulan_ke'		=> $nilai_awal,
				// 'gambar'		=> $this->upload->data('file_name'),
				'nilai_awal'	=> $berat,
				'nilai_target'	=> $nilai_target,
				'kondisi'		=> $kondisi,
				'tgl_pencatatan'=> $tgl,
				'id_user'		=> $this->session->userdata('id_user'),
			];

			
			$this->db->insert("bulan", $data_kambing);
		$array = array(
			'check' => 'tambah',
			'check2' => 'berat',
		);

		$this->session->set_userdata($array);
		// 	// $this->session->sess_destroy();
			
		// 	$array = array(
		// 		'tambah'  => 'terisi',
		// 		'kondisi' => 'Catat berat',
		// 	);
			
		// 	$this->session->set_userdata( $array );
			
			redirect('home/overview_kambing/').$kambing;
		
	// 	}else{
	// 		if($simpan == 'Simpan'){
	// 			$back= base_url('M_catatan_pertumbuhan/informasi/').$kambing;
	// 		}elseif($simpan == 'Tidak, Teima Kasih'){
	// 			$back= base_url('M_catatan_pertumbuhan/informasi/').$kambing;
				
	// 		}else{
	// 			$back= base_url('M_catatan_pertumbuhan/overview_takaran_pakan/6');
	// 		}
	// 		$error = $this->upload->display_errors() ? ' ' : $this->upload->display_errors()  ;
	// 		$data = [
	// 			'back' 			=> $back,
	// 			'judul_header'  => "",
	// 			'header_judul'	=> $this->header_judul,
	// 			'link_form'		=> base_url('M_catatan_pertumbuhan/pembaharuan_gambar/'),
	// 			'value_button'	=> 'Berikutnya',
	// 			'error'			=> $error,
	// 		];
		

	// 		$this->load->view('design_latar/home/header_home');
	// 		$this->load->view('design_latar/home/navigasi_back', $data);
	// 		$this->load->view('design_latar/form/header_form');
	// 		$this->load->view('c_pertumbuhan/pembaharuan_gambar', $data);
	// 		$this->load->view('design_latar/form/button_form');
	// 		$this->load->view('design_latar/form/footer_form');
	
	// }
	}
	 

}
