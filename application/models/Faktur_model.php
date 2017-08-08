<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Faktur_model extends CI_Model {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * get_murid function.
	 * 
	 * @access public
	 * @param mixed $id
	 * @return object the user object
	 */
	public function get_faktur($id) {
		
		$this->db->from('faktur');
		$this->db->where('id_faktur', $id);
		return $this->db->get()->row();
	}

	public function get_faktur_all() {
		
		return $this->db->get('faktur');
		
	}

	public function get_faktur_all_nosj() {

		$this->db->from('faktur');
		$this->db->where('id_faktur_dm', '0');
		return $this->db->get()
		;
		
	}

	public function get_faktur_all_nosj_history() {

		$this->db->from('faktur');
		$this->db->where('id_faktur_dm !=', '0');
		return $this->db->get()
		;
		
	}
	// public function get_faktur_nosj() {
		
	// 	$this->db->select(array('a.id_faktur','a.kode_faktur','a.tanggal','a.sopir', 'a.total','b.nopol','c.nama_klien as nama_pengirim','d.nama_klien as nama_penerima'));
	// 	$this->db->from('faktur as a');
	// 	$this->db->join('truk as b', 'a.id_faktur_truk = b.id_truk', 'left');
	// 	$this->db->join('klien as c', 'a.id_faktur_pengirim = c.id_klien', 'left');
	// 	$this->db->join('klien as d', 'a.id_faktur_penerima = d.id_klien', 'left');
	// 	$this->db->where('id_faktur_sj', 0);
	// 	return $this->db->get();
		
	// }

	public function get_faktur_per_dm($no_dm) {
		
		$this->db->from('faktur as a');
		$this->db->join('daftar_muat as b', 'a.id_faktur_dm = b.no_dm');
		$this->db->where('id_faktur_dm', $no_dm);
		return $this->db->get();
		
	}

	public function get_faktur_all_joined() {
		
		$this->db->select(array('a.id_faktur','a.kode_faktur','a.creared_at', 'a.tujuan','a.','a.total','b.nopol'));
		$this->db->from('faktur as a');
		$this->db->join('truk as b', 'a.id_faktur_truk = b.id_truk', 'left');
		return $this->db->get();
	}

	public function get_faktur_tagihan() {
		
		$this->db->select(array('a.id_faktur','a.kode_faktur','a.tanggal','a.sopir', 'a.total', 'a.lunas', 'b.nopol','c.nama_klien as nama_pengirim','d.nama_klien as nama_penerima'));
		$this->db->from('faktur as a');
		$this->db->join('truk as b', 'a.id_faktur_truk = b.id_truk', 'left');
		$this->db->join('klien as c', 'a.id_faktur_pengirim = c.id_klien', 'left');
		$this->db->join('klien as d', 'a.id_faktur_penerima = d.id_klien', 'left');
		$this->db->where('lunas', 0);
		return $this->db->get();
		
	}

	/**
	 * create_murid function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_faktur($kode_faktur,  $no_sj, $pengirim, $penerima, $tujuan, $total, $total_qty) {
		
		$data = array(
			'kode_faktur'   		=> $kode_faktur,
			'no_sj' 				=> $no_sj,
			'id_faktur_pengirim'  	=> $pengirim,
			'id_faktur_penerima'  	=> $penerima,
			'tujuan' 				=> $tujuan,
			'total'   => $total,
			'total_qty'   => $total_qty,
			'created_at' 			=> date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('faktur', $data);
		
	}
	
	public function update_faktur($id, $kode_faktur,  $no_sj, $pengirim, $penerima, $tujuan, $total, $lunas) {
		
		$data = array(
			'kode_faktur'   		=> $kode_faktur,
			'no_sj' 				=> $no_sj,
			'id_faktur_pengirim'  	=> $pengirim,
			'id_faktur_penerima'  	=> $penerima,
			'tujuan' 				=> $tujuan,
			// 'total'   => $total,
			'lunas'   => $lunas,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id_faktur', $id);
		$this->db->update('faktur', $data);
		return $id;
		
	}

	public function update_total($id, $total) {
		
		$data = array(
			'total'   => $total,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id_faktur', $id);
		$this->db->update('faktur', $data);
		return $id;
		
	}

	public function update_dm($kode_faktur, $no_dm, $lunas, $status_kirim, $potongan ) {
		
		$data = array(
			'id_faktur_dm'   => $no_dm,
			'lunas'   => $lunas,
			'kode_sk_faktur'   => $status_kirim,
			'potongan'   => $potongan,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('kode_faktur', $kode_faktur);
		$this->db->update('faktur', $data);
		return $kode_faktur;
		
	}

	public function delete_faktur($id_faktur) {
		
		$this->db->where('id_faktur', $id_faktur);
		$this->db->delete('faktur');
		return $id_faktur;
		
	}

	public function delete_faktursj($id_faktur) {
		
		$data = array(
			'id_faktur_dm'   => 0,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id_faktur', $id_faktur);
		$this->db->update('faktur', $data);
		return $id_faktur;
		
	}
}