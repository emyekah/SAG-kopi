<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_produksis extends CI_Model {

   var $table           = 't_hasil_produksi';
   var $column_order    =  array(
                                 null,
								 'id_produksi',
                                 'tanggal_hasil_produksi',
                                 'jumlah_hasil_jadi',
                                 'jumlah_sortir',
								 'hasil_bersih',
                                 null,
                                 null
                           ); //set column field database for datatable orderable
   var $column_search   =  array('id_produksi','tanggal_hasil_produksi','jumlah_hasil_jadi','jumlah_sortir','hasil_bersih'); //set column field database for datatable searchable
   var $order = array('id_produksi' => 'asc'); // default order

   var $table2           = 't_biji a JOIN t_produksi b ON (a.id_biji = b.id_biji)
                                       JOIN t_hasil_produksi c ON (c.id_produksi = b.id_produksi)';
   var $column_order2    =  array(
                                 null,
                         'c.id_produksi',
                         'a.jenis',
                                 'c.tanggal_hasil_produksi',
                                 null,
                                 null
                           ); //set column field database for datatable orderable
   var $column_search2   =  array('c.id_produksi',
                         'a.jenis',
                                 'c.tanggal_hasil_produksi'); //set column field database for datatable searchable
   var $order2 = array('c.id_produksi' => 'asc'); // default order

   public function __construct()
   {
      parent::__construct();
   }

   private function _get_datatables_query()
   {

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

   private function _get_datatables_query2()
   {

      $this->db->from($this->table2);

      $i = 0;

      foreach ($this->column_search2 as $item) // loop column
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

            if(count($this->column_search2) - 1 == $i) {//last loop
               $this->db->group_end(); //close bracket
            }
         }
         $i++;
      }

      if(isset($_POST['order'])) // here order processing
      {

         $this->db->order_by($this->column_order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

      } else if(isset($this->order2)) {

         $order2 = $this->order2;
         $this->db->order_by(key($order2), $order2[key($order2)]);

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

   function get_datatables2()
   {
      $this->_get_datatables_query2();

      if($_POST['length'] != -1)
      {
         $this->db->limit($_POST['length'], $_POST['start']);
         $query = $this->db->get();
         return $query->result();
      }
   }

   function count_filtered()
   {
      $this->_get_datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
   }

   function count_filtered2()
   {
      $this->_get_datatables_query2();
      $query = $this->db->get();
      return $query->num_rows();
   }
 function select_from($select, $table)
   {
      $this->db->select($select);
      $this->db->from($table);
      

      return $this->db->get();
   }
   function count_all()
   {
      $this->db->from($this->table);
      return $this->db->count_all_results();
   }

   function count_all2()
   {
      $this->db->from($this->table2);
      return $this->db->count_all_results();
   }

   function insert($table = '', $data = '')
   {
      $this->db->insert($table, $data);
   }

	function insert_last($table = '', $data = '')
   {
      $this->db->insert($table, $data);

		return $this->db->insert_id();
   }

	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}

	function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

   function select_where($select, $table, $where)
   {
      $this->db->select($select);
      $this->db->from($table);
      $this->db->where($where);

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
   function deleteku($id_produksi)//لحذف منتج
		{
			//guery delete id->products
			$this->db->where('id_produksi',$id_produksi)
					->delete('t_hasil_produksi');
		}
}
