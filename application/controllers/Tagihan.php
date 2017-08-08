<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

	
	/**
   * __construct function.
   * 
   * @access public
   * @return void
   */
	public function __construct() {

		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->library('form_validation');
		$this->load->model('faktur_model');
		$this->load->model('tagihan_model');
	}

	public function index()
	{
		// create the data object
	    $data = new stdClass();
	    $title = 'Tagihan';
	    $tagihan = $this->tagihan_model->get_tagihan_all_joined();

	    $data = array('title' => $title, 'tagihan' => $tagihan );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/tagihan/viewTagihan', $data);
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function add()
	{
		// create the data object
	    $data = new stdClass();
	    $title = 'Tagihan';
	    $faktur = $this->faktur_model->get_faktur_all_nosj();

	    $data = array('title' => $title, 'faktur'=>$faktur);

		// set validation rules
	    $this->form_validation->set_rules('no_tagihan', 'Nomor Tagihan', 'required');
	    $this->form_validation->set_rules('klien', 'Nama Perusahaan', 'required');
	    $this->form_validation->set_rules('tipe_pembayaran', 'Tipe Pembayaran', 'required');
	    $this->form_validation->set_rules('nosm1', 'Nomor Surat Muat', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->view('master/header', $data);
				$this->load->view('master/navigation');
				$this->load->view('pages/tagihan/addTagihan', $data);
				$this->load->view('pages/tagihan/addModal');
				$this->load->view('pages/tagihan/addModalJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$no_tagihan = $this->input->post('no_tagihan');
			$klien = $this->input->post('klien');
			$tipe_pembayaran = $this->input->post('tipe_pembayaran');

			$kode_faktur = array();
			$total_tagihan = 0;

			$i = 1;
			while ($this->input->post('nosm'.$i)) {
				$fkt = $this->input->post('nosm'.$i);
				$ttl = $this->input->post('total'.$i);
				$kode_faktur[$i] = $fkt; 
				$total_tagihan += $ttl;
				$i++;
			}

			if ($this->tagihan_model->create_tagihan($no_tagihan, $klien, $tanggal_pembayaran, $total_tagihan)) {

				$lunas = 0;

				for ($i=1; $i <= count($kode_faktur); $i++) { 
					$this->faktur_model->update_dm($kode_faktur[$i], $no_dm, $lunas);
				}
				$success = "creation success";
				$title = 'Faktur';
			    $faktur = $this->faktur_model->get_faktur_all();
				$data = array('success' => $success, 'title' => $title, 'truk' => $truk, 'faktur'=>$faktur );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'tagihan');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			}
		}
	}

	public function edit($id)
	{
		// create the data object
	    $data = new stdClass();
	    $title = 'Tagihan';
	    $faktur = $this->faktur_model->get_faktur_all_nosj();

	    $data = array('title' => $title, 'faktur'=>$faktur);

		// set validation rules
	    $this->form_validation->set_rules('no_tagihan', 'Nomor Tagihan', 'required');
	    $this->form_validation->set_rules('klien', 'Nama Perusahaan', 'required');
	    $this->form_validation->set_rules('tipe_pembayaran', 'Tipe Pembayaran', 'required');
	    $this->form_validation->set_rules('nosm1', 'Nomor Surat Muat', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->view('master/header', $data);
				$this->load->view('master/navigation');
				$this->load->view('pages/tagihan/editTagihan', $data);
				$this->load->view('pages/tagihan/addModal');
				$this->load->view('pages/tagihan/addModalJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$no_tagihan = $this->input->post('no_tagihan');
			$klien = $this->input->post('klien');
			$tipe_pembayaran = $this->input->post('tipe_pembayaran');

			$kode_faktur = array();
			$total_tagihan = 0;

			$i = 1;
			while ($this->input->post('nosm'.$i)) {
				$fkt = $this->input->post('nosm'.$i);
				$ttl = $this->input->post('total'.$i);
				$kode_faktur[$i] = $fkt; 
				$total_tagihan += $ttl;
				$i++;
			}

			if ($this->tagihan_model->create_tagihan($no_tagihan, $klien, $tanggal_pembayaran, $total_tagihan)) {

				$lunas = 0;

				for ($i=1; $i <= count($kode_faktur); $i++) { 
					$this->faktur_model->update_dm($kode_faktur[$i], $no_dm, $lunas);
				}
				$success = "creation success";
				$title = 'Faktur';
			    $faktur = $this->faktur_model->get_faktur_all();
				$data = array('success' => $success, 'title' => $title, 'truk' => $truk, 'faktur'=>$faktur );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'tagihan');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			}
		}
	}
	public function delete()
	{
		
	}
}
