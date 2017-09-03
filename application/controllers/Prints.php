<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prints extends CI_Controller {

	
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
		$this->load->model('daftarmuat_model');
		$this->load->model('faktur_model');
		$this->load->model('truk_model');
		$this->load->model('Statuskirim_model');
		$this->load->model('tagihan_model');
	}

	public function index()
	{
		$data = new stdClass();
		$id = $this->input->get('id');
		$truk = $this->truk_model->get_truk_all();
	    $faktur = $this->faktur_model->get_faktur_all_nosj();
	    $status_kirim = $this->Statuskirim_model->get_sk_all();
	    $daftarmuat = $this->daftarmuat_model->get_dm($id);
	    $faktursj = $this->faktur_model->get_faktur_per_dm($daftarmuat->no_dm);
	    $count = count($faktursj->result());
	    $i = count($faktursj->result())+1;
	    $title = 'Surat Jalan - '.$daftarmuat->no_dm;

	    $data = array('title' => $title,'truk' => $truk, 'faktur'=>$faktur, 'daftarmuat'=>$daftarmuat, 'faktursj'=>$faktursj, 'i'=>$i, 'status_kirim' => $status_kirim, 'count' => $count);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('pages/print/print_dm', $data);
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function maspion() 
	{
		$data = new stdClass();
		$id = $this->input->get('id');
		$title = 'Tagihan';
	    $tagihan = $this->tagihan_model->get_no_tagihan($id);
	    $fakturtagihan = $this->faktur_model->get_faktur_per_tagihan($id);
	    $count = count($fakturtagihan->result());
	    $faktur = $this->faktur_model->get_faktur_all_sj_nolunas();

	    $data = array('title' => $title, 'tagihan'=>$tagihan, 'fakturtagihan'=>$fakturtagihan,'faktur'=>$faktur, 'count'=>$count);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('pages/print/print_maspion', $data);
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function print_tagihan() 
	{
		$data = new stdClass();
		$id = $this->input->get('id');
		$title = 'Tagihan';
	    $tagihan = $this->tagihan_model->get_no_tagihan($id);
	    $fakturtagihan = $this->faktur_model->get_faktur_per_tagihan($id);
	    $count = count($fakturtagihan->result());
	    $faktur = $this->faktur_model->get_faktur_all_sj_nolunas();

	    $data = array('title' => $title, 'tagihan'=>$tagihan, 'fakturtagihan'=>$fakturtagihan,'faktur'=>$faktur, 'count'=>$count);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('pages/print/print_tagihan', $data);
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

}
