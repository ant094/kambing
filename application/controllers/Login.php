<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
		 $button= $this->input->post("submit");


		if ($button == "SIGN IN") {

			$this->form_validation->set_rules('email', 'no_induk', 'required');
			$email=$this->input->post("email");
			
			if ($this->form_validation->run() == false) {

				$data=[
					'email'=>'',
					'register' => 	$this->session->has_userdata('register') ?  $this->session->userdata('register') : 'A',
				];

				$this->session->unset_userdata('register');
				$this->load->view('design_latar/home/header_home');
				$this->load->view('home/login',$data);
			}elseif ($db=$this->m_data->get_login($email)) {

				$data_session = [
					"email"			=> $db['email'],
				];

				$this->session->set_userdata($data_session);
				redirect('login/password');
			}else{
				$data = [
					'email' => '*Email tidak terdaftar',
					'register' => 	$this->session->has_userdata('register') ?  $this->session->userdata('register') : 'A',
				];

				$this->session->unset_userdata('register');
				$this->load->view('design_latar/home/header_home');
				$this->load->view('home/login', $data);
			}

		}		 else {
			$data = [
				'email' => '',
				'register'=> 	$this->session->has_userdata('register') ?  $this->session->userdata('register') : 'A',
			];
			
			$this->session->unset_userdata('register');
			
			$this->load->view('design_latar/home/header_home');
			$this->load->view('home/login', $data);;
		}
		
	}
	
	public function password()
	{
		$this->form_validation->set_rules('password', 'no_induk', 'required');
		$password	= $this->input->post("password");
		$email		= $this->session->userdata('email');
		$db = $this->m_data->get_login_password($email, $password);
		if ($db) {

			$data_session = [
				"id_user"		=> $db['id_user'],
				"nama_pemilik"	=> $db['nama_pemilik'],
				"email_user"	=> $db['email'],
				'status'		=> "login",
			];

			$this->session->set_userdata($data_session);
			redirect('home/index');
		}elseif ($this->form_validation->run() == false) {
			$data = [
				'back' 			=> base_url('login/index'),
				'password' 		=> '',
				'navigasi_font' => "Password ",
			];
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back_login', $data);
			$this->load->view('home/login_password', $data);
		} else {
			$data = [
				'back' 			=> base_url('login/index'),
				'navigasi_font' => "SIGN IN",
				'navigasi_font' => "Password ",
				'password' 		=> '*Password tidak sesuai',
			];
		
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back_login', $data);
			$this->load->view('home/login_password');
		}
	}

	public function register()
	{
		$button = $this->input->post("submit");

		if ($button == 'Berikutnya') {
			$this->form_validation->set_rules('nama_pemilik', 'kosonh bos', 'trim|required');
			$this->form_validation->set_rules('email', 'no_induk', 'trim|required');
			$this->form_validation->set_rules('password', 'no_ternak', 'trim|required');
			
			if ($this->form_validation->run() == false ) {

				$data = [
					'back' 			=> base_url('login/index'),
					'judul_header'  => "Tambah Kambing",
					'link_form'		=> base_url('Crud_kambing/tambah'),
					'value_button'	=> 'Berikutnya',
				];
					$nama_pemilik 	= $this->input->post("nama_pemilik");
					$email 			= $this->input->post("email");
					$password		= $this->input->post("password");
					
					$data = [
						'navigasi_font' => "Register ",
						'nama_pemilik'	=> $nama_pemilik,
						'email'			=> $email,
						'check'			=> 'check',
					];
					

					$this->load->view('design_latar/home/header_home');
					$this->load->view('design_latar/home/navigasi_back_login', $data);
					$this->load->view('home/register', $data);

			}else{
				//True
				if (!empty($this->input->post("check"))) {
					$nama_pemilik 	= $this->input->post("nama_pemilik");
					$email	 		= $this->input->post("email");
					$password 		= $this->input->post("password");

					$data_user_register = [
						'nama_pemilik'	=> $nama_pemilik,
						'email'			=> $email,
						'password'		=> $password,
						'role_user'		=> 1,
					];

					
					$array = array(
						'register' => 'register'
					);
					
					$this->session->set_userdata( $array );
					
					$this->m_data->insert_data("user", $data_user_register);
					redirect('login/index');
				 } else {
					$data = [
						'back' 			=> base_url('login/index'),
						'judul_header'  => "Tambah Kambing",
						'link_form'		=> base_url('Crud_kambing/tambah'),
						'value_button'	=> 'Berikutnya',
					];
					$nama_pemilik 	= $this->input->post("nama_pemilik");
					$email 			= $this->input->post("email");
					$password		= $this->input->post("password");

					$data = [
						'navigasi_font' => "Register ",
						'nama_pemilik'	=> $nama_pemilik,
						'email'			=> $email,
						'check'			=> 'check',
					];


					$this->load->view('design_latar/home/header_home');
					$this->load->view('design_latar/home/navigasi_back_login', $data);
					$this->load->view('home/register', $data);
				}
			

			}
	}else{
			$nama_pemilik 	= "";
			$email 			= "";
			$password		= "";
			

			$data = [
				'navigasi_font' => "Register",
				'nama_pemilik'	=> $nama_pemilik,
				'email'			=> $email,
				'check'			=> '',
				'password'		=> $password ,
			];
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back_login', $data);
			$this->load->view('home/register');
	}
	}

	public function logout()
	{
		
		$this->session->sess_destroy();
		redirect(base_url("login/index"));
	}
	public function bantuan()
	{
		$data = [
			'back' => base_url('home/index'),
			"header_judul" => "Bantuan",
		];

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		// $this->load->view('design_latar/form/header_form');
		$this->load->view('logout/bantuan');
	}
	public function about()
	{
		$data = [
			'back' => base_url('home/index'),
			"header_judul" => "Tentang SiKambing",
		];

		$this->load->view('design_latar/home/header_home');
		$this->load->view('design_latar/home/navigasi_back', $data);
		// $this->load->view('design_latar/form/header_form');
		$this->load->view('logout/about');
	}



}
