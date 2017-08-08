<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Item_model extends CI_Model {
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
	public function get_item_per_faktur($kode_faktur) {
		
		$this->db->from('item');
		$this->db->where('kode_faktur', $kode_faktur);
		return $this->db->get();
		
	}

	public function get_item($id_item) {
		
		$this->db->from('item');
		$this->db->where('id_item', $id_item);
		return $this->db->get()->row();
		
	}

	public function get_item_all() {
		
		return $this->db->get('item');
		
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
	public function create_item($kode_faktur, $qty, $jenis, $harga, $total) {
		
		$data = array(
			'kode_faktur'   => $kode_faktur,
			'qty'   => $qty,
			'jenis'   => $jenis,
			'harga'   => $harga,
			'total'   => $total,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('item', $data);
		
	}
	
	public function update_item($id_item, $kode_faktur, $qty, $jenis, $harga, $total) {
		
		$data = array(
			'qty'   => $qty,
			'kode_faktur'   => $kode_faktur,
			'jenis'   => $jenis,
			'harga'   => $harga,
			'total'   => $total,
			'updated_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id_item', $id_item);
		$this->db->update('item', $data);
		return $id_item;
		
	}

	public function delete_item($id_item) {
		
		$this->db->where('id_item', $id_item);
		$this->db->delete('item');
		return $id_item;
		
	}
}