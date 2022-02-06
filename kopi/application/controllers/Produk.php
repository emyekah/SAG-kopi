<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
      $this->load->model('produks');
	}

   public function index()
   {
		$this->cek_login();

		$this->template->admin('admin/manage_produk');
   }

	public function ajax_list()
   {
      $list = $this->produks->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $i) {

         $no++;
         $row = array();
         $row[] = $no;
         $row[] = $i->namabarang;
			$row[] = $i->jenis;
         $row[] = $i->jumlahbarang;
		 $row[] = $i->dipesan;
		 $row[] = $i->tersedia;
		 $row[] = $i->keterangan;
         $data[] = $row;
      }

      $output = array(
               	"draw" => $_POST['draw'],
               	"recordsTotal" => $this->produks->count_all(),
               	"recordsFiltered" => $this->produks->count_filtered(),
               	"data" => $data
      			);
      //output to json format
   	echo json_encode($output);
   }
  

	function cek_login()
	{
		if (!$this->session->userdata('admin'))
		{
			redirect('login');
		}
	}
}
