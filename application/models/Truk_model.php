<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Truk_model extends CI_Model {
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
	public function get_truk($id_truk) {
		
		$this->db->from('truk');
		$this->db->where('id_truk', $id_truk);
		return $this->db->get()->row();
		
	}

	public function get_truk_all() {
		
		return $this->db->get('truk');
		
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
	public function create_truk($nopol,  $jenis, $kapasitas, $ongkos) {
		
		$data = array(
			'nopol'   => $nopol,
			'jenis'   => $jenis,
			'kapasitas'  => $kapasitas,
			'ongkos'      => $ongkos,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('truk', $data);
		
	}
	
	public function update_truk($id_truk, $nopol, $jenis, $kapasitas, $ongkos) {
		
		$data = array(
			'nopol'   => $nopol,
			'jenis'   => $jenis,
			'kapasitas'      => $kapasitas,
			'ongkos'      => $ongkos,
			'updated_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id_truk', $id_truk);
		$this->db->update('truk', $data);
		return $id_truk;
		
	}

	public function delete_truk($id) {
		
		$this->db->where('id_truk', $id);
		$this->db->delete('truk');
		return $id;
		
	}
}