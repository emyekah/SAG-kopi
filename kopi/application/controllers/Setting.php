<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');
	}

	public function index()
	{
		$this->cek_login();

      if ($this->input->post('submit', TRUE))
      {
         //validasi
         $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[255]');
         $this->form_validation->set_rules('hp1', 'Phone1', 'required|min_length[5]|max_length[15]|numeric');
         $this->form_validation->set_rules('hp2', 'Phone2', 'required|min_length[5]|max_length[15]|numeric');
         $this->form_validation->set_rules('fb', 'Facebook', 'required|min_length[5]|max_length[255]');
         $this->form_validation->set_rules('shopee', 'Shopee', 'required|min_length[5]|max_length[255]');
         $this->form_validation->set_rules('instagram', 'Instagram', 'required|min_length[5]|max_length[255]');
         $this->form_validation->set_rules('whatsapp1', 'Whatsapp(1)', 'required|min_length[5]|max_length[255]');
         $this->form_validation->set_rules('whatsapp2', 'Whatsapp(2)', 'required|min_length[5]|max_length[255]');
         $this->form_validation->set_rules('alamat', 'Alamat Toko', 'required|min_length[5]');
			$this->form_validation->set_rules('email_toko', 'Email Toko', 'required|valid_email');
			$this->form_validation->set_rules('pass_toko', 'Password Email Toko', 'required|min_length[5]');
			$this->form_validation->set_rules('asal', 'ID Kota / Kabupaten', 'required|max_length[3]|numeric');
			$this->form_validation->set_rules('api_key', 'Api Key', 'required|min_length[5]');
			$this->form_validation->set_rules('rekening1', 'Rekening1', 'required|min_length[8]');
			$this->form_validation->set_rules('rekening2', 'Rekening2', 'required|min_length[8]');
			$this->form_validation->set_rules('rekening3', 'Rekening3', 'required|min_length[8]');

         if ($this->form_validation->run() == TRUE)
         {
            $profile = array(
               'title' => $this->input->post('title', TRUE),
               'phone1' => $this->input->post('hp1', TRUE),
               'phone2' => $this->input->post('hp2', TRUE),
               'alamat_toko' => $this->input->post('alamat', TRUE),
               'facebook' => $this->input->post('fb', TRUE),
               'shopee' => $this->input->post('shopee', TRUE),
               'whatsapp1' => $this->input->post('whatsapp1', TRUE),
               'whatsapp2' => $this->input->post('whatsapp2', TRUE),
               'instagram' => $this->input->post('instagram', TRUE),
					'email_toko' => $this->input->post('email_toko', TRUE),
					'pass_toko' => $this->input->post('pass_toko', TRUE),
					'asal' => $this->input->post('asal', TRUE),
					'api_key' => $this->input->post('api_key', TRUE),
					'rekening1' => $this->input->post('rekening1', TRUE),
					'rekening2' => $this->input->post('rekening2', TRUE),
					'rekening3' => $this->input->post('rekening3', TRUE)
            );

            $this->admin->update('t_profil', $profile, ['id_profil' => 1]);
            $this->session->set_flashdata('alert', 'Data berhasil di update');
            redirect('setting');
         }

         $data['judul']    	= $this->input->post('title', TRUE);
         $data['alamat']   	= $this->input->post('alamat', TRUE);
         $data['hp1']       	= $this->input->post('hp1', TRUE);
         $data['hp2']       	= $this->input->post('hp2', TRUE);
         $data['fb']       	= $this->input->post('fb', TRUE);
         $data['shopee']  	= $this->input->post('shopee', TRUE);
         $data['instagram']    	= $this->input->post('instagram', TRUE);
		$data['whatsapp1']    	= $this->input->post('whatsapp1', TRUE);
		$data['whatsapp2']    	= $this->input->post('whatsapp2', TRUE);
			$data['mail_toko']   = $this->input->post('email_toko', TRUE);
			$data['pass_toko']   = $this->input->post('pass_toko', TRUE);
			$data['api_key']    	= $this->input->post('api_key', TRUE);
			$data['asal']  	  	= $this->input->post('asal', TRUE);
			$data['rekening1']  	= $this->input->post('rekening1', TRUE);
			$data['rekening2']  	= $this->input->post('rekening2', TRUE);
			$data['rekening3']  	= $this->input->post('rekening3', TRUE);

      } else {

         $profil = $this->admin->get_all('t_profil')->row();

         $data['judul']    	= $profil->title;
         $data['alamat']   	= $profil->alamat_toko;
         $data['hp1']       	= str_replace('-', '',$profil->phone1);
         $data['hp2']       	= str_replace('-', '',$profil->phone2);
         $data['fb']       	= $profil->facebook;
         $data['shopee']  	= $profil->shopee;
         $data['instagram']    	= $profil->instagram;
         $data['whatsapp1']    	= $profil->whatsapp1;
         $data['whatsapp2']    	= $profil->whatsapp2;
			$data['mail_toko']   = $profil->email_toko;
			$data['pass_toko']   = $profil->pass_toko;
			$data['api_key']    	= $profil->api_key;
			$data['asal']	    	= $profil->asal;
			$data['rekening1']    = $profil->rekening1;
			$data['rekening2']    = $profil->rekening2;
			$data['rekening3']    = $profil->rekening3;
      }

		$this->template->admin('admin/setting', $data);
	}

	function cek_login()
	{
		if (!$this->session->userdata('admin'))
		{
			redirect('login');
		}
	}
}
