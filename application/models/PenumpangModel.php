<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenumpangModel extends CI_Model {
	public function InsertData($tabelNama,$data){
		$res = $this->db->insert($tabelNama,$data);
		return $res;
	}

	public function getPenumpangRecent(){
		$query = $this->db->select('*')
				->order_by('KodeBook', 'desc')
				->get('penumpang',1);
		return $query->row_array();
	}
}