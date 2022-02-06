<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_e_cara extends CI_Controller {
	function __construct() 
	{
	parent ::__construct();
	
	$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');
	
	$this->load->model('M_cara/M_e_cara');
	}
	function edit (){
	$where = array('id_cara' =>$this->uri->segment(4));
	$data['data'] = $this->M_e_cara->edit_data($where,'c_pembayaran')->result();
	
	$this->template->admin('admin/cara/form_edit_cara',$data);
}
}
?>