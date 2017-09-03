<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->helper('form');
		$this->load->library('form_validation');

	}

	public function index()
	{
		// create the data object
    	$data = new stdClass();

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header');
			$this->load->view('master/navigation');
			if ($this->session->userdata('role_id') == 0) {
				$this->load->view('pages/dashboardOwner', $data);
				$this->load->view('master/jsDashboardOwner');
			} else {
				$this->load->view('pages/dashboardAdmin', $data);
				$this->load->view('master/jsDashboardAdmin');
			}
			$this->load->view('master/footer');
		} else {
			$this->load->helper('url');
			header('location:'.base_url().'user/login');
		}
	}
}
?>