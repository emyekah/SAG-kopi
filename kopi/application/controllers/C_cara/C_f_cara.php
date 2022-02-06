<?php defined('BASEPATH') OR exit('No direct script acces allowed');
class C_f_cara extends CI_Controller {
	function __construct() {
	parent ::__construct();
	//jika belum login redirect ke halaman login
	
	}
	public function index ()
	{ 
	
	$this->load->view('backend/cara/form_cara');
	}
}