<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Faktur extends CI_Controller {

	
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
		$this->load->model('klien_model');
		$this->load->model('truk_model');
		$this->load->model('faktur_model');
		$this->load->model('item_model');

	}

	public function index()
	{
		// create the data object
	    $data = new stdClass();
	    $title = 'Faktur';
	    $faktur = $this->faktur_model->get_faktur_all_nosj();
	    $faktur_history = $this->faktur_model->get_faktur_all_nosj_history();

	    $data = array('title' => $title, 'faktur' => $faktur, 'faktur_history' => $faktur_history);

		$this->load->library('session');
		if ($this->session->has_userdata('username')) {
			$this->load->view('master/header', $data);
			$this->load->view('master/navigation');
			$this->load->view('pages/faktur/viewFaktur', $data);
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
	    $title = 'Faktur';
	    $klien = $this->klien_model->get_klien_all();
	    $truk = $this->truk_model->get_truk_all();

	    $data = array('title' => $title, 'klien' => $klien, 'truk' => $truk);

		// set validation rules
	    $this->form_validation->set_rules('kode_faktur', 'Nomor Faktur', 'required|is_unique[faktur.kode_faktur]');
	    $this->form_validation->set_rules('pengirim', 'pengirim', 'required');
	    $this->form_validation->set_rules('penerima', 'penerima', 'required');
	    $this->form_validation->set_rules('tujuan', 'tujuan', 'required');
	    $this->form_validation->set_rules('jumlahBarang1', 'jumlah barang', 'required');
	    $this->form_validation->set_rules('jenis1', 'jenis barang', 'required');
	    $this->form_validation->set_rules('harga1', 'harga/unit', 'required');
	    $this->form_validation->set_rules('jumlahUang1', 'total uang', 'required');

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->view('master/header', $data);
				$this->load->view('master/navigation');
				$this->load->view('pages/faktur/faktur', $data);
				$this->load->view('pages/faktur/addModal');
				$this->load->view('pages/faktur/addModalJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$kode_faktur = $this->input->post('kode_faktur');
			$tujuan = $this->input->post('tujuan');
			$no_sj = $this->input->post('no_sj');
			$pengirim = $this->input->post('pengirim');
			$penerima = $this->input->post('penerima');

			$jumlahBarang = array();
			$jenis = array();
			$harga = array();
			$jumlahUang = array();

			$i = 1;
			while ($this->input->post('jumlahUang'.$i)) {
				$brg = $this->input->post('jumlahBarang'.$i);
				$jns = $this->input->post('jenis'.$i);
				$hrg = $this->input->post('harga'.$i);
				$ung = $this->input->post('jumlahUang'.$i);

				$jumlahBarang[$i] = $brg; 
				$jenis[$i] = $jns; 
				$harga[$i] = $hrg; 
				$jumlahUang[$i] = $ung;
				$i++;
			}

			// var_dump($jumlahBarang);
			// var_dump($jenis);
			// var_dump($harga);
			// var_dump(array_sum($jumlahUang));

			$total = array_sum($jumlahUang);
			$total_qty = array_sum($jumlahBarang);
			$kembali = 0;

			if ($this->faktur_model->create_faktur($kode_faktur,  $no_sj, $pengirim, $penerima, $tujuan, $total, $total_qty, $kembali)) {

				for ($i=1; $i <= count($jumlahBarang); $i++) { 
					$this->item_model->create_item($kode_faktur, $jumlahBarang[$i], $jenis[$i], $harga[$i], $jumlahUang[$i]);
				}
				$success = "creation success";
				$title = 'Faktur';
			    $klien = $this->klien_model->get_klien_all();
			    $truk = $this->truk_model->get_truk_all();
				$data = array('success' => $success, 'title' => $title, 'klien' => $klien, 'truk' => $truk );

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					$this->load->view('master/header', $data);
					$this->load->view('master/navigation');
					$this->load->view('pages/faktur/faktur', $data);
					$this->load->view('pages/faktur/addModal');
					$this->load->view('pages/faktur/addModalJs');
					$this->load->view('master/jsViewTables');
					$this->load->view('master/jsAdd');
					$this->load->view('master/footer');
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
	    $title = 'Faktur';
	    $klien = $this->klien_model->get_klien_all();
	    $truk = $this->truk_model->get_truk_all();
	    $faktur = $this->faktur_model->get_faktur($id);
	    $kode_faktur = $this->input->get('kode_faktur');
	    $item = $this->item_model->get_item_per_faktur($kode_faktur);
	    $i = count($item->result())+1;

	    $data = array('title' => $title, 'klien' => $klien, 'truk' => $truk, 'faktur'=>$faktur, 'item'=>$item, 'i'=>$i);

		// set validation rules
	    $this->form_validation->set_rules('kode_faktur', 'Nomor Faktur', 'required');
	    $this->form_validation->set_rules('pengirim', 'pengirim', 'required');
	    $this->form_validation->set_rules('penerima', 'penerima', 'required');
	    $this->form_validation->set_rules('tujuan', 'tujuan', 'required');
	    // $this->form_validation->set_rules('jumlahBarang1', 'jumlah barang', 'required');
	    // $this->form_validation->set_rules('jenis1', 'jenis barang', 'required');
	    // $this->form_validation->set_rules('harga1', 'harga/unit', 'required');
	    // $this->form_validation->set_rules('jumlahUang1', 'total uang', 'required');

	    // var_dump(count($item->result()));

	    if ($this->form_validation->run() === false) {
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->view('master/header', $data);
				$this->load->view('master/navigation');
				$this->load->view('pages/faktur/editFaktur', $data);
				$this->load->view('master/delete');
				$this->load->view('pages/faktur/addModal');
				$this->load->view('pages/faktur/editModalJs');
				$this->load->view('master/footer');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		} else {
			$kode_faktur = $this->input->post('kode_faktur');
			$tujuan = $this->input->post('tujuan');
			$no_sj = $this->input->post('no_sj');
			$pengirim = $this->input->post('pengirim');
			$penerima = $this->input->post('penerima');
			$lunas = $this->input->post('lunas');
			// var_dump($lunas);

			$jumlahBarang = array();
			$jenis = array();
			$harga = array();
			$jumlahUang = array();
			$id_item = array();

			$i = 1;
			while ($this->input->post('jumlahUang'.$i)) {
				$brg = $this->input->post('jumlahBarang'.$i);
				$jns = $this->input->post('jenis'.$i);
				$hrg = $this->input->post('harga'.$i);
				$ung = $this->input->post('jumlahUang'.$i);
				$iditm = $this->input->post('idItem'.$i);

				$jumlahBarang[$i] = $brg; 
				$jenis[$i] = $jns; 
				$harga[$i] = $hrg; 
				$jumlahUang[$i] = $ung; 
				$id_item[$i] = $iditm; 
				$i++;
			}

			// var_dump($jumlahBarang);
			// var_dump($jenis);
			// var_dump($harga);
			// var_dump(array_sum($jumlahUang));

			$total = array_sum($jumlahUang);

			if ($this->faktur_model->update_faktur($id, $kode_faktur,  $no_sj, $pengirim, $penerima, $tujuan, $total, $lunas)) {
				
				$item = $this->item_model->get_item_per_faktur($kode_faktur);
				if (count($id_item) > count($item->result())) {
					for ($i=count($item->result())+1; $i <= count($id_item); $i++) { 
						$this->item_model->create_item($kode_faktur, $jumlahBarang[$i], $jenis[$i], $harga[$i], $jumlahUang[$i]);
					}
				}

				for ($i=1; $i <= count($jumlahBarang); $i++) { 
					$this->item_model->update_item($id_item[$i], $kode_faktur, $jumlahBarang[$i], $jenis[$i], $harga[$i], $jumlahUang[$i]);
				}

				$success = "update success";
				$title = 'Faktur';
			    $klien = $this->klien_model->get_klien_all();
			    $truk = $this->truk_model->get_truk_all();
			    $faktur = $this->faktur_model->get_faktur($id);
				$data = array('success' => $success, 'title' => $title, 'klien' => $klien, 'truk' => $truk, 'faktur'=>$faktur, 'item'=>$item );

				// var_dump(count($item->result()));
				// var_dump(count($id_item));

				$this->load->library('session');
				if ($this->session->has_userdata('username')) {
					// $this->load->view('master/header', $data);
					// $this->load->view('master/navigation');
					// $this->load->view('pages/faktur/editFaktur', $data);
					// $this->load->view('pages/faktur/addModal');
					// $this->load->view('pages/faktur/addModalJs');
					// $this->load->view('master/jsViewTables');
					// $this->load->view('master/jsAdd');
					// $this->load->view('master/footer');
					$this->load->helper('url');
					header('location:'.base_url().'faktur');
				} else {
					$this->load->helper('url');
					header('location:'.base_url().'user/login');
				}

			}
		}
	}
	public function delete($id)
	{
		//$id = $this->input->get('id');
		if ($this->faktur_model->delete_faktur($id)) {

			$success = "delete success";
			$data = array('success' => $success );
				// user creation ok
			$this->load->library('session');
			if ($this->session->has_userdata('username')) {
				$this->load->helper('url');
				header('location:'.base_url().'faktur');
			} else {
				$this->load->helper('url');
				header('location:'.base_url().'user/login');
			}
		}
	}
	public function deleteitem($id)
	{
		//$id = $this->input->get('id');
		//$this->item_model->delete_item($id);
		$id_faktur = $this->input->get('id_faktur');
		$faktur = $this->faktur_model->get_faktur($id_faktur);
		$item = $this->item_model->get_item($id);
		$total = $faktur->total - $item->total;
		$this->faktur_model->update_total($id_faktur, $total);
		if ($this->item_model->delete_item($id)) {

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
}
?>