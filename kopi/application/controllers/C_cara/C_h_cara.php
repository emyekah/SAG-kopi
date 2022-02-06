<?php if ( ! defined('BASEPATH')) exit('No direct script acces allowed');
class C_h_cara extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_cara/m_h_cara');
	}
	function hapus () {
		$where = array('id_cara' => $this->uri->segment(4));
		$this->m_h_cara->hapus_data($where,'C_pembayaran');
		$this ->session->set_flashdata('message', 'Data cara pembayaran berhasil di hapus');
		redirect('c_cara/c_v_cara','refresh');
	}
}
?>