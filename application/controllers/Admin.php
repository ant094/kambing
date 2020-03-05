<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	protected $header_judul = "Control Admin";

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_data'));
		// $this->load->library('form_validation');
		$this->load->helper(array('form'));
	}
	public function index()
	{	
		$tgl = $this->m_data->get_id("tgl",'id_tgl',1);

		$data = [
			'back' 			=> base_url('home/index'),
			'judul_header'	=> "Catatan Pertumbuhan",
			'value_button'	=> 'Simpan',
			'link_form'		=> base_url('admin/index'),
			'informasi'		=> FALSE,
			'set_tgl'		=> 	$tgl['tgl'],
			'header_judul'   	=> $this->header_judul,
		];
		$button = $this->input->post('submit');
		if ($button == 'Simpan') {
			$tgl = $this->input->post('tgl');
		
			$data_tgl = [
				'tgl' => $tgl,
			];
			$this->m_data->u_data2('tgl', 'id_tgl', 1, $data_tgl);

			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('admin/index', $data);
			$this->load->view('design_latar/form/footer_form');

			redirect('admin/index');
		}elseif($button == 'Reset')
		{
		$waktu_sekarang  = date('d-m-Y');
		$data_tgl=[
			'tgl'=>$waktu_sekarang,
		];
		$this->m_data->u_data2('tgl','id_tgl',1,$data_tgl);

			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('admin/index', $data);
			$this->load->view('design_latar/form/footer_form');

			redirect('admin/index');
		}else{
			$this->load->view('design_latar/home/header_home');
			$this->load->view('design_latar/home/navigasi_back', $data);
			$this->load->view('design_latar/form/header_form');
			$this->load->view('admin/index', $data);
			$this->load->view('design_latar/form/footer_form');
		}

	}
}
