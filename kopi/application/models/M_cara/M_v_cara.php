<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_v_cara extends CI_model {
	function tampil_data_cara()
	{
		$this->db->select('*');
		$this->db->from('c_pembayaran');
		$this->db->order_by('id_cara', 'desc');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}
	
}
?>