<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_u_cara extends CI_model {
	function update_data($where,$data_cara,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data_cara);
	}
}
?>