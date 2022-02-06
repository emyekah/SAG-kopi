<?php defined('BASEPATH') OR exit('No direct script acces allowed');
class C_t_cara extends CI_Controller {
	function __construct() {
	parent ::__construct();
	//jika belum login redirect ke halaman login
	
	
	$this->load->model('m_cara/m_t_cara');
	$this->load->helper(array('form','url'));
	}
	function simpan() {
		
		$data = array(
		'id'				=> NULL,
		'judul'			=> $this->input->post('judul'),
		'deskripsi'					=> $this->input->post('deskripsi'),	
		);

	if($this->m_t_cara->tambah_($data)){
		$this ->session->set_flashdata('message', 'Data cara berhasil di simpan');
		redirect('c_cara/c_v_cara','refresh');
	}
	else {
		$this ->session->set_flashdata('message', 'Data cara telah gagal di simpan');
		redirect('c_cara/c_v_cara','refresh');
	}
	}
}
?>