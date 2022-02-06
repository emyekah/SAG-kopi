<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_t_cara extends CI_model {
	function tambah_($data)
	{
		$this->db->set('id_cara',$data['id_cara']);
		
		$this->db->set('judul',$data['judul']);
		$this->db->set('deskripsi',$data['deskripsi']);
		$this->db->insert('c_pembayaran');
		return $this->db->affected_rows();
	}
}
?>