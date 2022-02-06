<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trans extends CI_Model {

   var $table  = 't_order';
   var $select = array('id_order', 'tgl_pesan', 'bts_bayar', 'nama_pemesan', 'status_proses', 'bukti');

   var $column_order    = array(
                              null,
                              'id_order',
                              'nama_pemesan',
                              'tgl_pesan',
                              'bts_bayar',
                              'status_proses',
                              'bukti',
                              null
                           ); //set column field database for datatable orderable
   var $column_search   = array(
                              'id_order',
                              'nama_pemesan',
                              'tgl_pesan',
                              'bts_bayar',
                              'status_proses',
                              'bukti'
                           ); //set column field database for datatable searchable
   var $order = array('id_order' => 'desc'); // default order

   public function __construct()
   {
      parent::__construct();
   }

   public function cek () {
	   $sql = "delete from t_order where 'bts_bayar < date(NOW())'";
	      
	   $data = $this->db->query($sql);
	   

   }
   
  
   
   private function _get_datatables_query()
   {

      $this->db->select($this->select);
      $this->db->from($this->table);

      $i = 0;

      foreach ($this->column_search as $item) // loop column
      {
         if($_POST['search']['value']) // if datatable send POST for search
         {

            if( $i === 0 ) // first loop
            {
               $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
               $this->db->like($item, $_POST['search']['value']);
            } else {
               $this->db->or_like($item, $_POST['search']['value']);
            }

            if(count($this->column_search) - 1 == $i) {//last loop
               $this->db->group_end(); //close bracket
            }
         }
         $i++;
      }

      if(isset($_POST['order'])) // here order processing
      {

         $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

      } else if(isset($this->order)) {

         $order = $this->order;
         $this->db->order_by(key($order), $order[key($order)]);

      }
   }

   function get_datatables()
   {
      $this->_get_datatables_query();

      if($_POST['length'] != -1)
      {
         $this->db->limit($_POST['length'], $_POST['start']);
         $query = $this->db->get();
         return $query->result();
      }
   }

   function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

   function count_filtered()
   {
      $this->_get_datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
   }

   function count_all()
   {
      $this->db->from($this->table);
      return $this->db->count_all_results();
   }

   function select_where($select, $table, $where)
   {
      $this->db->select($select);
      $this->db->from($table);
      $this->db->where($where);

      return $this->db->get();
   }
   
   

   function report($where = '')
   {
      $this->db->select(array('o.id_order AS id_order', 'o.nama_pemesan','o.kota', 'o.total', 'SUM(do.biaya) AS biaya'));

      $this->db->from('t_order o');
  	$this->db->join('t_detail_order do','do.id_order = o.id_order');
      $this->db->where($where);
      $this->db->group_by('o.id_order');

      return $this->db->get();
   }

   function update($table = null, $data = null, $where = null)
   {
   	$this->db->update($table, $data, $where);
   }

   function delete($table = null, $where = null)
   {
   	$this->db->where($where);
   	$this->db->delete($table);
   }
}
