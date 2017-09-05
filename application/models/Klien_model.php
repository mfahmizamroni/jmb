<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Klien_model extends CI_Model {
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
	public function get_klien($id_klien) {
		
		$this->db->from('klien');
		$this->db->where('id_klien', $id_klien);
		return $this->db->get()->row();
		
	}

	public function get_klien_all() {
		
		return $this->db->get('klien');
		
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
	public function create_klien($nama_klien, $alamat, $no_telp) {
		
		$data = array(
			'nama_klien'   => $nama_klien,
			'alamat'      => $alamat,
			'no_telp'		=> $no_telp,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('klien', $data);
		
	}
	
	public function update_klien($id_klien, $nama_klien, $alamat, $no_telp) {
		
		$data = array(
			'id_klien' => $id_klien,
			'nama_klien'   => $nama_klien,
			'alamat'      => $alamat,
			'no_telp'		=> $no_telp,
			'updated_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id_klien', $id_klien);
		$this->db->update('klien', $data);
		return $id_klien;
		
	}

	public function delete_klien($id_klien) {
		
		$this->db->where('id_klien', $id_klien);
		$this->db->delete('klien');
		return $id_klien;
		
	}
}