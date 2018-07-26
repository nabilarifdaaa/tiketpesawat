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
		return $data->row_array();
	}

	public function getPesawat2($idTujuan=''){		
		$this->db->select('*');		
		$this->db->from('pesawat as p');
		$this->db->join('kota as b', 'p.FK_IdTujuan =b.IdKota');
		$this->db->where('FK_IdTujuan = ',$idTujuan);
		$data=$this->db->get();
		return $data->row_array();
	}

	public function getPesawat3($limit = FALSE, $offset = FALSE){
		
		$this->db->select('*');
		if(!empty($_POST['cari_asal'])){
			$this->db->like('a.IdKota',$_POST['cari_asal']);
		}
		if(!empty($_POST['cari_tujuan'])){
			$this->db->like('b.IdKota',$_POST['cari_tujuan']);
		}

		$this->db->from('pesawat as p');
		$this->db->limit($limit, $offset);
		$this->db->join('kota as a', 'p.FK_IdAsal =a.IdKota');
		$this->db->join('kota as b', 'p.FK_IdTujuan =b.IdKota');
		if($this->session->userdata('level') == 1){
			$this->db->where('Kelas','Jet Pribadi');
		}else if($this->session->userdata('level') == 2){
			$this->db->where('Kelas','Bussiness');
		}else if ($this->session->userdata('level') == 3) {
			$this->db->where('Kelas','Economy');
		}
		
		$data=$this->db->get();
		return $data->result_array();
	}

	public function getDetail($KodePesawat="")
	{

		$pesawat = $this->db->query('SELECT * FROM pesawat 
			where KodePesawat = '.'"'.$KodePesawat.'"'); 
		return $pesawat->result_array();
	}	

	 public function get_total() 
    {
        // Dapatkan jumlah total artikel
        return $this->db->count_all("pesawat");
    }

    public function getall(){
		$this->db->select('*');
		$this->db->from('pesawat');
		$data=$this->db->get();
	
		return $data->result_array();
	}	

	public function deletePesawat($id) {
		$this->db->query("DELETE FROM pesawat WHERE KodePesawat = '$id'");

		return true;
	}

	public function getPesawat4($id) {
		$result = $this->db->query("SELECT * FROM pesawat WHERE KodePesawat = '$id'");
		
		return $result->result_array();
	}

	public function updatePesawat($data, $id) {
	    $this->db->where('KodePesawat', $id);
	    $this->db->update('pesawat', $data);
	    
	    return true;
	}

	public function addPesawat($data) {
	    $this->db->insert('pesawat', $data);
	    
	    return true;
	}
}