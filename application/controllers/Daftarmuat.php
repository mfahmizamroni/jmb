<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarmuat extends CI_Controller {

	
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
		$this->load->model('daftarmuat_model');
		$this->load->model('faktur_model');
		$this->load->model('truk_model');
		$this->load->model('Statuskirim_model');

	}

	public function index()
	{
		// create the data object
	    $data = new stdClass();
	    $title = 'Surat Jalan';
	    $daftarmuat = $this->daftarmuat_model->get_daftarmuat_all_joined();

	    $data = array('title' => $title, 'daftarmuat'=>$daftarmuat );

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->helper('url');
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/daftarmuat/viewDaftarmuat', $data);
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
	    $faktur = $this->faktur_model->get_faktur_all_fordm();
	    $count = 0;
	    $lastdm = $this->daftarmuat_model->get_last_dm();

	    $data = array('title' => $title,'truk' => $truk, 'faktur'=>$faktur, 'lastdm' => $lastdm, 'count'=>$count);

		// set validation rules
	    $this->form_validation->set_rules('no_dm', 'Nomor Surat Jalan', 'required');
	    $this->form_validation->set_rules('truk', 'Nopol Truk', 'required');
	    $this->form_validation->set_rules('sopir', 'Nama Sopir', 'required');
	    $this->form_validation->set_rules('nosm1', 'Nomor Surat Masuk', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->view('master/header', $data);
				$this->load->view('master/navigation');
				$this->load->view('pages/daftarmuat/addDaftarmuat', $data);
				$this->load->view('pages/daftarmuat/addModal');
				$this->load->view('pages/daftarmuat/addModalJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$no_dm = $this->input->post('no_dm');
			$truk = $this->input->post('truk');
			$sopir = $this->input->post('sopir');

			$id_faktur = array();
			$kode_faktur = array();
			$total_faktur = array();
			$total_qty_faktur = array();

			$i = 1;
			while ($this->input->post('nosm'.$i)) {
				$idf = $this->input->post('id'.$i);
				$fkt = $this->input->post('nosm'.$i);
				$ttl = $this->input->post('total'.$i);
				$ttl_qty = $this->input->post('total_qty'.$i);

				$id_faktur[$i] = $idf; 
				$kode_faktur[$i] = $fkt; 
				$total_faktur[$i] = $ttl;
				$total_qty_faktur[$i] = $ttl_qty;

				$i++;
			}

			$total_ongkos = array_sum($total_faktur);
			$total_qty = array_sum($total_qty_faktur);

			if ($this->daftarmuat_model->create_dm($no_dm, $truk, $sopir, $total_ongkos, $total_qty)) {

				$lunas = 0;
				$potongan = 0;
				$status_kirim = 'BT';

				for ($i=1; $i <= count($kode_faktur); $i++) { 
					$this->faktur_model->update_dm($id_faktur[$i], $no_dm, $lunas, $status_kirim, $potongan);
				}
				$success = "creation success";
				$title = 'Faktur';
			    $truk = $this->truk_model->get_truk_all();
			    $faktur = $this->faktur_model->get_faktur_all();
				$data = array('success' => $success, 'title' => $title, 'truk' => $truk, 'faktur'=>$faktur );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'daftarmuat');
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
	    $faktur = $this->faktur_model->get_faktur_all_nosj();
	    $status_kirim = $this->Statuskirim_model->get_sk_all();
	    $daftarmuat = $this->daftarmuat_model->get_dm($id);
	    $faktursj = $this->faktur_model->get_faktur_per_dm($daftarmuat->no_dm);
	    $count = count($faktursj->result());
	    $i = count($faktursj->result())+1;
	    $title = 'Surat Jalan - '.$daftarmuat->no_dm;

	    $data = array('title' => $title,'truk' => $truk, 'faktur'=>$faktur, 'daftarmuat'=>$daftarmuat, 'faktursj'=>$faktursj, 'i'=>$i, 'status_kirim' => $status_kirim, 'count' => $count);

		// set validation rules
	    $this->form_validation->set_rules('no_dm', 'Nomor Surat Jalan', 'required');
	    $this->form_validation->set_rules('nosm1', 'Nomor Surat Masuk', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->view('master/header', $data);
				$this->load->view('master/navigation');
				$this->load->view('pages/daftarmuat/editDaftarmuat', $data);
				$this->load->view('master/delete');
				$this->load->view('pages/daftarmuat/addModal');
				$this->load->view('pages/daftarmuat/editModalJs', $data);
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$no_dm = $this->input->post('no_dm');
			$sopir = $this->input->post('sopir');
			$truk = $this->input->post('truk');
			$status_kirim = $this->input->post('status_kirim');

			$kode_faktur = array();
			$total_faktur = array();
			$total_qty_faktur = array();
			$lunas = array();
			$status_kirim = array();
			$potongan = array();

			$i = 1;
			while ($this->input->post('nosm'.$i)) {
				$idf = $this->input->post('id'.$i);
				$fkt = $this->input->post('nosm'.$i);
				$lns = $this->input->post('lunas'.$i);
				$sk = $this->input->post('status_kirim'.$i);
				$pt = $this->input->post('potongan'.$i);
				$ttl = $this->input->post('total'.$i);
				$ttl_qty = $this->input->post('total_qty'.$i);


				$id_faktur[$i] = $idf; 
				$kode_faktur[$i] = $fkt; 
				$total_faktur[$i] = $ttl;
				$total_qty_faktur[$i] = $ttl_qty;
				$lunas[$i] = $lns; 
				$status_kirim[$i] = $sk; 
				$potongan[$i] = $pt; 
				$i++;
			}

			$total_ongkos = array_sum($total_faktur);
			$total_qty = array_sum($total_qty_faktur);

			if ($this->daftarmuat_model->update_dm($id, $no_dm, $truk, $sopir, $total_ongkos, $total_qty)) {

				var_dump($id_faktur);
				for ($i=1; $i <= count($id_faktur); $i++) { 
					$this->faktur_model->update_dm($id_faktur[$i], $no_dm, $lunas[$i], $status_kirim[$i], $potongan[$i]);
				}
				$success = "creation success";
				$title = 'Faktur';
			    $truk = $this->truk_model->get_truk_all();
			    $status_kirim = $this->Statuskirim_model->get_sk_all();
			    $faktur = $this->faktur_model->get_faktur_all();
				$data = array('success' => $success, 'title' => $title, 'truk' => $truk, 'faktur'=>$faktur, 'status_kirim' => $status_kirim );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->helper('url');
					header('location:'.base_url().'daftarmuat');
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
		$dm = $this->daftarmuat_model->get_dm($id);
		$faktur_dm = $this->faktur_model->get_faktur_per_dm($dm->no_dm);
		$j = 0;
		$id_faktur = array();
		foreach ($faktur_dm->result() as $fdm) {
			$id_faktur[$j] = $fdm->id_faktur;
			$j++;
		}

		$lunas = 0;
		$potongan = 0;
		$status_kirim = 0;
		$no_dm = 0;

		for ($i=0; $i <= count($id_faktur)+1; $i++) { 
			$this->faktur_model->update_dm($id_faktur[$i], $no_dm, $lunas, $status_kirim, $potongan);
		}

		// $faktur_dm = $this->faktur_model->get_faktur_per_dms($dm->no_dm);

		if ($this->daftarmuat_model->delete_dm($id)) {

			$success = "delete success";
			$data = array('success' => $success );


				// user creation ok
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				header('location:'.base_url().'daftarmuat');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		}
	}
}
?>