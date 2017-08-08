<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class tagihan_model extends CI_Model {
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
	public function get_tagihan($id) {
		
		$this->db->from('tagihan');
		$this->db->where('id_tagihan', $id);
		return $this->db->get()->row();
		
	}

	public function get_tagihan_all() {
		
		return $this->db->get('tagihan');
		
	}

	public function get_tagihan_all_joined() {
		
		//$this->db->select(array('a.id_tagihan','a.no_tagihan','sum(b.total) as total'));
		$this->db->from('tagihan as a');
		$this->db->join('faktur as b', 'a.no_tagihan = b.tagihan', 'left');
		$this->db->group_by('a.no_tagihan');
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
	public function create_tagihan($no_tagihan, $klien, $tipe_pembayaran, $total_tagihan) {
		
		$data = array(
			'no_tagihan'   => $no_tagihan,
			'klien'   => $klien,
			'tipe_pembayaran'   => $tipe_pembayaran,
			'total_tagihan'   => $total_tagihan,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('tagihan', $data);
		
	}
	
	public function update_dm($id, $no_dm, $truk, $sopir, $total_ongkos, $total_qty) {
		
		$data = array(
			'no_dm'   => $no_dm,
			'truk'   => $truk,
			'sopir'   => $sopir,
			'total_ongkos'   => $total_ongkos,
			'total_qty'   => $total_qty,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id_dm', $id);
		$this->db->update('tagihan', $data);
		return $id;
		
	}

	public function delete_dm($id_dm) {
		
		$this->db->where('id_dm', $id_dm);
		$this->db->delete('tagihan');
		return $id_dm;
		
	}

}