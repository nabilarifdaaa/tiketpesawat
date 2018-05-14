<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingModel extends CI_Model {
	public function InsertData($tabelNama,$data){
		$res = $this->db->insert($tabelNama,$data);
		return $res;
	}

	public function GetBooking()
	{
		$this->db->select('*');
		$this->db->from('booking');
		$data=$this->db->get();
		return $data->result_array();
	}

	public function GetPreview($id=''){
		$isi = $this->db->query('
			SELECT * FROM booking as b 
			join penumpang as p on b.FK_IdPenumpang = p.IdPenumpang 
			where IdBooking = '.$id);
		return $isi->result_array();
	}

	public function getedit($idbook=''){
		$data = $this->db->query('SELECT * FROM booking where IdBooking = '.$idbook);
		return $data->result_array();
	}

	public function UpdateData($tabelNama,$data,$where){
		$res = $this->db->update($tabelNama,$data,$where);
		return $res;
	}

	public function DeleteData($tabelNama,$where){
		$res = $this->db->delete($tabelNama,$where);
		return $res;
		}
}