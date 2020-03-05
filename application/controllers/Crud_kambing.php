<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_kambing extends CI_Controller
{
	protected $header_judul = "Tambah Kambing";
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

	// Tambah kambing
	public function tambah()
	{
		$button = $this->input->post("submit");
		$berat_kosong	= form_error('berat');
		if ($button == 'Berikutnya') {

			// $this->form_validation->set_rules('no_pejantan', 'kosonh bos', 'required');
			// $this->form_validation->set_rules('no_induk', 'no_induk', 'required');
			$this->form_validation->set_rules('no_ternak', 'no_ternak', 'required');
			$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
			$this->form_validation->set_rules('berat', 'berat', 'required|regex_match[/^[0-9]{1,2}[.][0-9]{1,2}$/]',  array(
				'required' => ' *Berat wajib terisi',
				'regex_match' => ' *Wajib bernilai decimal xx.xx'
			));
			$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
			$this->form_validation->set_rules('telinga', 'telinga', 'required');
//Redirect
			if ($this->form_validation->run() != false) {
				// redirect("Crud_kambing/tambah");
				// Upload Validasi
				$config['upload_path']     = './Asset/upload/kambing/';
				$config['allowed_types']   = 'gif|jpg|png';
				// $config['file_name']       = ;
				// $config['max_width']       = '1024';
				// $config['max_height']      = '768';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('userfile')) {
					$data = [
						'back' 			=> base_url('home/index'),
						'header_judul'	=> $this->header_judul,
						'judul_header'  => "",
						'link_form'		=> base_url('Crud_kambing/tambah'),
						'value_button'	=> 'Berikutnya',
						'error'			=> $this->upload->display_errors(),
					];
					$no_pejantan 	= trim($this->input->post("no_pejantan"));
					$no_induk 		= trim($this->input->post("no_induk"));
					$no_ternak 		= trim($this->input->post("no_ternak"));
					$jenis_kelamin 	= trim($this->input->post("jenis_kelamin"));
					$tgl_lahir 		= trim($this->input->post("tgl_lahir"));
					$telinga 		= trim($this->input->post("telinga"));
					$berat 			= trim($this->input->post("berat"));

					$data_kambing = [
						"no_pejantan" 	=> $no_pejantan,
						"no_induk"		=> $no_induk,
						"no_ternak" 	=> $no_ternak,
						"jenis_kelamin" => $jenis_kelamin,
						"tgl_lahir"		=> $tgl_lahir,
						"telinga" 		=> $telinga,
						"berat" 		=> $berat,
						'berat_kosong'	=> $berat_kosong,
						// "nama_gambar" 	=> $this->upload->data('file_name'),
					];
					
					$this->load->view('design_latar/home/header_home');
					$this->load->view('design_latar/home/navigasi_back', $data);
					$this->load->view('design_latar/form/header_form', $data);
					$this->load->view('home/tambah_kambing', $data_kambing);
					$this->load->view('design_latar/form/button_form', $data);
					$this->load->view('design_latar/form/footer_form');
				} else {
					// True
					$no_pejantan 	= trim($this->input->post("no_pejantan"));
					$no_induk 		= trim($this->input->post("no_induk"));
					$no_ternak 		= trim($this->input->post("no_ternak"));
					$jenis_kelamin 	= trim($this->input->post("jenis_kelamin"));
					$tgl_lahir 		= trim($this->input->post("tgl_lahir"));
					$telinga 		= trim($this->input->post("telinga"));
					$berat 			= trim($this->input->post("berat"));
					// die($berat);
					$warna			= "";
					$hitam			= trim($this->input->post("w_hitam"));
					$putih			= trim($this->input->post("w_putih"));
					$coklat			= trim($this->input->post("w_coklat"));
					if (isset($hitam)) {
						$warna .= $hitam . " ";
					}
					if (isset($putih)) {
						$warna .= $putih . " ";
					}
					if (isset($coklat)) {
						$warna .= $coklat;
					}

					$data_kambing = [
						"no_pejantan" 	=> $no_pejantan,
						"no_induk"		=> $no_induk,
						"no_ternak" 	=> $no_ternak,
						"jenis_kelamin" => $jenis_kelamin,
						"tgl_lahir"		=> $tgl_lahir,
						"telinga" 		=> $telinga,
						"berat" 		=> $berat,
						"warna" 		=> $warna,
						"nama_gambar" 	=> $this->upload->data('file_name'),
					];
					$this->session->set_userdata($data_kambing);

					$data = [
						'back' 				=> base_url('Crud_kambing/tambah'),
						'judul_header' 		=> "",
						'tingkatkan'		=> false,
						'hijau' 			=> "hijau",
						'link_form'			=> base_url('Crud_kambing/tambah'),
						// 'simpan'			=> base_url('Crud_kambing/tambah'),
						'value_button'		=> 'Simpan',
						'header_judul'   	=> $this->header_judul,
					];


					$this->load->view('design_latar/home/header_home');
					$this->load->view('design_latar/home/navigasi_back', $data);
					$this->load->view('design_latar/form/header_form', $data);
					$this->load->view('home/overview_tambah_kambing', $data_kambing);
					$this->load->view('design_latar/form/footer_form');
					$this->load->view('design_latar/form/button_round_tambah', $data);
				}
			
			}else{
				//kembali
			
						$data = [
							'back' 			=> base_url('home/index'),
							'judul_header'  => "",
							'link_form'		=> base_url('Crud_kambing/tambah'),
							'value_button'	=> 'Berikutnya',
							'error'			=> "",
							'header_judul'	=> $this->header_judul,
						];
				$no_pejantan 	= trim($this->input->post("no_pejantan"));
				$no_induk 		= trim($this->input->post("no_induk"));
				$no_ternak 		= trim($this->input->post("no_ternak"));
				$jenis_kelamin 	= trim($this->input->post("jenis_kelamin"));
				$tgl_lahir 		= trim($this->input->post("tgl_lahir"));
				$telinga 		= trim($this->input->post("telinga"));
				$berat 			= trim($this->input->post("berat"));
				$berat_kosong =  form_error('berat');
				$data_kambing = [
					"no_pejantan" 	=> $no_pejantan,
					"no_induk"		=> $no_induk,
					"no_ternak" 	=> $no_ternak,
					"jenis_kelamin" => $jenis_kelamin,
					"tgl_lahir"		=> $tgl_lahir,
					"telinga" 		=> $telinga,
					'berat'			=> $berat,
					'berat_kosong'	=> $berat_kosong,
					// "nama_gambar" 	=> $this->upload->data('file_name'),
				];
			
						$this->load->view('design_latar/home/header_home');
						$this->load->view('design_latar/home/navigasi_back', $data);
						$this->load->view('design_latar/form/header_form', $data);
						$this->load->view('home/tambah_kambing',$data_kambing);
						$this->load->view('design_latar/form/button_form', $data);
						$this->load->view('design_latar/form/footer_form');
			}

			
//Simpan
		}elseif($button == "Simpan"){
			$no_pejantan 	= $this->session->userdata("no_pejantan");
			$no_induk 		= $this->session->userdata("no_induk");
			$no_ternak 		= $this->session->userdata("no_ternak");
			$jenis_kelamin 	= $this->session->userdata("jenis_kelamin");
			$tgl_lahir 		= $this->session->userdata("tgl_lahir");
			$telinga 		= $this->session->userdata("telinga");
			$warna 			= $this->session->userdata("warna");
			$nama_gambar 	= $this->session->userdata("nama_gambar");
			$berat 			= $this->session->userdata("berat");


			$tgl_sekarang	= $this->m_data->get_id('tgl', 'id_tgl', 1);
			$data_kambing = [
				"no_pejantan" 	=> $no_pejantan,
				"no_induk"		=> $no_induk,
				"no_ternak" 	=> $no_ternak,
				"jenis_kelamin" => $jenis_kelamin,
				"tgl_lahir"		=> $tgl_lahir,
				"telinga" 		=> $telinga,
				"pola_warna"	=> $warna,
				"gambar_kambing"=> $nama_gambar,
				"id_user"		=> $this->session->userdata('id_user'),
				
			];
			
			$data_bulan = [
				"no_ternak" 	=> $no_ternak,
				// "gambar"		=> $nama_gambar,
				"nilai_awal"	=> $berat,
				// "bulan_ke"		=> 0,	
				"tgl_pencatatan"=> $tgl_sekarang['tgl'],
				// "kondisi"		=> $kondisi,
				"id_user"		=> $this->session->userdata('id_user'),
			];
			$this->db->insert("kambing", $data_kambing);
			$this->db->insert("bulan", $data_bulan);


			$usia			= $this->m_c_pertumbuhan->tgl($no_ternak);
			$setAwal		= $this->m_c_pertumbuhan->setAwal($usia);
			$nilai_awal 	= $setAwal['nilai_awal'];
			$cek_kesehatan	= $this->m_c_pertumbuhan->cek_kesehatan($jenis_kelamin, $nilai_awal, $berat);
			$kondisi		=  $cek_kesehatan['kondisi'];
			$db 			= $this->m_data->get_id_2('bulan','no_ternak', $no_ternak,'nilai_awal',$berat,'id_bulan','DESC');
			$data_bulan2 = [
				"bulan_ke"		=> $nilai_awal,	
				"kondisi"		=> $kondisi,
			];
			
			$array = array(
				'check' => 'tambah',
				'check2' => 'kambing',
			);

			$this->session->set_userdata($array);
			$this->m_data->u_data3("bulan",'id_bulan',$db->id_bulan, $data_bulan2,'id_bulan','DESC');
			redirect('home/overview_kambing/').$no_ternak;
		}else {
			//AWAL
			$data = [
				'back' 			=> base_url('home/index'),
				'judul_header'  => "",
				'link_form'		=> base_url('Crud_kambing/tambah'),
				'value_button'	=> 'Berikutnya',
				'error'			=> '',
				'header_judul'  	=> $this->header_judul,
			];

			$no_pejantan 	= "";
			$no_induk 		= "";
			$no_ternak 		= "";
			$jenis_kelamin 	= "";
			$tgl_lahir 		= "";
			$telinga 		= "";
			$berat			= "";

			$data_kambing = [
				"no_pejantan" 	=> $no_pejantan,
				"no_induk"		=> $no_induk,
				"no_ternak" 	=> $no_ternak,
				"jenis_kelamin" => $jenis_kelamin,
				"tgl_lahir"		=> $tgl_lahir,
				"telinga" 		=> $telinga,
				'berat_kosong'	=> $berat_kosong,
				"berat" 		=> $berat,
				// "warna" 		=> $warna,
				// "nama_gambar" 	=> $this->upload->data('file_name'),
			];
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form', $data);
			$this->load->view('home/tambah_kambing', $data_kambing);
			$this->load->view('design_latar/form/button_form', $data);
			$this->load->view('design_latar/form/footer_form');
		

		}
		
		
	 }

	public function edit()
	{

	 }

	public function delete()
	{

	 }
}
