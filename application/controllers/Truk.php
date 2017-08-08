<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Truk extends CI_Controller {

	
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
		$this->load->model('truk_model');

	}

	public function index()
	{
		// create the data object
	    $data = new stdClass();
	    $title = 'Truk';
	    $truk = $this->truk_model->get_truk_all();
	    $data = array('title' => $title,'truk' => $truk );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/truk/viewTruk', $data);
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
	    //$data = array('buku' => $buku);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // set validation rules
	    $this->form_validation->set_rules('jenis', 'Jenis Truk', 'required');
	    $this->form_validation->set_rules('kapasitas', 'Kapasitas Truk', 'required');
	    $this->form_validation->set_rules('ongkos', 'Ongkos', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				$this->load->view('master/header');
				$this->load->view('master/navigation');
				$this->load->view('pages/truk/addTruk');
				$this->load->view('master/jsAdd');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$jenis = $this->input->post('jenis');
			$kapasitas = $this->input->post('kapasitas');
			$ongkos = $this->input->post('ongkos');

			if ($this->truk_model->create_truk($jenis, $kapasitas, $ongkos)) {

				$success = "creation success";
				$data = array('success' => $success );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/truk/addTruk', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			} else {

        		// user creation failed, this should never happen
				$data->error = 'There was a problem creating new truk. Please try again.';

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					$this->load->view('master/header');
					$this->load->view('master/navigation');
					$this->load->view('pages/truk/addTruk', $data);
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}
			}
		}
	}

	public function edit()
	{
		
	}
	public function delete()
	{
		
	}
}
