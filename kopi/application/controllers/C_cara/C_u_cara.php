<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
class C_u_cara extends CI_Controller {
	function __construct() 
	{
	parent ::__construct();//jika belum login redirect ke halaman login
	
	
	$this->load->model('M_cara/M_u_cara');
	$this->load->helper(array('form','url'));
	}
	function update() {
		$id= $this->input->post('id_cara');
		
		$data_cara = array(
		'id_cara'	=> $this->input->post('id_cara'),
		'judul'		=> $this->input->post('judul'),
		'deskripsi'		=> $this->input->post('deskripsi'),
		);
	
	$where = array(
	'id_cara' => $id);
	$this->M_u_cara->update_data($where,$data_cara,'c_pembayaran');
	$this ->session->set_flashdata('message', 'Data manajemen informasi berhasil di update');
		redirect('c_cara/c_v_cara','refresh');
	}	
}
?>