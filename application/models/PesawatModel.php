<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesawatModel extends CI_Model {
	public function get_kota()
	{
		$query = $this->db->get('kota');
		return $query;
	}	

	public function getPesawat($idAsal=''){
		
		$this->db->select('*');
		$this->db->from('pesawat as p');
		$this->db->join('kota as a', 'p.FK_IdAsal =a.IdKota');
		$this->db->where('FK_IdAsal = ',$idAsal);
		$data=$this->db->get();
		return $data->result_array();
	}

	public function getPesawat2($idTujuan=''){
		
		$this->db->select('*');		
		$this->db->from('pesawat as p');
		$this->db->join('kota as b', 'p.FK_IdTujuan =b.IdKota');
		$this->db->where('FK_IdTujuan = ',$idTujuan);
		$data=$this->db->get();
		return $data->result_array();
	}

	public function getPesawat3(){
		
		$this->db->select('*');
		if(!empty($_POST['cari_asal'])){
			$this->db->like('a.IdKota',$_POST['cari_asal']);
		}
		if(!empty($_POST['cari_tujuan'])){
			$this->db->like('b.IdKota',$_POST['cari_tujuan']);
		}

		$this->db->from('pesawat as p');
		$this->db->join('kota as a', 'p.FK_IdAsal =a.IdKota');
		$this->db->join('kota as b', 'p.FK_IdTujuan =b.IdKota');
		
		$data=$this->db->get();
		return $data->result_array();
	}

	public function getDetail($KodePesawat="")
	{

		$pesawat = $this->db->query('SELECT * FROM pesawat 
			where KodePesawat = '.'"'.$KodePesawat.'"'); 
		return $pesawat->result_array();
	}	
}