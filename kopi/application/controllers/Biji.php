<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biji extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
      $this->load->model('bijis');
	}

   public function index()
   {
		$this->cek_login();

		$this->template->admin('admin/manage_biji');
   }

	public function ajax_list()
   {
      $list = $this->bijis->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $i) {

         $no++;
         $row = array();
         $row[] = $no;
		 $row[] = $i->tanggal_datang;
		 $row[] = $i->jumlah;
		 $row[] = $i->jenis;
		 $row[] = '<a href="'.site_url('biji/detail/'.$i->id_biji).'" class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i></a>
		 <a href="'.site_url('biji/delete/'.$i->id_biji).'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
				<a href="'.site_url('biji/update_biji/'.$i->id_biji).'" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>';
				
         $data[] = $row;
      }

      $output = array(
               	"draw" => $_POST['draw'],
               	"recordsTotal" => $this->bijis->count_all(),
               	"recordsFiltered" => $this->bijis->count_filtered(),
               	"data" => $data
      			);
      //output to json format
   	echo json_encode($output);
   }
  
   public function add_biji()
   {
		$this->cek_login();

      if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi
		 $this->form_validation->set_rules('tanggal', 'Tanggal Datang', 'required');
		 $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
         $this->form_validation->set_rules('jenis', 'Jenis', 'required|min_length[4]');

         if ($this->form_validation->run() == TRUE)
         {
				
					
                	//proses insert data item
		         $bijis = array (

		            'tanggal_datang' => $this->input->post('tanggal', TRUE),
		            'jumlah' => $this->input->post('jumlah', TRUE),
		            'jenis' => $this->input->post('jenis', TRUE),
						
		         );

		        	$id_biji = $this->bijis->insert_last('t_biji', $bijis);
					//akses function kategori
					
					

					redirect('biji');

         }
      }

      $data['tanggal'] 		= $this->input->post('tanggal', TRUE);
      $data['jumlah'] 	= $this->input->post('jumlah', TRUE);
      $data['jenis'] 	= $this->input->post('jenis', TRUE);
	  $data['rk'] 		= '';

      $data['header'] = "Tambah Produk Baru";

      $this->template->admin('admin/biji_form', $data);
   }
   
   public function detail()
	{
		$this->cek_login();
		$id_biji = $this->uri->segment(3);
		$biji = $this->bijis->get_where('t_biji', array('id_biji' => $id_biji));

		foreach ($biji->result() as $key) {
			$data['id_biji'] = $key->id_biji;
			$data['tanggal_datang'] = $key->tanggal_datang;
			$data['jumlah'] = $key->jumlah;
			$data['jenis'] = $key->jenis;
			
		}

		$this->template->admin('admin/detail_biji', $data);
	}

	public function update_biji()
   {
		$this->cek_login();
		$id_biji = $this->uri->segment(3);

      if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi
        $this->form_validation->set_rules('tanggal', 'Tanggal Datang', 'required');
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
         $this->form_validation->set_rules('jenis', 'Jenis', 'required|min_length[4]');

         if ($this->form_validation->run() == TRUE)
         {
				$bijis = array (
					'tanggal_datang' => $this->input->post('tanggal', TRUE),
					'jumlah' => $this->input->post('jumlah', TRUE),
					'jenis' => $this->input->post('jenis', TRUE),
					
				);
$this->bijis->update('t_biji', $bijis, array('id_biji' => $id_biji));
				
				redirect('biji');
         }
      }

		$biji = $this->bijis->get_where('t_biji', array('id_biji' => $id_biji));


		foreach($biji->result() as $key) {
	      $data['tanggal'] = $key->tanggal_datang;
	      $data['jumlah'] = $key->jumlah;
	      $data['jenis'] = $key->jenis;
	      
		}


      $data['header'] = "Edit Biji";

      $this->template->admin('admin/biji_form', $data);
   }
   
	function cek_login()
	{
		if (!$this->session->userdata('admin'))
		{
			redirect('login');
		}
	}
		public function delete($id_biji)
	{
		$this->bijis->deleteku($id_biji);
		$this ->session->set_flashdata('message', 'Data produk berhasil di hapus');
		redirect('biji');
	}

}
