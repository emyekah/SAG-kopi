<?php if ( ! defined('BASEPATH')) exit('No direct script acces allowed');
class M_h_cara extends CI_Model {
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>