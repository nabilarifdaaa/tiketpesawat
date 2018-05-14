<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KotaModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_kota($table){
		$query = $this->db->get($table);
		return $query;
	}

	public function get_single($table, $id){
		return $this->db->where('IdKota', $id)->get('kota')->row_array();
	}

	public function set_data($data, $id = 0){
		if($id == 0){
			return $this->db->insert('kota', $data);
		}else{
			$this->db->where('IdKota' , $id);
			return $this->db->update('kota', $data);
		}
	}

	public function delete($id){
		$this->db->where('IdKota', $id);
		return $this->db->delete('kota');
	}
}

/* End of file kotaModel.php */
/* Location: ./application/models/kotaModel.php */