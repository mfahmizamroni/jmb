<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class daftarmuat_model extends CI_Model {
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
	public function get_dm($id) {
		
		$this->db->from('daftar_muat');
		$this->db->where('id_dm', $id);
		return $this->db->get()->row();
		
	}

	public function get_daftarmuat_all() {
		
		return $this->db->get('daftar_muat');
		
	}

	public function get_daftarmuat_all_joined() {
		
		$this->db->select(array('a.id_dm','a.no_dm','sum(b.total) as total', 'a.truk as truk', 'a.sopir as sopir', 'Date(a.created_at) as tanggal'));
		$this->db->from('daftar_muat as a');
		$this->db->join('faktur as b', 'a.no_dm = b.id_faktur_dm', 'left');
		$this->db->group_by('a.no_dm');
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
	public function create_dm($no_dm, $truk, $sopir, $total_ongkos, $total_qty) {
		
		$data = array(
			'no_dm'   => $no_dm,
			'truk'   => $truk,
			'sopir'   => $sopir,
			'total_ongkos'   => $total_ongkos,
			'total_qty' => $total_qty,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('daftar_muat', $data);
		
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
		$this->db->update('daftar_muat', $data);
		return $id;
		
	}

	public function delete_dm($id_dm) {
		
		$this->db->where('id_dm', $id_dm);
		$this->db->delete('daftar_muat');
		return $id_dm;
		
	}

}