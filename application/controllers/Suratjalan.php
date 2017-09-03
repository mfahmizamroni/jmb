<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratjalan extends CI_Controller {

	
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
		$this->load->model('suratjalan_model');
		$this->load->model('faktur_model');
		$this->load->model('truk_model');

	}

	public function index()
	{
		// create the data object
	    $data = new stdClass();
	    $title = 'Surat Jalan';
	    $suratjalan = $this->suratjalan_model->get_suratjalan_all_joined();

	    $data = array('title' => $title, 'suratjalan'=>$suratjalan );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/suratjalan/viewSuratjalan', $data);
			$this->load->view('master/delete');
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
	    $title = 'Surat Jalan';
	    $truk = $this->truk_model->get_truk_all();
	    $faktur = $this->faktur_model->get_faktur_all_nosj();

	    $data = array('title' => $title,'truk' => $truk, 'faktur'=>$faktur);

		// set validation rules
	    $this->form_validation->set_rules('no_sj', 'Nomor Surat Jalan', 'required');
	    $this->form_validation->set_rules('nosm1', 'Nomor Surat Masuk', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->view('master/header', $data);
				$this->load->view('master/navigation');
				$this->load->view('pages/suratjalan/addSuratjalan', $data);
				$this->load->view('pages/suratjalan/addModal');
				$this->load->view('pages/suratjalan/addModalJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$no_sj = $this->input->post('no_sj');

			$kode_faktur = array();

			$i = 1;
			while ($this->input->post('nosm'.$i)) {
				$fkt = $this->input->post('nosm'.$i);
				$kode_faktur[$i] = $fkt; 
				$i++;
			}

			if ($this->suratjalan_model->create_sj($no_sj)) {

				$lunas = 0;

				for ($i=1; $i <= count($kode_faktur); $i++) { 
					$this->faktur_model->update_sj($kode_faktur[$i], $no_sj, $lunas);
				}
				$success = "creation success";
				$title = 'Faktur';
			    $truk = $this->truk_model->get_truk_all();
			    $faktur = $this->faktur_model->get_faktur_all();
				$data = array('success' => $success, 'title' => $title, 'truk' => $truk, 'faktur'=>$faktur );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'suratjalan');
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
	    $truk = $this->truk_model->get_truk_all();
	    $faktur = $this->faktur_model->get_faktur_nosj();
	    $suratjalan = $this->suratjalan_model->get_sj($id);
	    $faktursj = $this->faktur_model->get_faktur_per_sj($suratjalan->no_sj);
	    $i = count($faktursj->result())+1;
	    $title = 'Surat Jalan - '.$suratjalan->no_sj;

	    $data = array('title' => $title,'truk' => $truk, 'faktur'=>$faktur, 'suratjalan'=>$suratjalan, 'faktursj'=>$faktursj, 'i'=>$i);

		// set validation rules
	    $this->form_validation->set_rules('no_sj', 'Nomor Surat Jalan', 'required');
	    $this->form_validation->set_rules('nosm1', 'Nomor Surat Masuk', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->view('master/header', $data);
				$this->load->view('master/navigation');
				$this->load->view('pages/suratjalan/editSuratjalan', $data);
				$this->load->view('master/delete');
				$this->load->view('pages/suratjalan/addModal');
				$this->load->view('pages/suratjalan/editModalJs', $data);
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$no_sj = $this->input->post('no_sj');

			$kode_faktur = array();
			$lunas = array();

			$i = 1;
			while ($this->input->post('nosm'.$i)) {
				$fkt = $this->input->post('nosm'.$i);
				$lns = $this->input->post('lunas'.$i);
				$kode_faktur[$i] = $fkt; 
				$lunas[$i] = $lns; 
				$i++;
			}

			if ($this->suratjalan_model->update_sj($id, $no_sj)) {

				for ($i=1; $i <= count($kode_faktur); $i++) { 
					$this->faktur_model->update_sj($kode_faktur[$i], $no_sj, $lunas[$i]);
				}
				$success = "creation success";
				$title = 'Faktur';
			    $truk = $this->truk_model->get_truk_all();
			    $faktur = $this->faktur_model->get_faktur_all_joined();
				$data = array('success' => $success, 'title' => $title, 'truk' => $truk, 'faktur'=>$faktur );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'suratjalan');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			}
		}
	}
	public function deletefaktursj($id_faktur)
	{
		if ($this->faktur_model->delete_faktursj($id_faktur)) {

			$success = "delete success";
			$data = array('success' => $success );
				// user creation ok
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->library('user_agent');
				redirect($this->agent->referrer());
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		}
	}

	public function delete($id)
	{
		//$id = $this->input->get('id');
		if ($this->suratjalan_model->delete_sj($id)) {

			$success = "delete success";
			$data = array('success' => $success );
				// user creation ok
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				header('location:'.base_url().'suratjalan');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		}
	}
}
?>