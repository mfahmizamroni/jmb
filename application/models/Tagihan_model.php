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
	public function get_no_tagihan($id) {
		
		$this->db->from('tagihan');
		$this->db->where('no_tagihan', $id);
		return $this->db->get()->row();
		
	}

	public function get_tagihan_all() {
		
		return $this->db->get('tagihan');
		
	}

	public function get_tagihan_all_joined() {
		
		$this->db->select(array('*','a.kembali as kembalis'));
		$this->db->from('tagihan as a');
		$this->db->join('faktur as b', 'a.no_tagihan = b.tagihan', 'left');
		$this->db->group_by('a.no_tagihan');
		return $this->db->get();
	}

	public function get_tagihan_all_joined_nolunas() {
		
		$this->db->select(array('*','a.kembali as kembalis'));
		$this->db->from('tagihan as a');
		$this->db->join('faktur as b', 'a.no_tagihan = b.tagihan', 'left');
		$this->db->where('status = "surat" OR status = "0"');
		$this->db->group_by('a.no_tagihan');
		return $this->db->get();
	}

	public function get_tagihan_all_joined_lunas() {
		
		$this->db->select(array('*','a.kembali as kembalis'));
		$this->db->from('tagihan as a');
		$this->db->join('faktur as b', 'a.no_tagihan = b.tagihan', 'left');
		$this->db->where('status != "surat" AND status != "0"');
		$this->db->group_by('a.no_tagihan');
		return $this->db->get();
	}

	public function get_last_tagihan() {
		
		$this->db->from('tagihan');
		
		//$temp1 = substr($temp, 0, 2);
		$a = $this->db->select('no_tagihan')->order_by('no_tagihan',"desc");
		$b = $this->db->get()->first_row();
		if ($b) {

			$c = substr($b->no_tagihan, 1, 1);
			if ($c == 'z' || $c == 'Z') {
				$res1 = substr($b->no_tagihan, 0, 1);
				$res1 = $res1++;
				$res2 = 'A';
				$res3 = '01';
			} elseif(substr($b->no_tagihan, 2, 2) == 100) {
				$res1 = substr($b->no_tagihan, 0, 1);
				$res2 = substr($b->no_tagihan, 1, 1);
				$res2 = $res2++;
				$res3 = '01';
			} else {
				$res1 = substr($b->no_tagihan, 0, 1);
				$res2 = substr($b->no_tagihan, 1, 1);
				$int = substr($b->no_tagihan, 2, 2);
				$last_nik = $int+1;
				$res3 = sprintf('%02d', $last_nik);
			}

		} else {
			$res1 = 'A';
			$res2 = 'A';
			$res3 = '01';
		}


		$res = $res1.$res2.$res3;

		return $res;
		
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
	public function create_tagihan($no_tagihan, $klien, $tanggal_tagihan, $total_tagihan) {
		
		$data = array(
			'no_tagihan'   => $no_tagihan,
			'klien'   => $klien,
			'tanggal_tagihan'   => $tanggal_tagihan,
			'total_tagihan'   => $total_tagihan,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('tagihan', $data);
		
	}
	
	public function update_tagihan($id, $no_tagihan, $klien, $tanggal_tagihan, $total_tagihan, $status) {
		
		if ($status == 'surat') {
			$this->db->where('id_tagihan', $id);
			$this->db->set('kembali', 'kembali+1', FALSE);
			$this->db->update('tagihan');
		}

		$data = array(
			'no_tagihan'   => $no_tagihan,
			'klien'   => $klien,
			'tanggal_tagihan'   => $tanggal_tagihan,
			'total_tagihan'   => $total_tagihan,
			'status'   => $status,
			'updated_at' => date('Y-m-j H:i:s'),
		);
		
		$this->db->where('id_tagihan', $id);
		$this->db->update('tagihan', $data);
		return $id;
		
	}

	public function delete_tagihan($id) {
		
		$this->db->where('id_tagihan', $id);
		$this->db->delete('tagihan');
		return $id;
		
	}

}