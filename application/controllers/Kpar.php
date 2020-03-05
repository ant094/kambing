<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kpar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_data'));
		// $this->load->library('form_validation');
		$this->load->helper(array('form'));
	}

	public function index()
	{
		$this->load->view('design_latar/home/header_home');
		$this->load->view('kpar/index');
		// $this->load->view('design_latar/home/footer_home', $data);
	}

	public function login()
	{
		$email 	= $this->input->post('email');
		$pass 	= $this->input->post('pass');
		$email  = trim($email);
		$pass  	= trim($pass);

		$data = [
			'email' => $email,
			'password' => $pass,
		];

		$user = $this->m_data->get_where('user',$data);
		if ($user) {
			$tambah = $this->session->has_userdata('tambah') ? $this->session->userdata('tambah') : '';
			$data = [
				'lagu' => $this->m_data->tampil_lagu('kpar'), 
					'tambah'=>$tambah,
			];
			$this->load->view('design_latar/home/header_home');
			$this->load->view('kpar/lagu', $data);
			
			$array = array(
				'nama_user' => $email,
			);
			
			$this->session->set_userdata( $array );
			
		}else{
			redirect('kpar/index');
		}
	}
	public function cari()
	{
		$cari = $this->input->post('cari');
			$tambah = $this->session->has_userdata('tambah') ? $this->session->userdata('tambah') : '';
			
			$this->session->unset_userdata('tambah');
		if  (!empty($cari)) {
			$data = [
				'lagu' => $this->m_data->cariGejala('kpar','judul',$cari), 
				'tambah'=>$tambah,
			];
			$this->load->view('design_latar/home/header_home');
			$this->load->view('kpar/lagu', $data);
			
		}else{
				$data = [
				'lagu' => $this->m_data->tampil_lagu('kpar'), 
				'tambah'=>$tambah,
			];
			$this->load->view('design_latar/home/header_home');
			$this->load->view('kpar/lagu', $data);
			
		}
	}


	public function tambah_lagu()
	{
		$lagu = $this->input->post('lagu');
		// die($lagu);
		$data = [
			'judul'=>$lagu,
			'user' =>$this->session->userdata('nama_user'),
		];
		$this->m_data->insert_data('kpar',$data);
		
		
		$array = array(
			'tambah' => "tambah",
		);
		
		$this->session->set_userdata( $array );

		redirect('kpar/cari');
		
	}
}
