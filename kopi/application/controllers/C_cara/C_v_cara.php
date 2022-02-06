<?php defined('BASEPATH') OR exit('No direct script access allowed');
class C_v_cara extends CI_Controller {
	
	
	function __construct() {
	parent::__construct();
		//jika belum login redirect ke halaman login
		
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');
		
		$this->load->model('m_cara/m_v_cara');
	}
	public function index()
	{
		$this->cek_login();

		

		
		$data['data'] = $this->m_v_cara->tampil_data_cara();
		$this->template->admin('admin/cara/view_cara',$data);
	}
	
	function cek_login()
	{
		if (!$this->session->userdata('admin'))
		{
			redirect('login');
		}
	}
	
}