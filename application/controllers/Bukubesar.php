<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Bukubesar extends CI_Controller {

	
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
	    $tagihan = $this->tagihan_model->get_tagihan_all_joined_lunas();

	    $data = array('title' => $title, 'tagihan' => $tagihan );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/bukubesar/viewBukubesar', $data);
			$this->load->view('master/delete');
			$this->load->view('master/jsViewTables');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}

	public function lihat($id)
	{
		// create the data object
	    $data = new stdClass();
	    $title = 'Tagihan';
	    $tagihan = $this->tagihan_model->get_tagihan($id);
	    $fakturtagihan = $this->faktur_model->get_faktur_per_tagihan($tagihan->no_tagihan);
	    $count = count($fakturtagihan->result());
	    $faktur = $this->faktur_model->get_faktur_all_sj_nolunas();

	    $data = array('title' => $title, 'tagihan'=>$tagihan, 'fakturtagihan'=>$fakturtagihan,'faktur'=>$faktur, 'count'=>$count);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/bukubesar/viewTagihan', $data);
			$this->load->view('master/delete');
			$this->load->view('pages/tagihan/addModal');
			$this->load->view('pages/tagihan/addModalJs');
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}

	}
}
?>