<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesawatModel extends CI_Model {
	public function get_kota()
	{
		$query = $this->db->get('kotaasal');
		return $query;
	}	
	public function get_kotatujuan()
	{
		$query = $this->db->get('kotatujuan');
		return $query;
	}	
	public function getPesawat(){
		
		$this->db->select('*');
		if(!empty($_POST['cari_asal'])){
			$this->db->like('a.KotaAsal',$_POST['cari_asal']);
		}
		if(!empty($_POST['cari_tujuan'])){
			$this->db->like('t.KotaTujuan',$_POST['cari_tujuan']);
		}

		$this->db->from('pesawat as p');
		$this->db->join('kotaasal as a', 'p.IdAsal =a.IdAsal');
		$this->db->join('kotatujuan as t', 'p.IdTujuan =t.IdTujuan');
		$data=$this->db->get();
		return $data->result_array();
	}

}