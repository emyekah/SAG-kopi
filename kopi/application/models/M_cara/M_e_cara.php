<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_e_cara extends CI_model {
	function edit_data($where,$table)
	{
	return $this->db->get_where($table,$where);
	}
}
?>