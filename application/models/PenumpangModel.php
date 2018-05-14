<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenumpangModel extends CI_Model {
	public function GetAll(){
		$this->db->select('*');
		$this->db->from('penumpang');
		$data=$this->db->get();
		return $data->result_array();
	} 
	public function InsertData($tabelNama,$data){
		$res = $this->db->insert($tabelNama,$data);
		return $res;
	}
	public function DeleteData($tabelNama,$data){
		$res = $this->db->delete($tabelNama,$data);
		return $res;
	}
	public function UpdateData($tabelNama,$data,$where){
		$res = $this->db->update($tabelNama,$data,$where);
		return $res;
	}
	public function getedit($idpenum=''){
		$data = $this->db->query('SELECT * FROM penumpang where IdPenumpang = '.$idpenum);
		return $data->result_array();
	}
	public function getNama()
	{
		$query = $this->db->get('penumpang');
		return $query;
	}
}
