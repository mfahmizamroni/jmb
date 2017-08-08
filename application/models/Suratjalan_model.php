<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Suratjalan_model extends CI_Model {
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
	public function get_sj($id) {
		
		$this->db->from('surat_jalan');
		$this->db->where('id_sj', $id);
		return $this->db->get()->row();
		
	}

	public function get_suratjalan_all() {
		
		return $this->db->get('surat_jalan');
		
	}

	public function get_suratjalan_all_joined() {
		
		$this->db->select(array('a.id_sj','a.no_sj','sum(b.total) as total'));
		$this->db->from('surat_jalan as a');
		$this->db->join('faktur as b', 'a.no_sj = b.id_faktur_sj', 'left');
		$this->db->group_by('a.no_sj');
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
	public function create_sj($no_sj) {
		
		$data = array(
			'no_sj'   => $no_sj,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('surat_jalan', $data);
		
	}
	
	public function update_sj($id, $no_sj) {
		
		$data = array(
			'no_sj'   => $no_sj,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id_sj', $id);
		$this->db->update('surat_jalan', $data);
		return $id;
		
	}

	public function delete_sj($id_sj) {
		
		$this->db->where('id_sj', $id_sj);
		$this->db->delete('surat_jalan');
		return $id_sj;
		
	}

}