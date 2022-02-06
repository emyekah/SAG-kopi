<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
      $this->load->model(array('bijis', 'hasil_produksis', 'produksis'));
	}

   public function index()
   {
		$this->cek_login();

		$this->template->admin('admin/manage_laphasil');
   }
   
   

	public function ajax_list()
   {
      $list = $this->hasil_produksis->get_datatables2();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $i) {
			
         $no++;
         $row = array();
         $row[] = $no;
         $row[] = $i->id_produksi;
         $row[] = $i->jenis;
         $row[] = date('d-m-Y',strtotime($i->tanggal_hasil_produksi));
         $row[] = '<a href="'.site_url('laporan/detail/'.$i->id_produksi).'" class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i></a>';
				

         $data[] = $row;
      }

      $output = array(
               	"draw" => $_POST['draw'],
               	"recordsTotal" => $this->hasil_produksis->count_all2(),
               	"recordsFiltered" => $this->hasil_produksis->count_filtered2(),
               	"data" => $data
      			);
      //output to json format
   	echo json_encode($output);
   }

   public function detail()
   {
      $this->cek_login();

      if (!is_numeric($this->uri->segment(3)))
      {
         redirect('laporan');
      }

      $select = [
						'c.id_produksi AS id_produksi',
						'a.jenis AS jenis',
						'a.jumlah AS jumlah_biji',
						'b.jumlah_produksi AS jumlah_produksi',
						'b.tanggal_produksi AS tanggal_produksi',
						'c.tanggal_hasil_produksi AS tanggal_hasil_produksi',
						'c.jumlah_hasil_jadi AS jumlah_hasil_jadi',
						'c.jumlah_sortir AS jumlah_sortir',
						'c.hasil_bersih AS hasil_bersih'
					];

      $table = "t_biji a JOIN t_produksi b ON (a.id_biji = b.id_biji)
                                       JOIN t_hasil_produksi c ON (c.id_produksi = b.id_produksi)";

      $data['data'] = $this->hasil_produksis->select_where($select, $table, ['c.id_produksi' => $this->uri->segment(3)]);

      $this->template->admin('admin/detail_laphasil', $data);
   }

	function cek_login()
	{
		if (!$this->session->userdata('admin'))
		{
			redirect('login');
		}
	}
}
