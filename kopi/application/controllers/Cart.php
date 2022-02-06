<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'cart'));
		$this->load->model('app');
	}

	public function index()
	{
      $this->template->pesan('cart');
	}

	public function add()
	{
		if (is_numeric($this->uri->segment(3)))
		{
			$id 	= $this->uri->segment(3);
			$get 	= $this->app->get_where('t_items', array('link' => $id))->row();

			if ($this->input->post('submit', TRUE) == 'Submit')
			{

				$qty 	= $this->input->post('qty', TRUE);

				if (!is_numeric($qty) || $qty < 1 || $qty > $get->stok)
				{

					$this->session->set_flashdata('alert', 'cek kembali stok anda');

					redirect('home');

				}

				$special_char = ['`','~','!','@','#','$','%','^','&','*','(',')','_','-','+','=','[',']','{','}','\'','|','"',':',';','/','\\','?','/','<','>',','];
				//clean item name
				$name = str_replace($special_char, '', $get->nama_item);

	         $data = array(
	            'id'		=> $get->id_item,
					'link' 	=> $get->link,
	            'name' 	=> $name,
	            'price'	=> $get->harga,
	            'weight' => $get->berat,
	            'qty' 	=> $qty
	         );
				//insert cart
	         $this->cart->insert($data);

				//update stok database
				$this->app->update('t_items', ['stok' => ($get->stok - $qty)], ['id_item' => $get->id_item]);

				$this->session->set_flashdata('success', 'Produk telah ditambahkan ke keranjang');

	         echo '<script type="text/javascript">window.history.go(-1);</script>';
			}

		} else {
			redirect('home');
		}
	}

   public function update()
   {
      if ($this->uri->segment(3))
      {
         $this->load->library('form_validation');

         $this->form_validation->set_rules('qty', 'Jumlah Pesanan', 'required|numeric');

         if ($this->form_validation->run() == TRUE)
         {
				//ambil data cart
				foreach($this->cart->contents() as $c)
				{
					if ($c['rowid'] == $this->uri->segment(3))
					{
						$quantity = $c['qty'];
						$id		 = $c['id'];
					}
				}

				//ambil stok terkini
				$get = $this->app->get_where('t_items', ['id_item' => $id])->row();

				$stok = ($get->stok + $quantity);

				if ($this->input->post('qty', TRUE) > $stok)
				{
					$this->session->set_flashdata('alert', 'cek kembali stok anda');

					redirect('home');
				}

            $data = array(
               'qty' 	=> $this->input->post('qty', TRUE),
               'rowid'	=> $this->uri->segment(3)
            );

            $this->cart->update($data);

				$last_stok = $stok - $this->input->post('qty', TRUE);

				//update stok
				$this->app->update('t_items', ['stok' => $last_stok], ['id_item' => $id]);

				$this->session->set_flashdata('success', 'Produk telah diupdate');

            redirect('cart');
         } else {

            $this->template->pesan('cart');
         }

      } else {
			$this->session->set_flashdata('alert', 'Produk gagal diupdate');

         redirect('cart');
      }
   }

   public function delete()
   {
      if ($this->uri->segment(3))
      {

         $rowid = $this->uri->segment(3);

			//ambil data cart
			foreach($this->cart->contents() as $c)
			{
				if ($c['rowid'] == $rowid)
				{
					$quantity = $c['qty'];
					$id		 = $c['id'];
				}
			}

			//ambil stok terkini
			$get = $this->app->get_where('t_items', ['id_item' => $id])->row();

			$stok = ($get->stok + $quantity);

			//update stok
			$this->app->update('t_items', ['stok' => $stok], ['id_item' => $id]);

         $this->cart->remove($rowid);

			$this->session->set_flashdata('success', 'Produk berhasil dihapus');

         redirect('cart');

      } else {

			$this->session->set_flashdata('alert', 'Produk gagal dihapus');

         redirect('cart');
      }
   }
}
