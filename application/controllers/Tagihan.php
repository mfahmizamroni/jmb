<?php ob_start();
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
	    $tagihan = $this->tagihan_model->get_tagihan_all_joined_nolunas();

	    $data = array('title' => $title, 'tagihan' => $tagihan );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/tagihan/viewTagihan', $data);
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
	    $title = 'Tagihan';
	    $faktur = $this->faktur_model->get_faktur_all_sj_nolunas();
	    $count = 0;
	    $no_tagihan = $this->tagihan_model->get_last_tagihan();

	    $data = array('title' => $title, 'faktur'=>$faktur, 'no_tagihan'=>$no_tagihan, 'count'=>$count);

		// set validation rules
	    $this->form_validation->set_rules('no_tagihan', 'Nomor Tagihan', 'required');
	    $this->form_validation->set_rules('klien', 'Nama Perusahaan', 'required');
	    // $this->form_validation->set_rules('tipe_pembayaran', 'Tipe Pembayaran', 'required');
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
			$tanggal_tagihan = date('Y-m-d');

			$id_faktur = array();
			$kode_faktur = array();
			$total_tagihan = 0;

			$i = 1;
			while ($this->input->post('nosm'.$i)) {
				$idf = $this->input->post('id'.$i);
				$fkt = $this->input->post('nosm'.$i);
				$ttl = $this->input->post('total'.$i);
				$id_faktur[$i] = $idf; 
				$kode_faktur[$i] = $fkt; 
				$total_tagihan += $ttl;
				$i++;
			}

			if ($this->tagihan_model->create_tagihan($no_tagihan, $klien, $tanggal_tagihan, $total_tagihan)) {

				$lunas = 0;

				for ($i=1; $i <= count($kode_faktur); $i++) { 
					$this->faktur_model->update_tagihan($id_faktur[$i], $no_tagihan, $lunas);
				}
				$success = "creation success";
				$title = 'Faktur';
			    $faktur = $this->faktur_model->get_faktur_all();
				$data = array('success' => $success, 'title' => $title, 'faktur'=>$faktur );

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
	    $tagihan = $this->tagihan_model->get_tagihan($id);
	    $fakturtagihan = $this->faktur_model->get_faktur_per_tagihan($tagihan->no_tagihan);
	    $count = count($fakturtagihan->result());
	    $faktur = $this->faktur_model->get_faktur_all_sj_nolunas();

	    $data = array('title' => $title, 'tagihan'=>$tagihan, 'fakturtagihan'=>$fakturtagihan,'faktur'=>$faktur, 'count'=>$count);

		// set validation rules
	    $this->form_validation->set_rules('no_tagihan', 'Nomor Tagihan', 'required');
	    $this->form_validation->set_rules('klien', 'Nama Perusahaan', 'required');
	    $this->form_validation->set_rules('status', 'Status Pembayaran', 'required');
	    $this->form_validation->set_rules('nosm1', 'Nomor Surat Muat', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->view('master/header', $data);
				$this->load->view('master/navigation');
				$this->load->view('pages/tagihan/editTagihan', $data);
				$this->load->view('master/delete');
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
			$status = $this->input->post('status');
			$tanggal_tagihan = date('Y-m-d');

			$id_faktur = array();
			$kode_faktur = array();
			$total_tagihan = 0;

			$i = 1;
			while ($this->input->post('nosm'.$i)) {
				$idf = $this->input->post('id'.$i);
				$fkt = $this->input->post('nosm'.$i);
				$ttl = $this->input->post('total'.$i);
				$id_faktur[$i] = $idf; 
				$kode_faktur[$i] = $fkt; 
				$total_tagihan += $ttl;
				$i++;
			}


			if ($this->tagihan_model->update_tagihan($id, $no_tagihan, $klien, $tanggal_tagihan, $total_tagihan, $status)) {

				$lunas = 0;
				if ($status == 'transfer' || $status == 'giro' || $status == 'tunai') {
					$lunas = 1;
				}
				for ($i=1; $i <= count($kode_faktur); $i++) { 
					$this->faktur_model->update_tagihan($id_faktur[$i], $no_tagihan, $lunas);
				}
				$success = "creation success";
				$title = 'Faktur';
			    $faktur = $this->faktur_model->get_faktur_all();
				$data = array('success' => $success, 'title' => $title, 'faktur'=>$faktur );

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
	
	public function deletefakturtagihan($id_faktur)
	{
		if ($this->faktur_model->delete_fakturtagihan($id_faktur)) {

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
		$tg = $this->tagihan_model->get_tagihan($id);
		$faktur_tagihan = $this->faktur_model->get_faktur_per_tagihan($tg->no_tagihan);
		$j = 0;
		$id_faktur = array();
		foreach ($faktur_tagihan->result() as $ftg) {
			$id_faktur[$j] = $ftg->id_faktur;
			$j++;
		}

		$lunas = 0;
		$tagihan = 0;

		for ($i=0; $i <= count($id_faktur)-1; $i++) { 
			$this->faktur_model->update_tagihan($id_faktur[$i], $tagihan, $lunas);
		}

		// $faktur_dm = $this->faktur_model->get_faktur_per_dms($dm->no_dm);

		if ($this->tagihan_model->delete_tagihan($id)) {

			$success = "delete success";
			$data = array('success' => $success );


				// user creation ok
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
?>