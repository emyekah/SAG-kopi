<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_produksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
      $this->load->model('hasil_produksis');
	}

   public function index()
   {
		$this->cek_login();

		$this->template->admin('admin/manage_hasil_produksi');
   }

	public function ajax_list()
   {
      $list = $this->hasil_produksis->get_datatables();
      $data = array();
      $no = $_POST['start'];
      foreach ($list as $i) {

         $no++;
         $row = array();
         $row[] = $no;
         $row[] = $i->id_produksi;
		 $row[] = $i->tanggal_hasil_produksi;
		$row[] = $i->jumlah_hasil_jadi;
         $row[] = $i->jumlah_sortir;
		 $row[] = $i->hasil_bersih;
		  $row[] = '<a href="'.site_url('hasil_produksi/detail/'.$i->id_produksi).'" class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i></a>
		 <a href="'.site_url('hasil_produksi/delete/'.$i->id_produksi).'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
				<a href="'.site_url('hasil_produksi/update_hasil_produksi/'.$i->id_produksi).'" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>';
				
         $data[] = $row;
      }

      $output = array(
               	"draw" => $_POST['draw'],
               	"recordsTotal" => $this->hasil_produksis->count_all(),
               	"recordsFiltered" => $this->hasil_produksis->count_filtered(),
               	"data" => $data
      			);
      //output to json format
   	echo json_encode($output);
   }
  
   public function add_hasil_produksi()
   {
		$this->cek_login();

      if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi
         $this->form_validation->set_rules('tanggal', 'Tanggal Hasil Produksi', 'required');
		 $this->form_validation->set_rules('produksi', 'Produksi', 'required');
		  $this->form_validation->set_rules('jumlahsortir', 'Jumlah Sortir', 'required|numeric');
			$this->form_validation->set_rules('jumlah', 'Jumlah Hasil Jadi', 'required|numeric');
         $this->form_validation->set_rules('hasil', 'Hasil Bersih', 'required|numeric');

         if ($this->form_validation->run() == TRUE)
         {
				
					
                	//proses insert data item
		         $hasil_produksis = array (

		            'id_produksi' => $this->input->post('produksi', TRUE),
					'tanggal_hasil_produksi' => $this->input->post('tanggal', TRUE),
		            'jumlah_hasil_jadi' => $this->input->post('jumlah', TRUE),
		            'jumlah_sortir' => $this->input->post('jumlahsortir', TRUE),
					'hasil_bersih' => $this->input->post('hasil', TRUE),	
		         );

		        	$id_produksi = $this->hasil_produksis->insert_last('t_hasil_produksi', $hasil_produksis);
					//akses function kategori
					
					

					redirect('hasil_produksi');

         }
      }
	  $select = [
						'o.id_biji AS id_biji',
						'id_produksi',
						'jenis'
						
					];

      $table = "t_produksi o JOIN t_biji i ON (o.id_biji = i.id_biji)";

		$detail = $this->hasil_produksis->select_from($select, $table);

 $data['daftar_produksi'] 		= $detail->result();

      $data['produksi'] 		= $this->input->post('produksi', TRUE);
	  $data['tanggal'] 		= $this->input->post('tanggal', TRUE);
	  $data['jumlahsortir'] 		= $this->input->post('jumlahsortir', TRUE);
      $data['jumlah'] 	= $this->input->post('jumlah', TRUE);
      $data['hasil'] 	= $this->input->post('hasil', TRUE);
	  $data['rk'] 		= '';

      $data['header'] = "Tambah Produk Baru";

      $this->template->admin('admin/hasil_produksi_form', $data);
   }
   
   public function detail()
	{
		$this->cek_login();
		$id_produksi = $this->uri->segment(3);
		$hasil_produksi = $this->hasil_produksis->get_where('t_hasil_produksi', array('id_produksi' => $id_produksi));

		foreach ($hasil_produksi->result() as $key) {
			$data['tanggal_hasil_produksi'] = $key->tanggal_hasil_produksi;
			$data['id_produksi'] = $key->id_produksi;
			$data['jumlah_sortir'] = $key->jumlah_sortir;
			$data['jumlah_hasil_jadi'] = $key->jumlah_hasil_jadi;
			$data['hasil_bersih'] = $key->hasil_bersih;
			
		}

		$this->template->admin('admin/detail_hasil_produksi', $data);
	}

	public function update_hasil_produksi()
   {
		$this->cek_login();
		$id_produksi = $this->uri->segment(3);

      if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi
        $this->form_validation->set_rules('tanggal', 'Tanggal Hasil Produksi', 'required');
		 $this->form_validation->set_rules('produksi', 'Produksi', 'required');
		  $this->form_validation->set_rules('jumlahsortir', 'Jumlah Sortir', 'required|numeric');
			$this->form_validation->set_rules('jumlah', 'Jumlah Hasil Jadi', 'required|numeric');
         $this->form_validation->set_rules('hasil', 'Hasil Bersih', 'required|numeric');
 
         if ($this->form_validation->run() == TRUE)
         {
				$hasil_produksis = array (
					'id_produksi' => $this->input->post('produksi', TRUE),
					'tanggal_hasil_produksi' => $this->input->post('tanggal', TRUE),
		            'jumlah_hasil_jadi' => $this->input->post('jumlah', TRUE),
		            'jumlah_sortir' => $this->input->post('jumlahsortir', TRUE),
					'hasil_bersih' => $this->input->post('hasil', TRUE),	
		         
				);
$this->hasil_produksis->update('t_hasil_produksi', $hasil_produksis, array('id_produksi' => $id_produksi));
				
				redirect('hasil_produksi');
         }
      }

		$hasil_produksi = $this->hasil_produksis->get_where('t_hasil_produksi', array('id_produksi' => $id_produksi));
$produksi = $this->hasil_produksis->get_all('t_produksi');
 $data['daftar_produksi'] 		= $produksi->result();

		foreach($hasil_produksi->result() as $key) {
		$data['produksi'] 		= $key->id_produksi;
	  	$data['tanggal'] 		= $this->input->post('tanggal', TRUE);
	  	$data['jumlahsortir'] 		= $this->input->post('jumlahsortir', TRUE);
      $data['jumlah'] 	= $this->input->post('jumlah', TRUE);
      $data['hasil'] 	= $this->input->post('hasil', TRUE);
		}


      $data['header'] = "Edit Hasil Produksi";

      $this->template->admin('admin/hasil_produksi_form', $data);
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
		$this->hasil_produksis->deleteku($id_produksi);
		$this ->session->set_flashdata('message', 'Data produk berhasil di hapus');
		redirect('hasil_produksi');
	}

}
