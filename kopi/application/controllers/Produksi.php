<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
      $this->load->model('produksis');
	}

   public function index()
   {
		$this->cek_login();

		$this->template->admin('admin/manage_produksi');
   }

	public function ajax_list()
   {
      $list = $this->produksis->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $i) {

         $no++;
         $row = array();
         $row[] = $no;
   
		 $row[] = $i->tanggal_produksi;
			$row[] = $i->jumlah_produksi;
         $row[] = $i->catatan;
		  $row[] = '<a href="'.site_url('produksi/detail/'.$i->id_produksi).'" class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i></a>
		 <a href="'.site_url('produksi/delete/'.$i->id_produksi).'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
				<a href="'.site_url('produksi/update_produksi/'.$i->id_produksi).'" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>';
				
         $data[] = $row;
      }

      $output = array(
               	"draw" => $_POST['draw'],
               	"recordsTotal" => $this->produksis->count_all(),
               	"recordsFiltered" => $this->produksis->count_filtered(),
               	"data" => $data
      			);
      //output to json format
   	echo json_encode($output);
   }
  
   public function add_produksi()
   {
		$this->cek_login();

      if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi
         $this->form_validation->set_rules('tanggal', 'Tanggal Produksi', 'required');
		 $this->form_validation->set_rules('biji', 'Biji', 'required');
			$this->form_validation->set_rules('jumlah', 'Jumlah Produksi', 'required|numeric');
         $this->form_validation->set_rules('catatan', 'Catatan', 'required|min_length[4]');

         if ($this->form_validation->run() == TRUE)
         {
				
					
                	//proses insert data item
		         $produksis = array (

		            'id_biji' => $this->input->post('biji', TRUE),
					'tanggal_produksi' => $this->input->post('tanggal', TRUE),
		            'jumlah_produksi' => $this->input->post('jumlah', TRUE),
		            'catatan' => $this->input->post('catatan', TRUE),
						
		         );

		        	$id_produksi = $this->produksis->insert_last('t_produksi', $produksis);
					//akses function kategori
					
					

					redirect('produksi');

         }
      }
$biji = $this->produksis->get_all('t_biji');
 $data['daftar_biji'] 		= $biji->result();

      $data['biji'] 		= $this->input->post('biji', TRUE);
	  $data['tanggal'] 		= $this->input->post('tanggal', TRUE);
      $data['jumlah'] 	= $this->input->post('jumlah', TRUE);
      $data['catatan'] 	= $this->input->post('catatan', TRUE);
	  $data['rk'] 		= '';

      $data['header'] = "Tambah Produk Baru";

      $this->template->admin('admin/produksi_form', $data);
   }
   
   public function detail()
	{
		$this->cek_login();
		$id_produksi = $this->uri->segment(3);
		$produksi = $this->produksis->get_where('t_produksi', array('id_produksi' => $id_produksi));

		foreach ($produksi->result() as $key) {
			$data['id_biji'] = $key->id_biji;
			$data['id_produksi'] = $key->id_produksi;
			$data['tanggal_produksi'] = $key->tanggal_produksi;
			$data['jumlah_produksi'] = $key->jumlah_produksi;
			$data['catatan'] = $key->catatan;
			
		}

		$this->template->admin('admin/detail_produksi', $data);
	}

	public function update_produksi()
   {
		$this->cek_login();
		$id_produksi = $this->uri->segment(3);

      if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi
        $this->form_validation->set_rules('tanggal', 'Tanggal Produksi', 'required');
		 $this->form_validation->set_rules('biji', 'Biji', 'required');
			$this->form_validation->set_rules('jumlah', 'Jumlah Produksi', 'required|numeric');
         $this->form_validation->set_rules('catatan', 'Catatan', 'required|min_length[4]');
		 
         if ($this->form_validation->run() == TRUE)
         {
				$produksis = array (
					'id_biji' => $this->input->post('biji', TRUE),
					'tanggal_produksi' => $this->input->post('tanggal', TRUE),
		            'jumlah_produksi' => $this->input->post('jumlah', TRUE),
		            'catatan' => $this->input->post('catatan', TRUE),
					
				);
$this->produksis->update('t_produksi', $produksis, array('id_produksi' => $id_produksi));
				
				redirect('produksi');
         }
      }

		$produksi = $this->produksis->get_where('t_produksi', array('id_produksi' => $id_produksi));
$biji = $this->produksis->get_all('t_biji');
 $data['daftar_biji'] 		= $biji->result();

		foreach($produksi->result() as $key) {
			$data['biji'] = $key->id_biji;
			$data['id_produksi'] = $key->id_produksi;
			$data['tanggal'] = $key->tanggal_produksi;
			$data['jumlah'] = $key->jumlah_produksi;
			$data['catatan'] = $key->catatan;
			
		}


      $data['header'] = "Edit Produksi";

      $this->template->admin('admin/produksi_form', $data);
   }
   
	function cek_login()
	{
		if (!$this->session->userdata('admin'))
		{
			redirect('login');
		}
	}
		public function delete($id_produksi)
	{
		$this->produksis->deleteku($id_produksi);
		$this ->session->set_flashdata('message', 'Data produk berhasil di hapus');
		redirect('produksi');
	}

}
